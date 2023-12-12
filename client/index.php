<?php
    session_start();
    ob_start(); 
    include('./../model/connect.php');
    include('./../model/product.php');
    include('./../model/order.php');
    include('./../model/category.php');
    include('./../model/size.php');
    include('./../model/user.php');
    include('./../helper/baseUrl.php');
    include('./../helper/dd.php');

    if(isset($_GET['dang-ky'])){
        include('./views/register.php');
        die;
    }else if (isset($_GET['dang-nhap'])){
        include('./views/login.php');
        die;
    }else if(isset($_GET['logout'])){
            unset($_SESSION["user"]);
    }
    
    if(isset($_SESSION["user"])){
        $user =$_SESSION["user"];
    }

    include('./views/layouts/header.php');

    if(isset($_GET['url'])){
        $cates = getCateAll();
        $size =  getSizeWhereType(1);
        $color =  getSizeWhereType(2);
        switch($_GET['url']){
            // Lưu đăng ký
            case 'dang-ky-save':
                if(isset($_POST)){
                    if(!empty($_FILES["kh_avatar"])){
                        $fileName =  $_FILES["kh_avatar"]["name"];
                        move_uploaded_file( $_FILES["kh_avatar"]["tmp_name"]  ,'./../upload/' .   $fileName );
                    }
                    $_POST['kh_avatar'] = $fileName;
                    $_POST['kh_password'] = password_hash( $_POST['kh_password']  , PASSWORD_DEFAULT);
                    register($_POST);
                    header("location:".BASE_CLIENT."?dang-nhap");
                    die;
                }
                break;
            // Đăng nhập
            // case 'dang-nhap-save':
            //     if(isset($_POST)){
            //         if($_POST["email"] != '' && $_POST["password"] != ''){
            //             for ($i=0; $i < count(getAllUser()); $i++) { 
            //                 if(trim(getAllUser()[$i]["kh_email"]) == trim($_POST["email"])){
            //                     if(password_verify($_POST["password"] , getAllUser()[$i]["kh_password"])){
            //                         $_SESSION["user"] = getAllUser()[$i];
            //                        if (getAllUser()[$i]["role"] == 1) {
            //                           header("location:".BASE_CLIENT."");
            //                        }else{
            //                           header("location: ../admin/index.php");
            //                        }
            //                     }
            //                 }else{
            //                     header("location:".BASE_CLIENT."?dang-nhap");
            //                 }
            //             }
                        
            //         }else{
            //             header("location:".BASE_CLIENT."?dang-nhap");
            //         }
            //     }
            //     break;
            case 'dang-nhap-save':
                if(isset($_POST)){
                    if($_POST["email"] != '' && $_POST["password"] != ''){
                        for ($i=0; $i < count(getAllUser()); $i++) { 
                            if(trim(getAllUser()[$i]["kh_email"]) == trim($_POST["email"])){
                                if(password_verify($_POST["password"], getAllUser()[$i]["kh_password"])){
                                    $_SESSION["user"] = getAllUser()[$i];
                                    if (getAllUser()[$i]["role"] == 1) {
                                        header("location:".BASE_CLIENT."");
                                    } else {
                                        header("location: ../admin/index.php");
                                    }
                                    // Đảm bảo thoát sau khi chuyển hướng
                                    exit;
                                }
                            }
                        }
                        // Email không khớp với bất kỳ người dùng nào
                        header("location:".BASE_CLIENT."?dang-nhap");
                    } else {
                        // Một trong các trường email hoặc mật khẩu trống
                        header("location:".BASE_CLIENT."?dang-nhap");
                    }
                }
                break;
            
            // trang sản phẩm 
            case 'san-pham':
                if(isset($_GET['cate'])){
                    $products = getProductWhereCate($_GET['cate']);
                }else if (isset($_GET['size'])){
                    $products =  getProductWhereSize($_GET['size']);
                }else if(isset($_GET['color'])){
                    $products =  getProductWhereSize($_GET['color']);
                }else if(isset($_GET['key_word'])){
                    $key_word = $_GET['key_word'];
                    $products = searchProduct(($_GET['key_word']));
                }else{
                    $products = getProductAll();
                }
                include('./views/product.php');
                break;

            // tìm kiếm ản phẩm
            case 'tim-kiem-san-pham':
                if($_POST['key_word']){
                    header("location:".BASE_CLIENT."?url=san-pham&key_word=" .$_POST['key_word']);
                }
                break;
             //sanr phẩm chi tiết
        case 'san-pham-chi-tiet':
            $error = '';
            $isDanhgia;
            if(isset($_GET['dg'])){
                $isDanhgia= $_GET['dg'];
            }
            if(isset($_GET['id'])){
                $product = getProductFind($_GET['id']);
                $productRelate= getProductWhereCate($product[0]["dm_id"]);
                $comments = getCommentProduct($_GET['id']);
            }

            include('views/product-detail.php');
            break;
            //chi tiết sản phẩm
            case 'add-gio-hang':
                $product = getProductFind($_POST['id']);
                $error = '';
                if(!empty( $_POST["size"]) && !empty( $_POST["color"]) ){
                    // validate số lượng
                    $quantity = intval($_POST["quantity"]);
                        if ($quantity <= 0) {
                            $error = 'Số lượng phải lớn hơn 0!';
                            include('./views/product-detail.php');
                            break;
                        }

                        // Giả sử $product[0]["sp_quantity"] là số lượng tồn kho hiện có của sản phẩm
                        if ($quantity > $product[0]["sp_quantity"]) {
                            $error = 'Số lượng vượt quá số lượng hiện có!';
                            include('./views/product-detail.php');
                            break;
                        }
                    // phần sử lý giỏ hàng
                    if (isset($_SESSION["cart"])) {
                        $cart = $_SESSION["cart"];
                        $uniqueIdentifier = $_POST["id"] . '_' . $_POST["size"] . '_' . $_POST["color"];
                    
                        if (array_key_exists($uniqueIdentifier, $cart)) {
                            $cart[$uniqueIdentifier]['number'] += $_POST["quantity"];
                        } else {
                            $cart[$uniqueIdentifier] = [
                                'id' => $_POST["id"],
                                'name' => $product[0]["sp_name"],
                                'img' => $product[0]["sp_image"],
                                'size' => $_POST["size"] . '-' . 'Màu ' . $_POST["color"],
                                'price' => $product[0]["sp_sale"],
                                'number' => $_POST["quantity"],
                            ];
                        }
                    } else {
                        $cart = [];
                        $uniqueIdentifier = $_POST["id"] . '_' . $_POST["size"] . '_' . $_POST["color"];
                        $cart[$uniqueIdentifier] = [
                            'id' => $_POST["id"],
                            'name' => $product[0]["sp_name"],
                            'img' => $product[0]["sp_image"],
                            'size' => $_POST["size"] . '-' . 'Màu ' . $_POST["color"],
                            'price' => $product[0]["sp_sale"],
                            'number' => $_POST["quantity"],
                        ];
                    }
                    header("location:".BASE_CLIENT."?url=gio-hang");
                }else{
                    $error = 'Bạn chưa chọn thuộc tính !!!';
                    include('./views/product-detail.php');
                }
                
                $_SESSION['cart'] = $cart;
                // if (!isset($cart)) {
                //     $cart = array(); // hoặc khởi tạo giá trị khác tùy thuộc vào logic ứng dụng của bạn
                    
                // }
                break;

                // Trang giỏ hàng
            case 'gio-hang':
                // đăng nhập mới vào đặt hàng đc 
                // if(!isset($_SESSION["user"])){
                //     header("location:".BASE_CLIENT."?dang-nhap");
                // }
                $cart =  $_SESSION['cart'];
                include('./views/cart.php');
                break;

                case 'xoa-gio-hang':
                    if($_GET["id"]){
                        // dd($_GET["id"]);
                        unset($_SESSION["cart"][$_GET["id"]]);
                    }
                    // Quay về trang trước
                    header('Location: ' . $_SERVER['HTTP_REFERER']);
                    break;
            //bình luận
            case 'binh-luan':
                if(isset($_SESSION["user"])){
                   $_POST["kh_id"] = $_SESSION["user"]["kh_id"];
                   commentProduct($_POST);
                   header("location:".BASE_CLIENT."?url=san-pham-chi-tiet&id=". $_POST["sp_id"]."&dg=danh-gia");
                }else{
                    header("location:".BASE_CLIENT."?dang-nhap");
                }
                break;
            // xóa bình luận 
            case 'binh-luan-delete':
                if(isset($_GET["id"])){
                    deleteCmtt($_GET["id"]);
                    header('Location: ' . $_SERVER['HTTP_REFERER']);
                }
                    
                break;
            // Trang thanh toán
         case 'thanh-toan':
            if(!isset($_SESSION["user"])){
                header("location:".BASE_CLIENT."?dang-nhap");
            }elseif (!isset($_SESSION["cart"])) {
                header("location:".BASE_CLIENT."?url=san-pham");
            }else{
                $user = $_SESSION["user"];
                $cart =  $_SESSION['cart'];
                // dd($user);
                include('./views/pay.php');
                break;  
            }

         // Trang lưu thanh toán
         case 'luu-thanh-toan':
           if($_POST){
             try {
                $idNew = insertOrder($_POST);
                $cart =  $_SESSION['cart'];
                foreach( $cart as $key => $value){
                    insertOrderDetail($value ,  $idNew);
                }
                unset($_SESSION["cart"]);
                $_SESSION['success'] = 'Thanh toán thành công !!!';
             } catch (\Throwable $th) {
                header('Location: ' . $_SERVER['HTTP_REFERER']);
             };
            header("location:".BASE_CLIENT."?url=ordering");
           }
           break;

        // Trang chi tiết sản phẩm
         case 'san_pham/chi-tiet':
            include('./views/product-detail.php');
            break;
        // Trang liên hệ
         case 'lien-he':
            include('./views/contact.php');
            break;
        // trang sản phẩm 
        case 'order':
            $userOrders = getUserOrders($_SESSION['kh_id']);
            include('./views/order/index.php');
            break;
        
      
        case 'update_order':
            $order = orderAll();
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                if (isset($_POST['newStatus']) && is_array($_POST['newStatus'])) {
                    foreach ($_POST['newStatus'] as $orderId => $newStatus) {
                        // Gọi hàm để cập nhật trạng thái
                        updateOrderStatus($orderId, $newStatus);
                    }
                }
            }
            
            header("location:index.php?url=lich-su");
            // include ('./views/history.php');
            break;
        case 'order-detail':
            if(isset($_GET['id'])){
                $order =  getOrderByID($_GET['id']);
                $orderDetail = getOrderDetailByID($_GET['id']);
                include('./views/order/detail.php');
            }
            break;
        // lịch sử đơn hàng 
        case 'lich-su':
            $userId = $_SESSION['user']['kh_id'];

            if (!isset($userId)) {
                header('Location: index.php?dang-nhap');
                exit();
            }

            // Lấy danh sách đơn hàng của người dùng
            $userOrders = orderAll();

            // Kiểm tra kh_id của đơn hàng và hiển thị sản phẩm tương ứng
            $matchedOrders = array();
            foreach ($userOrders as $order) {
                if ($order['kh_id'] === $userId) {
                    $matchedOrders[] = $order;
                }
            }

            // Hiển thị trang lịch sử đơn hàng với các đơn hàng tương ứng
            include('./views/history.php');
            break;
            case 'ordering':
                include('./views/odering.php');
                break;
        default:
            # code...
            break;

        }
    }else{
        $products = getProductAll();
        include('./views/home.php');
    }
    ob_end_flush();
    include('./views/layouts/footer.php');



?>
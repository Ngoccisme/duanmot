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
    include('./views/login.php');
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


//
include('./views/layouts/header.php');
if (isset($_GET['url'])) {
    $cates =  getCateAll();
    $size =  getSizeWhereType(1);
    $color =  getSizeWhereType(2);
    switch ($_GET['url']) {
        // Lưu đăng ký
        case 'dang-ky-save':
            if(isset($_POST)){
                if(!empty($_FILES["kh_avatar"])){
                    $fileName =  $_FILES["kh_avatar"]["name"];
                    move_uploaded_file( $_FILES["kh_avatar"]["tmp_name"]  ,'../upload/' .   $fileName );
                }
                $_POST['kh_avatar'] = $fileName;
                $_POST['kh_password'] = password_hash( $_POST['kh_password']  , PASSWORD_DEFAULT);
                register($_POST);
                header("location:".BASE_CLIENT."?dang-nhap");
                die;
            }
            break;
        // Đăng nhập
        case 'dang-nhap-save':
            if(isset($_POST)){
                if($_POST["email"] != '' && $_POST["password"] != ''){
                    for ($i=0; $i < count(getAllUser()); $i++) { 
                        if(trim(getAllUser()[$i]["kh_email"]) == trim($_POST["email"])){
                            if(password_verify($_POST["password"] , getAllUser()[$i]["kh_password"])){
                                $_SESSION["user"] = getAllUser()[$i];
                               if (getAllUser()[$i]["role"] == 1) {
                                  header("location:".BASE_CLIENT."");
                               }else{
                                  header("location: ../admin/index.php");
                               }
                            }
                        }else{
                            header("location:".BASE_CLIENT."?dang-nhap");
                        }
                    }
                    
                }else{
                    header("location:".BASE_CLIENT."?dang-nhap");
                }
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
            break;
            //chi tiết sản phẩm
            case 'add-gio-hang':
                $product = getProductFind($_POST['id']);
                $error = '';
                if(!empty( $_POST["size"]) && !empty( $_POST["color"]) ){
                    if (isset($_SESSION["cart"])) {
                        $cart = $_SESSION["cart"] ;
                        if (array_key_exists($_POST["id"], $cart)) {
                            if (in_array($cart[$_POST["id"]]['size'], $cart[$_POST["id"]], true)) {
                                $cart[$_POST["id"]] = [
                                    'id' => $_POST["id"],
                                    'name' => $product[0]["sp_name"],
                                    'img' => $product[0]["sp_image"],
                                    'size' => $cart[$_POST["id"]]['size'] . ',' . $_POST["size"] . '-' . 'Màu ' .  $_POST["color"],
                                    'price' => $product[0]["sp_sale"],
                                    'number' => $cart[$_POST["id"]]['number'] + $_POST["quantity"],
                                ];
                            } else {
                                $cart[$_POST["id"]] = [
                                    'id' => $_POST["id"],
                                    'name' => $product[0]["sp_name"],
                                    'img' => $product[0]["sp_image"],
                                    'size' => $_POST["size"] . '-' .  'Màu ' .  $_POST["color"],
                                    'price' => $product[0]["sp_sale"],
                                    'number' => $cart[$_POST["id"]]['number'] + $_POST["quantity"],
                                ];
                            }
                        } else {
                            $cart[$_POST["id"]] = [
                                'id' => $_POST["id"],
                                'name' => $product[0]["sp_name"],
                                'img' => $product[0]["sp_image"],
                                'size' => $_POST["size"] . '-' .  'Màu ' .  $_POST["color"],
                                'price' => $product[0]["sp_sale"],
                                'number' =>  $_POST["quantity"],
                            ];
                        }
                    } else {
                        $cart = [];
                        $cart[$_POST["id"]] = [
                            'id' => $_POST["id"],
                            'name' => $product[0]["sp_name"],
                            'img' => $product[0]["sp_image"],
                            'size' => $_POST["size"] . '-' .  'Màu ' .  $_POST["color"],
                            'price' => $product[0]["sp_sale"],
                            'number' =>$_POST["quantity"],
                        ];
                    }
                    header("location:".BASE_CLIENT."?url=gio-hang");
                }else{
                    $error = 'Bạn chưa chọn thuộc tính !!!';
                    include('./views/product-detail.php');
                }
                
                $_SESSION['cart'] = $cart;
                break;
    
            
        //sản phẩm
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
            default:
                #code...
            break;
            // Trang giỏ hàng
            case 'gio-hang':
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
        


            }
    
    }else{
        $products = getProductAll();
        include('./views/home.php');
    }
    ob_end_flush();
    include('./views/layouts/footer.php');

ob_end_flush();
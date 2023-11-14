<?php

    include('./../model/connect.php');
    include('./../model/category.php');
    include('./../model/product.php');
    include('./../model/size.php');
    include('./../model/order.php');
    include('./../model/user.php');
    include('./../helper/dd.php');
    include('./../helper/baseUrl.php');
    include('./../helper/route-menu-admin.php');


    include('./views/layouts/header.php');
    if(isset($_GET['url'])&&($_GET['url']!="")){
        switch($_GET['url']){
           // Trang danh sách danh mục
           case 'category':
            
            $error= '';
            $cates = getCateAll();
            include('./views/category/index.php');
            break;
         // Thêm danh mục
        case 'category-add':
           $cates = getCateAll();
            if(empty($_POST['dm_name'])){
                $error = 'Error';
            }else{
                insertCate($_POST['dm_name']);
            }

           header("location:".BASE_ADMIN."category");
           break;
          // Xóa danh mục
        case 'category-delete':
            $cates = getCateAll();
            if(isset($_GET['id'])){
              
              deleteCate($_GET['id']);
            }else{
              echo 'Error';
              die;
            }
            header("location:".BASE_ADMIN."category");
            break;
        // Sửa danh mục
        case 'category-edit':
            $error= '';
            $cates = getCateAll();
            if($_GET['id']){
               $cate = getFind($_GET['id']);
            //    dd($cate);
               include('./views/category/index.php');
            }else{
                echo 'ERROR';
                die;
            }
            break;
        // Trang lưu sửa
        case 'category-edit-save':
            $cates = getCateAll();
    
            if(!empty($_POST['dm_name']) && !empty($_POST['id'])){
                updateCate($_POST['dm_name'] ,$_POST['id']);
            }else{
                echo 'Chưa nhập gì !!!';
            die;
            }
            header("location:".BASE_ADMIN."category");
            break;
            //hóa đơn
            case 'order':
                $order = orderAll();
                include('./views/order/index.php');
                break;
                //xóa và lưu hóa đơn
            case 'order-delete-save':
                if(isset($_GET['id'])){
                    orderDelete($_GET['id']);
                }
                header("location:".BASE_ADMIN."order");
                break; 
    
            // Chi tiết hóa đơn
            case 'order-detail':
                if(isset($_GET['id'])){
                   $order =  getOrderByID($_GET['id']);
                   $orderDetail = getOrderDetailByID($_GET['id']);
                   include('./views/order/detail.php');
                }
                break;
        }
    }else{
        include "./views/layouts/home.php";
    }
    include "./views/layouts/footer.php";
?>

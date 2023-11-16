<?php
include('./../model/connect.php');
include('./../model/product.php');
include('./../model/order.php');
include('./../model/category.php');
include('./../model/size.php');
include('./../model/user.php');
include('./../helper/baseUrl.php');
include('./../helper/dd.php');

//
include('./views/layouts/header.php');
if (isset($_GET['url'])) {
    $cates =  getCateAll();
    $size =  getSizeWhereType(1);
    $color =  getSizeWhereType(2);
    switch ($_GET['url']) {
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

            include('./views/product-detail.php');
            break;
            break;
        
        default:
            # code...
            break;
    }
}
include('./views/layouts/footer.php');

?>
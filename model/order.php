<?php
// Thêm sản phẩm
function insertOrder($data){
    $conn = connect();
    $stmt = $conn->prepare("INSERT INTO `order`
    (`kh_name`, `kh_email`, `kh_phone`, `kh_address`, `kh_content`, `kh_id`)
     VALUES ( '".$data["kh_name"]."' , '".$data["kh_email"]."' ,'".$data["kh_phone"]." ','".$data["kh_address"]."' ,  '".$data["kh_content"]."' , ".(int)$data["kh_id"].")");
    $stmt->execute();
    $idNew = $conn->lastInsertId();
    return $idNew;
}

// Lấy tất của hóa đơn
function orderAll(){
    $conn = connect();
    $stmt = $conn->prepare("SELECT *  FROM `order`");
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $result = $stmt->fetchAll();
    return $result;
}

// Get order where ID
function getOrderByID($id){
    $conn = connect();
    $stmt = $conn->prepare("SELECT *  FROM `order` WHERE  `hd_id`= $id");
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $result = $stmt->fetchAll();
    return $result;
}

// Get order where ID
function getOrderDetailByID($id){
    $conn = connect();
    $stmt = $conn->prepare("SELECT *  FROM `orderdetail` WHERE  `hd_id`= $id");
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $result = $stmt->fetchAll();
    return $result;
}

// Xóa hóa đơn
function orderDelete($id){
    $conn = connect();
    $stmt = $conn->prepare("DELETE FROM `order` WHERE `hd_id` = ".$id);
    $stmt->execute();
}


//Thêm Hóa đơn chi tiết 
function insertOrderDetail($data , $orderId){
    $conn = connect();
    $stmt = $conn->prepare("INSERT INTO `orderdetail`
    (`sp_name`, `sp_image`, `sp_price`, `sp_quantity`, `hd_id`, `sp_id`)
     VALUES ('".$data["name"]."','".$data["img"]."','".$data["price"]."','".$data["number"]."',".$orderId.",".$data["id"].")");
    $stmt->execute();
}

?>
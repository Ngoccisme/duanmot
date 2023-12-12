<?php
// Thêm sản phẩm

function insertOrder($data){
    $conn = connect();
    $stmt = $conn->prepare("INSERT INTO `order`
    (`kh_name`, `kh_email`, `kh_phone`, `kh_address`, `kh_content`, `kh_id`, `order_status`,`order_date`,`order_code`)
     VALUES ('".$data["kh_name"]."' , '".$data["kh_email"]."' ,'".$data["kh_phone"]."','".$data["kh_address"]."' , '".$data["kh_content"]."' , ".(int)$data["kh_id"].", 1 ,'".$data["order_date"]."','".$data["order_code"]."')");
    $stmt->execute();
    $idNew = $conn->lastInsertId();
    return $idNew;
}

// trang thai
function updateOrderStatus($orderId, $newStatus) {
    $conn = connect();
    try {
        $stmt = $conn->prepare("UPDATE `order` SET `order_status` = :newStatus WHERE `hd_id` = :orderId");
        $stmt->bindParam(':newStatus', $newStatus);
        $stmt->bindParam(':orderId', $orderId);

        // Hiển thị câu lệnh SQL và giá trị tham số
        // echo $stmt->queryString;
        // var_dump([$newStatus, $orderId]);

        $stmt->execute();
    } catch (PDOException $e) {
        echo "Error updating order status: " . $e->getMessage();
    }
}

function getUserOrders($userId) {
    $conn = connect();

    // Chống SQL injection
    $userId = $conn->real_escape_string($userId);

    // Truy vấn SQL để lấy đơn hàng của người dùng
    $sql = "SELECT * FROM `order` WHERE `kh_id` = $userId ORDER BY `order_date` DESC";
    $result = $conn->query($sql);

    // Kiểm tra và xử lý kết quả truy vấn
    if ($result) {
        $userOrders = [];
        while ($row = $result->fetch_assoc()) {
            $userOrders[] = $row;
        }
        $result->free_result();
    } else {
        echo "Lỗi truy vấn: " . $conn->error;
    }

    $conn->close();
    return $userOrders;
}

function getStatusText($status) {
    switch ($status) {
        case '1':
            return 'Chờ xác nhận';
        case '2':
            return 'Đã xác nhận';
        case '3':
            return 'Đang giao';
        case '4':
            return 'Hoàn thành';
        case '5':
            return 'Chờ hủy';
        case '6':
            return 'Đã hủy';
        default:
            return 'Chờ xác nhận';
    }
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
// function insertOrderDetail($data , $orderId){
//     $conn = connect();
//     $stmt = $conn->prepare("INSERT INTO `orderdetail`
//     (`sp_name`, `sp_image`, `sp_price`, `sp_quantity`, `hd_id`, `sp_id`)
//      VALUES ('".$data["name"]."','".$data["img"]."','".$data["price"]."','".$data["number"]."',".$orderId.",".$data["id"].")");
//     $stmt->execute();
// }
function insertOrderDetail($data, $orderId) {
    $conn = connect();

    // Lấy thông tin sản phẩm từ bảng product
    $product = getProductFind($data["id"]);

    // Giảm số lượng đã đặt hàng từ tồn kho
    $quantityToDeduct = (int)$data["number"];
    $productId = $data["id"];
    
    $stmtDeduct = $conn->prepare("UPDATE product SET sp_quantity = sp_quantity - :quantityToDeduct WHERE sp_id = :productId");
    $stmtDeduct->bindParam(':quantityToDeduct', $quantityToDeduct, PDO::PARAM_INT);
    $stmtDeduct->bindParam(':productId', $productId, PDO::PARAM_INT);
    $stmtDeduct->execute();

    // Chèn chi tiết đơn hàng vào bảng orderdetail
    $stmtInsert = $conn->prepare("INSERT INTO `orderdetail` 
        (`sp_name`, `sp_image`, `sp_price`, `sp_quantity`, `hd_id`, `sp_id`)
        VALUES (:name, :img, :price, :quantity, :orderId, :productId)");

    $stmtInsert->bindParam(':name', $data["name"], PDO::PARAM_STR);
    $stmtInsert->bindParam(':img', $data["img"], PDO::PARAM_STR);
    $stmtInsert->bindParam(':price', $data["price"], PDO::PARAM_STR);
    $stmtInsert->bindParam(':quantity', $data["number"], PDO::PARAM_INT);
    $stmtInsert->bindParam(':orderId', $orderId, PDO::PARAM_INT);
    $stmtInsert->bindParam(':productId', $data["id"], PDO::PARAM_INT);

    $stmtInsert->execute();
}

// trạng thái đơn hàng 
// Giả sử bạn đã kết nối với cơ sở dữ liệu




?>

 
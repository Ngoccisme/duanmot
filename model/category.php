<?php

//  Gọi tất cả danh mục 
function getCateAll(){
    $conn = connect();
    $stmt = $conn->prepare("SELECT *  FROM category");
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $result = $stmt->fetchAll();
    return $result;
}


function cateChart(){
    $conn = connect();
    $stmt = $conn->prepare("SELECT dm_name , COUNT(product.dm_id) AS 'number_cate' FROM product INNER JOIN category ON product.dm_id = category.dm_id GROUP BY product.dm_id");
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $result = $stmt->fetchAll();
    return $result;
}


// Thêm danh mục
function insertCate($name){
    $conn = connect();
    $stmt = $conn->prepare("INSERT INTO category (dm_name) VALUES ('".$name."')");
    $stmt->execute();
}

// Update danh mục
function updateCate($name , $id){
    $conn = connect();
    $stmt = $conn->prepare("UPDATE  category  SET  dm_name = '".$name."' WHERE category.dm_id = ".$id."" );
    $stmt->execute();
}

// Gọi phần tử theo ID
function getFind($id){
    $conn = connect();
    $stmt = $conn->prepare("SELECT  * FROM category WHERE category.dm_id = ".$id."");
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $result = $stmt->fetchAll();
    return $result;
}

// Xóa danh mục
function deleteCate($id){
    $conn = connect();
    $sql = "DELETE FROM category WHERE category.dm_id = ".$id;
    $conn->exec($sql);
}
<?php
// function loadall_thongke_sanham_dm()
// {
//     // Viết câu lệnh để lấy thông tin thống kê sản phẩm theo từng danh mục

//     $sql = "SELECT dm.id, dm.name, COUNT(*) as soluong, MIN(sp.price) as min, MAX(sp.price) as max
//             FROM danhmuc dm  
//             JOIN sanpham sp ON dm.id = sp.iddm
//             GROUP BY dm.id, dm.name
//             ORDER BY soluong ASC";
    
//     return pdo_query($sql);
// }


// thông kê các sản phẩm được mua nhiều nhất
function loadall_thongke_sanham_dm_gg()
{
    $sql = "SELECT c.dm_name, COUNT(*) as soluong
            FROM category c  
            JOIN product sp ON c.dm_id = sp.dm_id
            GROUP BY c.dm_id, c.dm_name
            ORDER BY soluong ASC";
    
    return pdo_query($sql);
}
// thông kê các sản phẩm có nhiều nhất trong bill


// thông kê các sản phẩm được mua nhiều nhất
 function load_top10_sanpham_banchay(){
$sql=  " SELECT sp_id,sp_img,sq_name, COUNT(kh_id) AS sp_quantity FROM orderdetail GROUP BY hd_id, sp_img, sp_name ORDER BY sp_quantity DESC LIMIT 10";
return pdo_query($sql);
}
 function load_sptonkho(){
    $sql = "SELECT p.sp_id,p.sp_name,p.sp_img ,p.sp_price FROM product p WHERE NOT EXISTS ( SELECT 1 FROM orderdetail o WHERE o.hd_id = p.sp_id)";
    return pdo_query($sql);
}
// function load_doanhthu(){
//     $sql = "SELECT order_date, SUM(total) AS doanhthu
//     FROM order
//     GROUP BY order_date;
//     ";
//     return pdo_query($sql);
// }
function load_doanhthu(){
    $conn = connect();
    $stmt = $conn->prepare("SELECT order_date, SUM(hd_id) AS doanhso
    FROM order
    GROUP BY order_date");
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $result = $stmt->fetchAll();
    return $result;
}

function load_doanhthu_gg(){
    // tông doanh thu 
    $sql = "SELECT SUM(hd_id) AS doanhso
    FROM order
    ";
    return pdo_query($sql);
}

function thongke(){
    $conn = connect();
    $stmt = $conn->prepare("SELECT
        YEAR(o.order_date) AS nam,
        MONTH(o.order_date) AS thang,
        c.dm_name AS tendanhmuc,
        p.sp_name AS tensanpham,
        SUM(od.sp_quantity) AS soluongban,
        SUM(od.sp_quantity * CAST(p.sp_sale AS DECIMAL(15,0))) AS doanhthu
    FROM
        `order` o
    JOIN
        orderdetail od ON o.hd_id = od.hd_id
    JOIN
        product p ON od.sp_id = p.sp_id
    JOIN
        category c ON p.dm_id = c.dm_id
    GROUP BY
        YEAR(o.order_date), MONTH(o.order_date), c.dm_id, p.sp_id
    ORDER BY
        YEAR(o.order_date) DESC, MONTH(o.order_date) DESC, doanhthu DESC");
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $result = $stmt->fetchAll();
    return $result;
}
function spbanchay(){
    $conn = connect();
    $stmt = $conn->prepare("SELECT
    p.sp_id,
    p.sp_name AS product_name,
    c.dm_name AS category_name,
    p.sp_price,
    p.sp_sale,
    p.sp_quantity,
    p.sp_description,
    p.kt_id,
    p.dm_id,
    p.sp_image,
    SUM(od.sp_quantity) AS total_sold
FROM
    product p
JOIN
    orderdetail od ON p.sp_id = od.sp_id
JOIN
    category c ON p.dm_id = c.dm_id
GROUP BY
    p.sp_id
ORDER BY
    total_sold DESC");
     $stmt->execute();
     $stmt->setFetchMode(PDO::FETCH_ASSOC);
     $result = $stmt->fetchAll();
     return $result;
}
function thongke2(){
    $conn = connect();
    $stmt = $conn->prepare("SELECT
    DATE_FORMAT(STR_TO_DATE(o.order_date, '%Y-%m-%d %H:%i:%s'), '%Y-%m') AS month_year,
    SUM(od.sp_quantity * p.sp_sale) AS total_revenue_month,
    DATE_FORMAT(STR_TO_DATE(o.order_date, '%Y-%m-%d %H:%i:%s'), '%Y') AS year,
    SUM(od.sp_quantity * p.sp_sale) AS total_revenue_year
FROM
    `order` o
JOIN
    orderdetail od ON o.hd_id = od.hd_id
JOIN
    product p ON od.sp_id = p.sp_id
GROUP BY
    month_year, year
ORDER BY
    year, month_year");
     $stmt->execute();
     $stmt->setFetchMode(PDO::FETCH_ASSOC);
     $result = $stmt->fetchAll();
     return $result;
}

?>

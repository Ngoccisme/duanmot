<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đơn hàng thành công</title>
</head>
<style>
    body {
    font-family: 'Arial', sans-serif;
    background-color: #f5f5f5;
    margin: 0;
    padding: 0;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    height: 100vh;
}

h1 {
    color: #333;
}

p {
    margin: 10px 0;
    color: #555;
}

button {
    background-color: #4CAF50;
    color: white;
    padding: 10px 20px;
    font-size: 16px;
    border: none;
    cursor: pointer;
    border-radius: 5px;
}

button:hover {
    background-color: #45a049;
}

/* Thêm kiểu dáng cho hộp thoại alert (đối với thông báo sau 5 giây) */
.alert {
    display: none;
    position: fixed;
    top: 20px;
    left: 50%;
    transform: translateX(-50%);
    background-color: #f2f2f2;
    padding: 20px;
    border: 1px solid #ddd;
    border-radius: 5px;
    color: #333;
    font-size: 16px;
    z-index: 1000;
}

/* Animation cho hộp thoại alert */
@keyframes slideIn {
    from {
        top: -100px;
    }
    to {
        top: 20px;
    }
}

.alert.show {
    display: block;
    animation: slideIn 0.5s ease-out;
}
</style>
<body>
    <h1>Đơn hàng của bạn đã được thanh toán thành công!</h1>

    <!-- Hiển thị thông tin đơn hàng -->
    <p>Số đơn hàng: #12345</p>
    <p>Tổng tiền: <?=number_format( $total ,0,",",".")?></p>
    <!-- Thêm các thông tin đơn hàng khác nếu cần -->

    <!-- Nút "Tiếp tục mua hàng" -->
    <button onclick="continueShopping()">Tiếp tục mua hàng</button>
    <button onclick="continueHistory()">Đơn hàng của bạn</button>

    <script>
        function continueShopping() {
            // Thực hiện các hành động khi người dùng nhấp vào nút "Tiếp tục mua hàng"
            // Ví dụ: chuyển hướng người dùng đến trang mua hàng
            window.location.href = "index.php?url=san-pham";
        }
        script>
        function continueHistory() {
            // Thực hiện các hành động khi người dùng nhấp vào nút "Tiếp tục mua hàng"
            // Ví dụ: chuyển hướng người dùng đến trang mua hàng
            window.location.href = "index.php?url=lich-su";
        }

        // Đợi 5 giây sau khi trang đã load
        setTimeout(function() {
            // Thực hiện các hành động hiển thị sau 5 giây
            alert('Cảm ơn bạn đã mua hàng!');
        }, 2000);
    </script>
</body>
</html>

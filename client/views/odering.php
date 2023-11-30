<style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        .success-container {
            text-align: center;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease-in-out;
        }

        .success-container:hover {
            transform: scale(1.1);
        }

        .success-icon {
            color: #4CAF50;
            font-size: 64px;
        }

        h1 {
            color: #333;
        }

        p {
            color: #666;
            font-size: 18px;
            margin-top: 10px;
        }

        a {
            color: #4CAF50;
            text-decoration: none;
            font-weight: bold;
        }

        /* a:hover {
            text-decoration: underline;
        } */
    </style>
</head>
<body>

<div class="success-container">
    <span class="success-icon">&#10004;</span>
    <h1>Đặt Hàng Thành Công!</h1>
    <p>Cảm ơn bạn đã đặt hàng. Đơn hàng của bạn đã được ghi nhận.</p>
    <p>Nhấn <a href="index.php?url=order-history">vào đây</a> để quay lại trang chủ.</p>
</div>

</body>
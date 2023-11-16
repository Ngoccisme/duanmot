<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="assets/css/style copy.css">
    <title> Login </title>
</head>

<body>

    <div class="container" id="container">
        <div class="form-container sign-up">
            <form>
                <h1>Tạo Tài Khoản</h1>
                <div class="social-icons">
                    <a href="#" class="icon"><i class="fa-brands fa-google-plus-g"></i></a>
                    <a href="#" class="icon"><i class="fa-brands fa-facebook-f"></i></a>
                    <a href="#" class="icon"><i class="fa-brands fa-github"></i></a>
                    <a href="#" class="icon"><i class="fa-brands fa-linkedin-in"></i></a>
                </div>
                <span>hoặc sử dụng email của bạn để đăng kí</span>
                <input type="text" name="" placeholder="Name">
                <input type="file" name="" type="">
                <input type="email" placeholder="Email">
                <input type="password" placeholder="Password">
                <button>ĐĂNG KÍ</button>
            </form>
        </div>
        <div class="form-container sign-in">
            <form>
                <h1>ĐĂNG NHẬP</h1>
                <div class="social-icons">
                    <a href="#" class="icon"><i class="fa-brands fa-google-plus-g"></i></a>
                    <a href="#" class="icon"><i class="fa-brands fa-facebook-f"></i></a>
                    <a href="#" class="icon"><i class="fa-brands fa-github"></i></a>
                    <a href="#" class="icon"><i class="fa-brands fa-linkedin-in"></i></a>
                </div>
                <span>hoặc sử dụng mật khẩu email của bạn</span>
                <input type="email" placeholder="Email">
                <input type="password" placeholder="Password">
                <a href="#">Quên Mật Khẩu?</a>
                <button>ĐĂNG NHẬP</button>
            </form>
        </div>
        <div class="toggle-container">
            <div class="toggle">
                <div class="toggle-panel toggle-left">
                    <h1>Chào mừng trở lại !</h1>
                    <p>Nhập thông tin cá nhân của bạn để sử dụng tất cả các tính năng của trang web</p>
                    <button class="hidden" id="login">ĐĂNG NHẬP</button>
                </div>
                <div class="toggle-panel toggle-right">
                    <h1>Chào bạn !</h1>
                    <p>Đăng kí với thông tin cá nhân của bạn để sử dụng tất cả các tính năng của trang web</p>
                    <button class="hidden" id="register">ĐĂNG KÍ</button>
                </div>
            </div>
        </div>
    </div>

    <script src="assets/js/script.js"></script>
</body>

</html>
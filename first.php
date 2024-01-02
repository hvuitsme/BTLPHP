<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/login.css">
    <title>Log in</title>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <div class="container d-flex justify-content-center align-items-center vh-100">
        <div class="row border-4 rounded-5 p-3 bg-white shadow box-area">
            <div class="col-md-5 d-flex justify-content-center align-items-center flex-column left-box"
                style="padding-left: 0;">
                <div class="featured-image">
                    <img class="rounded-4 imgbox" src="./img/feature-image.jpg" alt="anhdangnhap">
                </div>
            </div>
            <div class="col-md-7">
                <div class="row align-items-center" id="dangNhap">
                    <div class="header-text mb-4">
                        <p>Đăng nhập</p>
                    </div>

                    <form id="loginForm" method="POST" action="./login/login.php">
                        <div class="mb-3">
                            <input type="text" class="form-control" id="loginUsername" name="loginUsername" required
                                placeholder="Username">
                        </div>

                        <div class="mb-3">
                            <input type="password" class="form-control" id="loginPassword" name="loginPassword" required
                                placeholder="Password">
                        </div>

                        <div class="input-group mb-5 d-flex justify-content-between">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="formCheck">
                                <label for="formCheck" class="form-check-label text-secondary"><small>Ghi nhớ
                                        tôi</small></label>
                            </div>
                            <div class="forgot">
                                <small><a href="#">Quên mật khẩu?</a></small>
                            </div>
                        </div>

                        <div class="loggin-button mb-3">
                            <button type="summit" class="btn btn-outline-primary w-100">Đăng nhập</button>
                        </div>

                        <div class="register text-center">
                            <small>Bạn chưa có tài khoản: <a href="#" id="dangKyLink">Đăng ký ngay</a></small>
                        </div>
                    </form>
                </div>

                <div class="row align-items-center" id="dangKy">
                    <div class="header-text mb-4">
                        <p>Đăng ký</p>
                    </div>

                    <form id="registrationForm" method="POST" action="./login/register.php">
                        <div class="mb-3">
                            <input type="text" class="form-control" id="username" name="username" required
                                placeholder="Username">
                        </div>

                        <div class="mb-3">
                            <input type="email" class="form-control" id="email" name="email" required
                                placeholder="Email">
                        </div>

                        <div class="input-group mb-3">
                            <input type="password" class="form-control" id="password" name="password" required
                                placeholder="Password">
                        </div>

                        <div class="input-group mb-3">
                            <input type="password" class="form-control" id="confirmPassword" name="confirmPassword"
                                required placeholder="Confirm password">
                        </div>

                        <div class="loggin-button mb-3">
                            <button type="summit" class="btn btn-outline-primary w-100">Đăng ký</button>
                        </div>

                        <div class="login text-center">
                            <small>Bạn chưa có tài khoản: <a href="#" id="dangNhapLink">Đăng nhập ngay</a></small>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <!-- Form Đăng Nhập -->
    <!-- <section class="py-4">
        <div class="container">
            <div class="row">
                <div class="col-md-6 offset-md-3">
                    <h2 class="text-center mb-4">Đăng nhập</h2>
                    <form id="loginForm" method="POST" action="./login/login.php">
                        <div class="mb-3">
                            <label for="loginUsername" class="form-label">Tên đăng nhập:</label>
                            <input type="text" class="form-control" id="loginUsername" name="loginUsername" required>
                        </div>
                        <div class="mb-3">
                            <label for="loginPassword" class="form-label">Mật khẩu:</label>
                            <input type="password" class="form-control" id="loginPassword" name="loginPassword"
                                required>
                        </div>
                        <button type="submit" class="btn btn-primary">Đăng nhập</button>
                    </form>
                </div>
            </div>
        </div>
    </section> -->

    <!-- Form Đăng Ký -->
    <!-- <section class="py-4">
        <div class="container">
            <div class="row">
                <div class="col-md-6 offset-md-3">
                    <h2 class="text-center mb-4">Đăng ký</h2>
                    <form id="registrationForm" method="POST" action="./login/register.php">
                        <div class="mb-3">
                            <label for="username" class="form-label">Tên người dùng:</label>
                            <input type="text" class="form-control" id="username" name="username" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email:</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Mật khẩu:</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Đăng ký</button>
                    </form>
                </div>
            </div>
        </div>
    </section> -->

    <script>
        function hienThiDangNhap() {
            document.getElementById('dangKy').style.display = 'none';
            document.getElementById('dangNhap').style.display = 'block';
        }

        function hienThiDangKy() {
            document.getElementById('dangNhap').style.display = 'none';
            document.getElementById('dangKy').style.display = 'block';
        }

        function kiemTraMatKhau() {
            var password = document.getElementById('password').value;
            var confirmPassword = document.getElementById('confirmPassword').value;

            if (password === confirmPassword) {
                // Thực hiện đăng ký thành công
                alert("Đăng ký thành công!");
            } else {
                // Hiển thị thông báo hoặc thực hiện hành động khác khi mật khẩu không trùng khớp
                alert("Mật khẩu không trùng khớp. Vui lòng nhập lại.");
            }
        }

        document.addEventListener('DOMContentLoaded', function () {
            // Lắng nghe sự kiện click trên liên kết "Đăng ký ngay"
            document.querySelector('#dangKyLink').addEventListener('click', function () {
                hienThiDangKy(); // Gọi hàm để ẩn dangNhap và hiển thị dangKy
            });
        });

        document.addEventListener('DOMContentLoaded', function () {
            // Lắng nghe sự kiện click trên liên kết "Đăng ký ngay"
            document.querySelector('#dangNhapLink').addEventListener('click', function () {
                hienThiDangNhap(); // Gọi hàm để ẩn dangNhap và hiển thị dangKy
            });
        });
    </script>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C
        6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>
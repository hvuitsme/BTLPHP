<?php
include_once './mail/index.php';
$mail = new Mailer();
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/login.css">
    <title>Log in</title>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
    <div class="container d-flex justify-content-center align-items-center vh-100">
        <div class="row border-4 rounded-5 p-3 bg-white shadow box-area">
            <div class="col-md-5 d-flex justify-content-center align-items-center flex-column left-box" style="padding-left: 0;">
                <div class="featured-image">
                    <img class="rounded-4 imgbox" src="./img/feature-image.jpg" alt="anhdangnhap">
                </div>
            </div>
            <div class="col-md-7">

                <!-- đăng nhập -->

                <div class="row align-items-center" id="dangNhap">
                    <div class="header-text mb-4">
                        <p>Đăng nhập</p>
                    </div>

                    <form id="loginForm" method="POST" action="./Security/login.php">
                        <div class="mb-3">
                            <input type="text" class="form-control" id="loginUsername" name="loginUsername" required placeholder="Username">
                        </div>

                        <div class="mb-3">
                            <input type="password" class="form-control" id="loginPassword" name="loginPassword" required placeholder="Password">
                        </div>

                        <div class="input-group mb-5 d-flex justify-content-between">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="formCheck">
                                <label for="formCheck" class="form-check-label text-secondary">
                                    <small>Ghi nhớ tôi</small>
                                </label>
                            </div>
                            <div class="forgot">
                                <small><a href="#" id="QmKhau">Quên mật khẩu?</a></small>
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

                <!-- đăng ký -->

                <div class="row align-items-center" id="dangKy">
                    <div class="header-text mb-4">
                        <p>Đăng ký</p>
                    </div>

                    <form id="registrationForm" method="POST" action="./Security/register.php">
                        <div class="mb-3">
                            <input type="text" class="form-control" id="username" name="username" required placeholder="Username">
                        </div>

                        <div class="mb-3">
                            <input type="email" class="form-control" id="email" name="email" required placeholder="Email">
                        </div>

                        <div class="input-group mb-3">
                            <input type="password" class="form-control" id="password" name="password" required placeholder="Password">
                        </div>

                        <div class="input-group mb-3">
                            <input type="password" class="form-control" id="confirmPassword" name="confirmPassword" required placeholder="Confirm password">
                        </div>

                        <div class="loggin-button mb-3">
                            <button type="summit" class="btn btn-outline-primary w-100">Đăng ký</button>
                        </div>

                        <div class="login text-center">
                            <small>Bạn đã có tài khoản: <a href="#" id="dangNhapLink">Đăng nhập ngay</a></small>
                        </div>
                    </form>
                </div>

                <!-- quên mật khẩu -->

                <div class="row align-items-center" id="quenMatKhau">
                    <!-- Form và nút cho phần quên mật khẩu -->
                    <div class="header-text mb-4">
                        <p>Quên mật khẩu</p>
                    </div>

                    <form id="forgotPasswordForm" method="POST" action="./Security/forgot_password.php">
                        <div class="mb-3">
                            <input type="text" class="form-control" id="forgotUser" name="forgotUser" required placeholder="User">
                        </div>
                        <div class="mb-3">
                            <input type="email" class="form-control" id="forgotEmail" name="forgotEmail" required placeholder="Email">
                        </div>

                        <div class="loggin-button mb-3">
                            <button type="submit" class="btn btn-outline-primary w-100">Gửi yêu cầu</button>
                        </div>
                    </form>

                    <div class="register text-center">
                        <small><a href="#" id="quayVeDangNhap">Quay lại đăng nhập</a></small>
                    </div>
                </div>

                <!-- Nhập OTP -->

                <div class="row align-items-center" id="nhapOTP">
                    <!-- Form và nút cho phần nhập OTP -->
                    <div class="header-text mb-4">
                        <p>Nhập OTP</p>
                    </div>

                    <form id="verifyOTPForm" method="POST" action="./Security/verify_otp.php">
                        <input type="hidden" name="forgotUser" value="<?php echo isset($_POST['forgotUser']) ? $_POST['forgotUser'] : ''; ?>">
                        <input type="hidden" name="forgotEmail" value="<?php echo isset($_POST['forgotEmail']) ? $_POST['forgotEmail'] : ''; ?>">

                        <div class="mb-3">
                            <input type="text" class="form-control" id="OTP" name="OTP" required placeholder="Nhập OTP">
                        </div>

                        <div class="loggin-button mb-3">
                            <button type="submit" class="btn btn-outline-primary w-100">Gửi yêu cầu</button>
                        </div>
                    </form>
                </div>

                <!-- Đổi mật khẩu sau khi nhập OTP -->

                <div class="row align-items-center" id="rsPass">
                    <div class="header-text mb-4">
                        <p>Thay đổi mật khẩu</p>
                    </div>

                    <form id="rsPassForm" method="POST" action="./Security/rspass.php">
                        <!-- Thêm trường ẩn để truyền user/email -->
                        <input type="hidden" name="forgotUser" value="<?php echo isset($_POST['forgotUser']) ? $_POST['forgotUser'] : ''; ?>">
                        <input type="hidden" name="forgotEmail" value="<?php echo isset($_POST['forgotEmail']) ? $_POST['forgotEmail'] : ''; ?>">

                        <?php
                        include "C:/xampp/php/BAITAP/BTLPHP/db/dbconnect.php";
                        $forgotUser = $_SESSION['forgotPasswordUser'];
                        $forgotEmail = $_SESSION['forgotPasswordEmail'];

                        // Thực hiện truy vấn để lấy tên và email cho tài khoản cụ thể
                        $query = "SELECT user, email FROM users WHERE user = '$forgotUser' AND email = '$forgotEmail'";
                        $result = $conn->query($query);

                        // Kiểm tra và hiển thị kết quả
                        if ($result->num_rows > 0) {
                            // Lặp qua từng dòng kết quả
                            while ($row = $result->fetch_assoc()) {
                                // Hiển thị tên và email
                                echo "<p>Tên: " . $row["user"] . "<br>Email: " . $row["email"] . "</p>";
                            }
                        } else {
                            echo "Không có dữ liệu hoặc thông tin không chính xác.";
                        }

                        // Đóng kết nối
                        $conn->close();
                        ?>
                        <div class="input-group mb-3">
                            <input type="password" class="form-control" id="NewPassword" name="NewPassword" required placeholder="Mật khẩu mới">
                        </div>

                        <div class="input-group mb-3">
                            <input type="password" class="form-control" id="CNewPassword" name="CNewPassword" required placeholder="Xác nhận mật khẩu mới">
                        </div>

                        <div class="rspass-button mb-3">
                            <button type="submit" class="btn btn-outline-primary w-100">Thay đổi mật khẩu</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        // hiển thị đăng nhập
        function hienThiDangNhap() {
            document.getElementById('dangKy').style.display = 'none';
            document.getElementById('quenMatKhau').style.display = 'none';
            document.getElementById('nhapOTP').style.display = 'none';
            document.getElementById('rsPass').style.display = 'none';
            document.getElementById('dangNhap').style.display = 'block';
        }

        // hiển thị đăng ký
        function hienThiDangKy() {
            document.getElementById('quenMatKhau').style.display = 'none';
            document.getElementById('nhapOTP').style.display = 'none';
            document.getElementById('rsPass').style.display = 'none';
            document.getElementById('dangNhap').style.display = 'none';
            document.getElementById('dangKy').style.display = 'block';
        }

        // hiển thị quên mật khẩu
        function hienThiQuenMatKhau() {
            document.getElementById('dangNhap').style.display = 'none';
            document.getElementById('dangKy').style.display = 'none';
            document.getElementById('nhapOTP').style.display = 'none';
            document.getElementById('rsPass').style.display = 'none';
            document.getElementById('quenMatKhau').style.display = 'block';
        }

        // hiển thị nhập OTP
        // function hienThiOTP() {
        //     document.getElementById('dangNhap').style.display = 'none';
        //     document.getElementById('dangKy').style.display = 'none';
        //     document.getElementById('quenMatKhau').style.display = 'none';
        //     document.getElementById('nhapOTP').style.display = 'block';
        // }

        // kiểm tra mật khẩu phải trùng nhau của đăng ký
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

        // hành động cho nút đăng ký
        document.addEventListener('DOMContentLoaded', function() {
            // Lắng nghe sự kiện click trên liên kết "Đăng ký ngay"
            document.querySelector('#dangKyLink').addEventListener('click', function() {
                hienThiDangKy();
            });
        });

        // hành dộng cho nút quên mật khẩu
        document.addEventListener('DOMContentLoaded', function() {
            document.querySelector('#QmKhau').addEventListener('click', function(event) {
                event.preventDefault();
                hienThiQuenMatKhau();
            });

            document.querySelector('#quayVeDangNhap').addEventListener('click', function(event) {
                event.preventDefault();
                hienThiDangNhap();
            });
        });

        // hành động cho nút đăng nhập
        document.addEventListener('DOMContentLoaded', function() {
            // Lắng nghe sự kiện click trên liên kết "Đăng nhập ngay"
            document.querySelector('#dangNhapLink').addEventListener('click', function() {
                hienThiDangNhap(); // Gọi hàm để ẩn dangKy và hiển thị dangNhap
            });
        });

        document.addEventListener('DOMContentLoaded', function() {
            document.getElementById('forgotPasswordForm').addEventListener('submit', function(event) {
                event.preventDefault(); // Ngăn chặn form submit mặc định

                // Thực hiện AJAX request để xác nhận thông tin và nhận kết quả từ server
                // Trong trường hợp thành công, chuyển hướng đến phần nhapOTP và hiển thị alert
                // Trong trường hợp lỗi, hiển thị thông báo lỗi

                var formData = new FormData(this);

                fetch('./Security/forgot_password.php', {
                        method: 'POST',
                        body: formData
                    })
                    .then(response => response.text())
                    .then(data => {
                        if (data.includes('Message has been sent')) {
                            // Chuyển hướng đến phần nhapOTP
                            document.getElementById('quenMatKhau').style.display = 'none';
                            document.getElementById('nhapOTP').style.display = 'block';

                            // Hiển thị alert với SweetAlert
                            Swal.fire({
                                title: 'Thành công!',
                                text: 'Một email chứa OTP đã được gửi đến địa chỉ email của bạn.',
                                icon: 'success',
                                showConfirmButton: false,
                                timer: 2000
                                // confirmButtonText: 'OK'
                            });
                        } else {
                            // Hiển thị alert với SweetAlert
                            Swal.fire({
                                title: 'Lỗi!',
                                text: 'Có lỗi xảy ra. Vui lòng thử lại.',
                                icon: 'error',
                                showConfirmButton: false,
                                timer: 2000
                                // confirmButtonText: 'OK'
                            });
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        // Hiển thị alert với SweetAlert
                        Swal.fire({
                            title: 'Lỗi!',
                            text: 'Có lỗi xảy ra. Vui lòng thử lại.',
                            icon: 'error',
                            showConfirmButton: false,
                            timer: 2000
                            // confirmButtonText: 'OK'
                        });
                    });
            });
        });

        // hành động chuyển sang đổi mật khẩu
        document.getElementById("verifyOTPForm").addEventListener("submit", function(event) {
            // Ngăn chặn form submit mặc định để thực hiện xử lý bằng JavaScript
            event.preventDefault();

            // Thực hiện kiểm tra mã OTP (có thể gọi API kiểm tra ở đây)

            // Giả sử kiểm tra thành công, ẩn nhapOTP và hiện rsPass
            document.getElementById("nhapOTP").style.display = "none";
            document.getElementById("rsPass").style.display = "block";

            // Hiển thị SweetAlert thông báo nhập OTP thành công
            Swal.fire({
                icon: 'success',
                title: 'Nhập OTP thành công!',
                text: 'Bạn đã nhập mã OTP thành công.',
                showConfirmButton: false,
                timer: 2000
            });
        });

        // hành động sau khi summit đổi mật khẩu thành công thì quay về đăng nhập
        document.getElementById("rsPassForm").addEventListener("submit", function(event) {
            // Ngăn chặn form submit mặc định để thực hiện xử lý bằng JavaScript
            event.preventDefault();

            // Thực hiện kiểm tra và cập nhật mật khẩu trong cơ sở dữ liệu (tương tự như bạn đã làm)

            // Giả sử kiểm tra và cập nhật thành công
            // Ẩn rsPass và hiển thị dangNhap
            document.getElementById("rsPass").style.display = "none";
            document.getElementById("dangNhap").style.display = "block";

            // Hiển thị SweetAlert thông báo thành công
            Swal.fire({
                title: "Thay đổi thành công!",
                icon: "success",
                showConfirmButton: false,
                timer: 2000
            });
        });
    </script>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C
        6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>
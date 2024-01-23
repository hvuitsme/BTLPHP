<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Pass</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
    <?php
    session_start();

    // Lấy thông tin người dùng từ session
    $user = isset($_SESSION['forgotPasswordUser']) ? $_SESSION['forgotPasswordUser'] : null;
    $email = isset($_SESSION['forgotPasswordEmail']) ? $_SESSION['forgotPasswordEmail'] : null;

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Thực hiện kết nối đến cơ sở dữ liệu
        include "C:/xampp/php/BAITAP/BTLPHP1/db/dbconnect.php";

        // Kiểm tra xem tài khoản có tồn tại trong bảng users không
        $stmt_check_user = $conn->prepare('SELECT * FROM users WHERE user = ? AND email = ?');
        $stmt_check_user->bind_param('ss', $user, $email);
        $stmt_check_user->execute();

        // Lấy kết quả của truy vấn
        $result_check_user = $stmt_check_user->get_result();
        $userData_check_user = $result_check_user->fetch_assoc();

        // Kiểm tra xem tài khoản có tồn tại hay không
        if ($userData_check_user) {
            // Thực hiện bước đổi mật khẩu
            $newPassword = $_POST['NewPassword'];

            // Update mật khẩu mới vào cơ sở dữ liệu
            $stmt_update_password = $conn->prepare('UPDATE users SET password = ? WHERE user = ? AND email = ?;');
            $stmt_update_password->bind_param('sss', $newPassword, $user, $email);
            $stmt_update_password->execute();

            // echo "Đã đổi mật khẩu thành công!";
            echo '<script type="text/javascript">
                Swal.fire({
                    title: "Thay đổi thành công!",
                    icon: "success",
                    // confirmButtonText: "OK"
                    showConfirmButton: false,
                    timer: 2000 // Ẩn sau 1 giây
                }).then(function() {
                    window.location.href = "/xampp/php/BAITAP/BTLPHP/Customer/first.php"; // Đường dẫn tuyệt đối của hoàn
                    // window.location.href = "http://localhost:3000/first.php"; // Sử dụng đường dẫn tuyệt đối của quỳnh
                });
            </script>';
        } else {
            echo "Tài khoản không tồn tại trong cơ sở dữ liệu.";
        }

        // Đóng kết nối
        $stmt_check_user->close();
        $stmt_update_password->close();
        $conn->close();

        // Xoá session sau khi truy vấn xong
        session_unset();
        session_destroy();
    }
    ?>
</body>

</html>
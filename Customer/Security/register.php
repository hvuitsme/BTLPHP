<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Success register</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
    <?php
    // Kết nối đến cơ sở dữ liệu
    // $servername = "localhost";
    // $username = "root";
    // $password = "";
    // $dbname = "web";
    
    // $conn = new mysqli($servername, $username, $password, $dbname);
    
    // // Kiểm tra kết nối
    // if ($conn->connect_error) {
    //     die("Kết nối không thành công: " . $conn->connect_error);
    // }
    
    // // Xử lý đăng ký khi form được gửi đi
    // if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //     $username = $_POST["username"];
    //     $email = $_POST["email"];
    //     $password = password_hash($_POST["password"], PASSWORD_DEFAULT);
    
    //     // Thêm người dùng vào cơ sở dữ liệu
    //     $sql = "INSERT INTO users (user, email, password) VALUES ('$username', '$email', '$password')";
    
    //     if ($conn->query($sql) === TRUE) {
    //         echo "Đăng ký thành công!";
    //     } else {
    //         echo "Lỗi: " . $sql . "<br>" . $conn->error;
    //     }
    // }
    
    // // Đóng kết nối đến cơ sở dữ liệu
    // $conn->close();
    ?>

    <?php
    // Kết nối đến cơ sở dữ liệu
    include "../db/dbconnect.php";

    // Xử lý đăng ký khi form được gửi đi
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = $_POST["username"];
        $email = $_POST["email"];
        $password = $_POST["password"];  // Giữ mật khẩu dưới dạng văn bản thông thường
        // $password = md5($_POST["password"]);  // Sử dụng md5 để mã hóa mật khẩu
        // $password = password_hash($_POST["password"], PASSWORD_DEFAULT);

        // Thêm người dùng vào cơ sở dữ liệu
        $sql = "INSERT INTO users (user, email, password) VALUES ('$username', '$email', '$password')";

        if ($conn->query($sql) === TRUE) {
            // Đăng ký thành công
            echo '<script type="text/javascript">
                Swal.fire({
                    title: "Đăng ký thành công!",
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
            // Lỗi đăng ký
            echo '<script type="text/javascript">
                Swal.fire({
                    title: "Lỗi",
                    text: "' . $sql . '\\n' . $conn->error . '",
                    icon: "error",
                    // confirmButtonText: "OK"
                    showConfirmButton: false,
                    timer: 2000 // Ẩn sau 1 giây
                }).then(function() {
                    window.location.href = "/xampp/php/BAITAP/BTLPHP/Customer/home/first.php"; // Đường dẫn tuyệt đối
                });
            </script>';
        }
    }

    // Đóng kết nối đến cơ sở dữ liệu
    $conn->close();
    ?>


</body>

</html>
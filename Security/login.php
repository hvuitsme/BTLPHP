<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Success login</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
    <?php
    // // Kết nối đến cơ sở dữ liệu
    // include 'C:/xampp/php/BAITAP/BTLPHP/db/dbconnect.php';

    // // Xử lý đăng nhập khi form được gửi đi
    // if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //     $loginUsername = $_POST["loginUsername"];
    //     $loginPassword = $_POST["loginPassword"];

    //     // Truy vấn kiểm tra đăng nhập
    //     $sql = "SELECT * FROM users WHERE user='$loginUsername'";
    //     $result = $conn->query($sql);

    //     if ($result->num_rows > 0) {
    //         $row = $result->fetch_assoc();
    //         // if (password_verify($loginPassword, $row["password"]) {
    //         if ($loginPassword === $row["password"]) {
    //             // Đăng nhập thành công
    //             session_start();
    //             $_SESSION['username'] = $row['user'];
    //             echo '<script type="text/javascript">
    //                     Swal.fire({
    //                         title: "Đăng nhập thành công!",
    //                         icon: "success",
    //                         showConfirmButton: false,
    //                         timer: 2000
    //                     }).then(function() {
    //                         // window.location.href = "/xampp/php/BAITAP/BTLPHP/home/index.php"; // Đường dẫn đầy đủ của hoàn
    //                         // window.location.href = "http://localhost:3000/home/index.php"; // Đường dẫn đầy đủ của quỳnh
    //                     });
    //                 </script>';
    //             exit();
    //         } else {
    //             // Sai mật khẩu
    //             echo '<script type="text/javascript">
    //                     Swal.fire({
    //                         title: "Sai mật khẩu!",
    //                         icon: "error",
    //                         text: "Vui lòng kiểm tra lại mật khẩu.",
    //                         showConfirmButton: false,
    //                         timer: 2000 // Ẩn sau 1 giây
    //                     }).then(function() {
    //                         // window.location.href = "/xampp/php/BAITAP/BTLPHP/first.php#"; // Sử dụng đường dẫn tuyệt đối của hoàn
    //                         window.location.href = "http://localhost:3000/home/index.php"; // Đường dẫn đầy đủ của quỳnh
    //                     });
    //                 </script>';
    //         }
    //     } else {
    //         // Tên đăng nhập không tồn tại
    //         echo '<script type="text/javascript">
    //                 Swal.fire({
    //                     title: "Tên đăng nhập không tồn tại!",
    //                     icon: "error",
    //                     text: "Vui lòng kiểm tra lại tên đăng nhập.",
    //                     showConfirmButton: false,
    //                     timer: 2000 // Ẩn sau 1 giây
    //                 }).then(function() {
    //                     // window.location.href = "/xampp/php/BAITAP/BTLPHP/first.php#"; // Sử dụng đường dẫn tuyệt đối của hoàn
    //                     window.location.href = "http://localhost:3000/home/index.php"; // Đường dẫn đầy đủ của quỳnh
    //                 });
    //             </script>';
    //     }
    // }

    // // Đóng kết nối đến cơ sở dữ liệu
    // $conn->close();
    ?>

    <?php
    // Kết nối đến cơ sở dữ liệu
    include 'C:/xampp/php/BAITAP/BTLPHP/db/dbconnect.php';

    // Xử lý đăng nhập khi form được gửi đi
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $loginUsername = $_POST["loginUsername"];
        $loginPassword = $_POST["loginPassword"];

        // Truy vấn kiểm tra đăng nhập
        $sql = "SELECT * FROM users WHERE user='$loginUsername'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            if ($loginPassword === $row["password"]) {
                session_start();
                $_SESSION['username'] = $row['user'];

                // Kiểm tra nếu là admin thì chuyển hướng đến trang admin
                if ($loginUsername === "admin") {
                    echo '<script type="text/javascript">
                            window.location.href = "/xampp/php/BAITAP/BTLPHP/admin/index.php"; // Đường dẫn đầy đủ của hoàn bên phía về tài khoản admin
                            // window.location.href = "http://localhost:3000/admin/index.php";// Đường dẫn đầy đủ của quỳnh bên phía về tài khoản admin
                          </script>';
                    exit();
                } else {
                    // Đăng nhập thành công cho các tài khoản khác
                    echo '<script type="text/javascript">
                            Swal.fire({
                                title: "Đăng nhập thành công!",
                                icon: "success",
                                showConfirmButton: false,
                                timer: 2000
                            }).then(function() {
                                window.location.href = "/xampp/php/BAITAP/BTLPHP/home/index.php"; // Đường dẫn đầy đủ của hoàn
                                // window.location.href = "http://localhost:3000/home/index.php"; // Đường dẫn đầy đủ của quỳnh
                            });
                        </script>';
                    exit();
                }
            } else {
                // Sai mật khẩu
                echo '<script type="text/javascript">
                        Swal.fire({
                            title: "Sai mật khẩu!",
                            icon: "error",
                            text: "Vui lòng kiểm tra lại mật khẩu.",
                            showConfirmButton: false,
                            timer: 2000
                        }).then(function() {
                            window.location.href = "/xampp/php/BAITAP/BTLPHP/first.php#"; // Đường dẫn đầy đủ của hoàn
                        });
                    </script>';
            }
        } else {
            // Tên đăng nhập không tồn tại
            echo '<script type="text/javascript">
                    Swal.fire({
                        title: "Tên đăng nhập không tồn tại!",
                        icon: "error",
                        text: "Vui lòng kiểm tra lại tên đăng nhập.",
                        showConfirmButton: false,
                        timer: 2000
                    }).then(function() {
                        window.location.href = "/xampp/php/BAITAP/BTLPHP/first.php#";
                    });
                </script>';
        }
    }

    // Đóng kết nối đến cơ sở dữ liệu
    $conn->close();
    ?>

</body>

</html>
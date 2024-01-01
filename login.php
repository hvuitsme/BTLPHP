<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
    
    // // Xử lý đăng nhập khi form được gửi đi
// if ($_SERVER["REQUEST_METHOD"] == "POST") {
//     $loginUsername = $_POST["loginUsername"];
//     $loginPassword = $_POST["loginPassword"];
    
    //     // Truy vấn kiểm tra đăng nhập
//     $sql = "SELECT * FROM users WHERE user='$loginUsername'";
//     $result = $conn->query($sql);
    
    //     if ($result->num_rows > 0) {
//         $row = $result->fetch_assoc();
//         // if (password_verify($loginPassword, $row["password"])) {
//         //     // Đăng nhập thành công
//         //     echo json_encode(["success" => true, "redirect" => "/BTLPHP/index.php"]);
//         if (password_verify($loginPassword, $row["password"])) {
//             // Đăng nhập thành công
//             header("Location: index.php");
//             exit();
//         } else {
//             // Sai mật khẩu
//             echo json_encode(["success" => false, "message" => "Sai mật khẩu"]);
//         }
//     } else {
//         // Tên đăng nhập không tồn tại
//         echo json_encode(["success" => false, "message" => "Tên đăng nhập không tồn tại"]);
//     }
// }
    
    // // Đóng kết nối đến cơ sở dữ liệu
// $conn->close();
    ?>

    <?php
    // Kết nối đến cơ sở dữ liệu
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "web";

    $conn = new mysqli($servername, $username, $password, $dbname);

    // Kiểm tra kết nối
    if ($conn->connect_error) {
        die("Kết nối không thành công: " . $conn->connect_error);
    }

    // Xử lý đăng nhập khi form được gửi đi
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $loginUsername = $_POST["loginUsername"];
        $loginPassword = $_POST["loginPassword"];

        // Truy vấn kiểm tra đăng nhập
        $sql = "SELECT * FROM users WHERE user='$loginUsername'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            if (password_verify($loginPassword, $row["password"])) {
                // Đăng nhập thành công
                echo '<script type="text/javascript">
                    Swal.fire({
                        title: "Đăng nhập thành công!",
                        icon: "success",
                        confirmButtonText: "OK"
                    }).then(function() {
                        window.location.href = "index.php"; // Sử dụng đường dẫn tuyệt đối
                    });
                </script>';
                exit();
            } else {
                // Sai mật khẩu
                echo json_encode(["success" => false, "message" => "Sai mật khẩu"]);
            }
        } else {
            // Tên đăng nhập không tồn tại
            echo json_encode(["success" => false, "message" => "Tên đăng nhập không tồn tại"]);
        }
    }

    // Đóng kết nối đến cơ sở dữ liệu
    $conn->close();
    ?>

</body>

</html>
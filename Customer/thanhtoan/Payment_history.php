<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Xác nhận đơn hàng</title>
</head>

<body>

    <?php
    include "../header/header.php";
    ?>

    <div class="container" style="margin-top: 200px ;margin-bottom: 200px ;" >
        <h2 class="mb-4">Danh sách đơn hàng</h2>

        <?php
        include "../db/dbconnect.php";
        
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $loginUsername = $_POST["loginUsername"];

            // Truy vấn kiểm tra đăng nhập
            $sql = "SELECT * FROM users WHERE user='$loginUsername'";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();

                // Set session variable
                $_SESSION['username'] = $row['user'];
                header('Location: /index.html'); // Redirect to the home page or dashboard
                exit();
            }
        }

        // Check if the user is logged in and display the username
        if (isset($_SESSION['username'])) {
            $loggedInUsername = $_SESSION['username'];
            echo "Welcome, $loggedInUsername!";
        }

        // Truy vấn dữ liệu từ CSDL
        $query = "SELECT Ma_DH, code_sp, ho_ten, gioi_tinh, sdt, Thanh_pho, dia_chi, payment_method, Tong_tien, Trang_thai, message, users.user AS user_name
          FROM dathang 
          INNER JOIN users ON dathang.user = users.user
          WHERE users.user = '$loggedInUsername'";

        $result = mysqli_query($conn, $query);

        // Kiểm tra xem truy vấn có thành công hay không
        if (!$result) {
            die("Query failed: " . mysqli_error($conn));
        }

        // Hiển thị dữ liệu trong bảng
        if (mysqli_num_rows($result) > 0) {
            echo '<table class="table table-bordered">';
            echo '<thead class="thead-dark">';
            echo '<tr>';
            echo '<th scope="col">Mã sản phẩm</th>';
            echo '<th scope="col">Họ tên</th>';
            echo '<th scope="col">Số điện thoại</th>';
            echo '<th scope="col">Địa chỉ</th>';
            echo '<th scope="col">Tổng tiền</th>';
            echo '<th scope="col">Trạng thái</th>';
            echo '</tr>';
            echo '</thead>';
            echo '<tbody>';

            while ($row = mysqli_fetch_assoc($result)) {
                echo '<tr>';
                echo '<td>' . $row['code_sp'] . '</td>';
                echo '<td>' . $row['ho_ten'] . '</td>';
                echo '<td>' . $row['sdt'] . '</td>';
                echo '<td>' . $row['dia_chi'] . '</td>';
                echo '<td>' . $row['Tong_tien'] . '</td>';
                echo '<td>' . $row['Trang_thai'] . '</td>';
                echo '</tr>';
            }

            echo '</tbody>';
            echo '</table>';
        } else {
            echo '<div class="alert alert-warning" role="alert">Không có đơn hàng nào trong CSDL cho tài khoản này.</div>';
        }

        // Đóng kết nối
        mysqli_close($conn);
        ?>
    </div>

    <?php
    include "../footer/footer.php";
    ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
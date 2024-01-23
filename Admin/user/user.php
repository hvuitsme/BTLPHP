<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý đơn hàng</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>

    <div class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="../Main interface/index.php">Quản lý đơn hàng</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="../Main interface/index.php">Danh sách đơn hàng</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../file_update_data/upload_image.php">Thêm đơn hàng</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../user/user.php">Danh sách khách hàng</a>
                </li>
            </ul>
        </div>
    </div>

    <div class="container mt-5">
        <div id="danh-sach-khach-hang" class="w-75">
            <h2>Danh sách khách hàng</h2>

            <?php
            include "../db/dbconnect.php";

            // Truy vấn dữ liệu từ CSDL
            $query_users = "SELECT * FROM users";
            $result_users = mysqli_query($conn, $query_users);

            // Hiển thị dữ liệu trong bảng
            if (mysqli_num_rows($result_users) > 0) {
                echo '<table class="table">';
                echo '<thead>';
                echo '<tr>';
                echo '<th scope="col">Mã Khách hàng</th>';
                echo '<th scope="col">Tên người dùng</th>';
                echo '<th scope="col">Email</th>';
                echo '<th scope="col">Avatar</th>';
                echo '<th scope="col">Số dư tài khoản</th>';
                echo '</tr>';
                echo '</thead>';
                echo '<tbody>';

                while ($row_users = mysqli_fetch_assoc($result_users)) {
                    echo '<tr>';
                    echo '<th scope="row">' . $row_users['Ma_KH'] . '</th>';
                    echo '<td>' . $row_users['user'] . '</td>';
                    echo '<td>' . $row_users['email'] . '</td>';
                    echo '<td><img src="data:image/jpeg;base64,' . base64_encode($row_users['avatar']) . '" height="50" width="50"/></td>';
                    echo '<td>' . $row_users['balance'] . '</td>';
                    echo '</tr>';
                }

                echo '</tbody>';
                echo '</table>';
            } else {
                echo "Không có khách hàng nào trong CSDL.";
            }

            // Đóng kết nối
            mysqli_close($conn);
            ?>
        </div>


        <div id="them-don-hang" class="d-none">
            <!-- Phần thêm đơn hàng -->
            <!-- You can add the form or content for adding orders here -->
        </div>
    </div>

</body>

</html>
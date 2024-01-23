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

    <!-- Navigation Bar -->
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

    <!-- Main Content -->
    <div class="container mt-5">
        <div id="danh-sach-don-hang" class="d-flex justify-content-between">
            <div class="w-120">
                <h2>Danh sách đơn hàng</h2>

                <?php
                include "../db/dbconnect.php";

                // Truy vấn dữ liệu từ CSDL
                $query = "SELECT * FROM dathang";
                $result = mysqli_query($conn, $query);

                // Hiển thị dữ liệu trong bảng
                if (mysqli_num_rows($result) > 0) {
                    echo '<table class="table">';
                    echo '<thead>';
                    echo '<tr>';
                    echo '<th scope="col">Mã Đơn hàng</th>';
                    echo '<th scope="col">Mã sản phẩm</th>';
                    echo '<th scope="col">Họ tên</th>';
                    echo '<th scope="col">Số điện thoại</th>';
                    echo '<th scope="col">Địa chỉ</th>';
                    echo '<th scope="col">Tổng tiền</th>';
                    echo '<th scope="col">Trạng thái</th>';
                    echo '<th scope="col">Phương thức thanh toán</th>';
                    echo '<th scope="col">Ghi chú</th>';
                    echo '<th scope="col">Thao tác</th>';
                    echo '</tr>';
                    echo '</thead>';
                    echo '<tbody>';

                    while ($row = mysqli_fetch_assoc($result)) {
                        echo '<tr>';
                        echo '<td>' . $row['Ma_DH'] . '</td>';
                        echo '<td>' . $row['code_sp'] . '</td>';
                        echo '<td>' . $row['ho_ten'] . '</td>';
                        echo '<td>' . $row['sdt'] . '</td>';
                        echo '<td>' . $row['dia_chi'] . '</td>';
                        echo '<td>' . $row['Tong_tien'] . '</td>';
                        echo '<td>' . $row['Trang_thai'] . '</td>';
                        echo '<td>' . $row['payment_method'] . '</td>';
                        echo '<td>' . $row['message'] . '</td>';
                        echo '<td><a href="../file_update_data/edit_dathang.php?id=' . $row['Ma_DH'] . '" class="btn btn-primary">Sửa</a></td>';
                        echo '</tr>';
                    }

                    echo '</tbody>';
                    echo '</table>';
                } else {
                    echo "Không có đơn hàng nào trong CSDL.";
                }

                // Đóng kết nối
                mysqli_close($conn);
                ?>
            </div>
        </div>
    </div>

</body>

</html>
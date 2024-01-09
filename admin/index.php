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

<div class="container mt-5">
    <div class="d-flex justify-content-between">
        <div class="w-75">
            <h2>Danh sách đơn hàng</h2>

            <?php
            include 'C:/xampp/php/BAITAP/BTLPHP/db/dbconnect.php';

            // Truy vấn dữ liệu từ CSDL
            $query = "SELECT * FROM dathang";
            $result = mysqli_query($conn, $query);

            // Hiển thị dữ liệu
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo '<div class="card mt-3">';
                    echo '<div class="card-body">';
                    echo '<h5 class="card-title">Mã sản phẩm: ' . $row['code_sp'] . '</h5>';
                    echo '<p class="card-text">Số lượng: ' . $row['So_luong'] . '</p>';
                    echo '<p class="card-text">Họ tên: ' . $row['ho_ten'] . '</p>';
                    echo '<p class="card-text">Địa chỉ: ' . $row['dia_chi'] . '</p>';
                    echo '<p class="card-text">Trạng thái: ' . $row['Trang_thai'] . '</p>';
                    echo '<p class="card-text">Tổng tiền: ' . $row['Tong_tien'] . '</p>';
                    echo '<a href="edit_dathang.php?id=' . $row['id'] . '" class="btn btn-primary">Sửa</a>';
                    echo '</div>';
                    echo '</div>';
                }
            } else {
                echo "Không có đơn hàng nào trong CSDL.";
            }

            // Đóng kết nối
            mysqli_close($conn);
            ?>
        </div>

        <div class="w-25">
            <!-- Phần thêm bảng sửa chưa làm!!!! -->
        </div>
    </div>
</div>

</body>
</html>

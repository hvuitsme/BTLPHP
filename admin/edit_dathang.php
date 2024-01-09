<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sửa đơn hàng</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

<div class="container mt-5">
    <?php
    if (isset($_GET['id'])) {
        $id = $_GET['id'];

        // Kết nối CSDL
        include 'C:/xampp/php/BAITAP/BTLPHP/db/dbconnect.php';

        // Truy vấn dữ liệu từ CSDL
        $query = "SELECT * FROM dathang WHERE id = $id";
        $result = mysqli_query($conn, $query);

        // Hiển thị form sửa đổi
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            ?>
            <h2>Sửa đơn hàng</h2>
            <form action="update_dathang.php" method="post">
                <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                <div class="form-group">
                    <label for="code_sp">Mã sản phẩm:</label>
                    <input type="text" class="form-control" id="code_sp" name="code_sp" value="<?php echo $row['code_sp']; ?>" required>
                </div>
                <div class="form-group">
                    <label for="So_luong">Số lượng:</label>
                    <input type="text" class="form-control" id="So_luong" name="So_luong" value="<?php echo $row['So_luong']; ?>" required>
                </div>
                <div class="form-group">
                    <label for="ho_ten">Họ tên:</label>
                    <input type="text" class="form-control" id="ho_ten" name="ho_ten" value="<?php echo $row['ho_ten']; ?>" required>
                </div>
                <div class="form-group">
                    <label for="dia_chi">Địa chỉ:</label>
                    <input type="text" class="form-control" id="dia_chi" name="dia_chi" value="<?php echo $row['dia_chi']; ?>" required>
                </div>
                <div class="form-group">
                    <label for="Trang_thai">Trạng thái:</label>
                    <input type="text" class="form-control" id="Trang_thai" name="Trang_thai" value="<?php echo $row['Trang_thai']; ?>" required>
                </div>
                <div class="form-group">
                    <label for="Tong_tien">Tổng tiền:</label>
                    <input type="text" class="form-control" id="Tong_tien" name="Tong_tien" value="<?php echo $row['Tong_tien']; ?>" required>
                </div>
                <button type="submit" class="btn btn-primary">Lưu thay đổi</button>
            </form>
            <?php
        } else {
            echo "Không tìm thấy đơn hàng.";
        }

        // Đóng kết nối
        mysqli_close($conn);
    } else {
        echo "Không có ID đơn hàng được cung cấp.";
    }
    ?>
</div>

</body>
</html>

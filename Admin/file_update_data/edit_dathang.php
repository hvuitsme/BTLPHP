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
            include '../db/dbconnect.php';

            // Truy vấn dữ liệu từ CSDL
            $query = "SELECT * FROM dathang WHERE Ma_DH = $id"; // Assuming Ma_DH is your primary key
            $result = mysqli_query($conn, $query);

            // Hiển thị form sửa đổi
            if (mysqli_num_rows($result) > 0) {
                $row = mysqli_fetch_assoc($result);
        ?>
                <h2>Sửa đơn hàng</h2>
                <form action="update_dathang.php" method="post">
                    <input type="hidden" name="id" value="<?php echo $row['Ma_DH']; ?>">
                    <div class="form-group">
                        <label for="code_sp">Mã sản phẩm:</label>
                        <input type="text" class="form-control" id="code_sp" name="code_sp" value="<?php echo $row['code_sp']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="ho_ten">Họ tên:</label>
                        <input type="text" class="form-control" id="ho_ten" name="ho_ten" value="<?php echo $row['ho_ten']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="sdt">Số điện thoại:</label>
                        <input type="text" class="form-control" id="sdt" name="sdt" value="<?php echo $row['sdt']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="dia_chi">Địa chỉ:</label>
                        <input type="text" class="form-control" id="dia_chi" name="dia_chi" value="<?php echo $row['dia_chi']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="payment_method">Phương thức thanh toán:</label>
                        <input type="text" class="form-control" id="payment_method" name="payment_method" value="<?php echo $row['payment_method']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="Trang_thai">Trạng thái:</label>
                        <select class="form-control" id="Trang_thai" name="Trang_thai" required>
                            <option value="Chưa xác nhận" <?php echo ($row['Trang_thai'] == 'Chưa xác nhận') ? 'selected' : ''; ?>>Chưa xác nhận</option>
                            <option value="Xác Nhận" <?php echo ($row['Trang_thai'] == 'Xác Nhận') ? 'selected' : ''; ?>>Xác Nhận</option>
                            <option value="Đang vận chuyển" <?php echo ($row['Trang_thai'] == 'Đang vận chuyển') ? 'selected' : ''; ?>>Đang vận chuyển</option>
                            <option value="Thành Công" <?php echo ($row['Trang_thai'] == 'Thành Công') ? 'selected' : ''; ?>>Thành Công</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="message">Ghi chú:</label>
                        <input type="text" class="form-control" id="message" name="message" value="<?php echo $row['message']; ?>" required>
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
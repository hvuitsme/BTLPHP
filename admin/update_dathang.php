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
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Kết nối CSDL
        include 'C:/xampp/php/BAITAP/BTLPHP/db/dbconnect.php';

        // Lấy dữ liệu từ form
        $id = $_POST['id'];
        $code_sp = $_POST['code_sp'];
        $So_luong = $_POST['So_luong'];
        $ho_ten = $_POST['ho_ten'];
        $dia_chi = $_POST['dia_chi'];
        $Trang_thai = $_POST['Trang_thai'];
        $Tong_tien = $_POST['Tong_tien'];

        // Cập nhật dữ liệu vào CSDL
        $query = "UPDATE dathang SET code_sp='$code_sp', So_luong=$So_luong, ho_ten='$ho_ten', dia_chi='$dia_chi', Trang_thai='$Trang_thai', Tong_tien=$Tong_tien WHERE id=$id";

        if (mysqli_query($conn, $query)) {
            echo '<script type="text/javascript">
                Swal.fire({
                    title: "Cập nhật đơn hàng thành công!",
                    icon: "success",
                    // confirmButtonText: "OK"
                    showConfirmButton: false,
                    timer: 1000 // Ẩn sau 1 giây
                }).then(function() {
                    window.location.href = "index.php"; // Sử dụng đường dẫn tuyệt đối
                });
            </script>';
        } else {
            echo "Cập nhật đơn hàng thất bại: " . mysqli_error($conn);
        }

        // Đóng kết nối
        mysqli_close($conn);
    } else {
        echo "Phương thức không hợp lệ.";
    }
    ?>
</body>

</html>
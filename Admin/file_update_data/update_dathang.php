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
        include '../db/dbconnect.php';

        // Lấy dữ liệu từ form
        $id = $_POST['id'];
        $code_sp = $_POST['code_sp'];
        $ho_ten = $_POST['ho_ten'];
        $sdt = $_POST['sdt'];
        $dia_chi = $_POST['dia_chi'];
        $payment_method = $_POST['payment_method'];
        $Tong_tien = $_POST['Tong_tien'];
        $Trang_thai = $_POST['Trang_thai'];
        $message = $_POST['message'];

        // Cập nhật dữ liệu vào CSDL sử dụng prepared statement
        $query = "UPDATE dathang SET code_sp=?, ho_ten=?, sdt=?, dia_chi=?, payment_method=?, Trang_thai=?, message=?,Tong_tien=? WHERE Ma_DH=?";
        $stmt = mysqli_prepare($conn, $query);

        if ($stmt) {
            // chú thích:
            // s:string
            // i :int
            mysqli_stmt_bind_param($stmt, 'sssssssss', $code_sp, $ho_ten, $sdt, $dia_chi, $payment_method, $Trang_thai, $message, $Tong_tien, $id);

            if (mysqli_stmt_execute($stmt)) {
                echo '<script type="text/javascript">
                    Swal.fire({
                        title: "Cập nhật đơn hàng thành công!",
                        icon: "success",
                        showConfirmButton: false,
                        timer: 400
                    }).then(function() {
                        window.location.href = "../Main interface/index.php";
                    });
                </script>';
                // var_dump($id, $code_sp, $So_luong, $ho_ten, $sdt, $dia_chi, $Trang_thai, $Tong_tien);
            } else {
                die('Cập nhật đơn hàng thất bại: ' . mysqli_error($conn));
            }
            mysqli_stmt_close($stmt);
        } else {
            die('Cập nhật đơn hàng thất bại: ' . mysqli_error($conn));
        }

        // Đóng kết nối
        mysqli_close($conn);
    } else {
        echo "Phương thức không hợp lệ.";
    }
    ?>
</body>

</html>
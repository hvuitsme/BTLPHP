<?php
include "../db/dbconnect.php";

session_start();

if (isset($_SESSION['cart']) && is_array($_SESSION['cart'])) {
    $totalAmount = 0; // Tổng số tiền

    // Khai báo một mảng để lưu trữ mã sản phẩm
    $productCodes = array();

    foreach ($_SESSION['cart'] as $cart_item) {
        $subtotal = $cart_item['quantity'] * $cart_item['price']; // Tính tổng số tiền cho sản phẩm
        $totalAmount += $subtotal; // Cộng dồn vào tổng số tiền

        // Lưu trữ mã sản phẩm vào mảng
        $productCodes[] = $cart_item['code'];
    }
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Truy xuất dữ liệu biểu mẫu
    $name = $_POST["first_name"];
    $phone_number = $_POST["phone_number"];
    $gender = $_POST["gender"];
    $country = $_POST["country"];
    $address = $_POST["address"];
    $payment_method = $_POST["payment_method"];
    $message = $_POST["message"];

    // Chuyển mảng thành chuỗi để sử dụng trong câu truy vấn SQL
    $productCodesString = implode(", ", $productCodes);

    // Thực hiện truy vấn để thêm dữ liệu vào bảng 'dathang'
    $stmt_order = $conn->prepare("INSERT INTO dathang (code_sp, ho_ten, gioi_tinh, sdt, Thanh_pho, dia_chi, payment_method, Tong_tien, Trang_thai, message) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

    // Kiểm tra lỗi câu truy vấn
    if (!$stmt_order) {
        die("Lỗi câu truy vấn dathang: " . $conn->error);
    }

    // Set giá trị cho Thanh_pho và Trang_thai, bạn có thể cần điều chỉnh dựa trên logic của bạn
    $thanh_pho = ""; // Thanh_pho là tên cột trong bảng
    $trang_thai = "Chưa xác nhận"; // Trang_thai là tên cột trong bảng

    $stmt_order->bind_param("ssssssssss", $productCodesString, $name, $gender, $phone_number, $country, $address, $payment_method, $totalAmount, $trang_thai, $message);

    // Kiểm tra lỗi khi thực hiện truy vấn
    if (!$stmt_order->execute()) {
        echo "Lỗi khi thêm đơn hàng: " . $stmt_order->error;
        $stmt_order->close();
        $conn->close();
        exit;
    }

    // Đóng kết nối
    $stmt_order->close();
    $conn->close();

    // Chuyển hướng hoặc hiển thị thông báo thành công
    header("Location: Payment_history.php");
    exit();
}

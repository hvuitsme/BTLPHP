<?php
// add2cart.php

// Kiểm tra xem có dữ liệu được gửi từ form hay không
if(isset($_POST['add_to_cart'])){
    // Lấy dữ liệu từ form
    $product_image = $_POST['product_image'];
    $product_name = $_POST['product_name'];
    $product_code = $_POST['product_code'];
    $product_price = $_POST['product_price'];

    // Thêm sản phẩm vào giỏ hàng (ở đây chỉ là ví dụ, bạn cần sửa lại phần này theo cách bạn lưu giỏ hàng của mình)
    // Ví dụ: Lưu vào session giỏ hàng
    session_start();
    if(!isset($_SESSION['cart'])){
        $_SESSION['cart'] = array();
    }

    $cart_item = array(
        'image' => $product_image,
        'name' => $product_name,
        'code' => $product_code,
        'price' => $product_price
    );

    $_SESSION['cart'][] = $cart_item;

    // Hiển thị thông báo thành công và thông tin sản phẩm
    echo "Sản phẩm đã được thêm vào giỏ hàng thành công!<br>";

    // Hiển thị thông tin sản phẩm
    echo "<p>Thông tin sản phẩm:</p>";
    echo "<img style='height: 400px;' src='data:image/jpeg;base64,$product_image' alt='Product Image'><br>";
    echo "Tên sản phẩm: $product_name<br>";
    echo "Mã sản phẩm: $product_code<br>";
    echo "Giá: " . number_format($product_price) . '&#8363;<br>';
}
?>
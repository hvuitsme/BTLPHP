<?php
session_start();

if (isset($_POST['update_cart'])) {
    $code = $_POST['code'];
    $quantity = intval($_POST['quantity']);

    // Duyệt qua giỏ hàng và cập nhật số lượng
    foreach ($_SESSION['cart'] as &$cart_item) {
        if ($cart_item['code'] == $code) {
            $cart_item['quantity'] = $quantity;

            // Nếu số lượng là 0 hoặc âm, loại bỏ sản phẩm khỏi giỏ hàng
            if ($quantity <= 0) {
                unset($cart_item);
            }
        }
    }
}

if (isset($_POST['remove_item'])) {
    $itemToRemove = $_POST['remove_item'];

    // Duyệt qua giỏ hàng và loại bỏ sản phẩm có mã sản phẩm đã chỉ định
    foreach ($_SESSION['cart'] as $key => $cart_item) {
        if ($cart_item['code'] == $itemToRemove) {
            unset($_SESSION['cart'][$key]);
        }
    }
}

// Bạn có thể thêm các logic khác ở đây nếu cần

// Trả về một phản hồi JSON cho biết thành công
header("Content-type: application/json");
echo json_encode(['status' => 'success', 'cart' => $_SESSION['cart']]);
exit();
?>

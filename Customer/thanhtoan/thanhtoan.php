<!DOCTYPE html>
<html lang="vi">

<head>
    <title>Form thanh toán</title>
    <link rel="stylesheet" href="../css/payments.css">
    <!-- Add Bootstrap CSS link -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@100&family=Lobster&family=Taviraj:wght@100;300&display=swap" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <style>
        body {
            font-family: "Josefin Sans", sans-serif;
            font-family: "Lobster", sans-serif;
            font-family: "Taviraj", serif;
        }
    </style>
</head>

<body>
    <?php
    // Bạn cần có một session đã đăng nhập để lấy thông tin tài khoản hiện tại
    session_start();
    include "../db/dbconnect.php";
    ?>
    <form action="update_order.php" method="post">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="container mt-5">
                        <h3>Thông tin liên lạc</h3>
                        <div class="information mb-4">
                            <div class="form-group">
                                <input type="text" class="form-control" name="first_name" id="first_name" placeholder="Họ và tên">
                            </div>
                            <div class="form-group">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="phone_number" id="phone_number" placeholder="Số điện thoại">
                                </div>
                                <div class="form-group">
                                    <select class="form-control" name="gender" id="gender">
                                        <option value="">Chọn giới tính</option>
                                        <option value="Nam">Nam</option>
                                        <option value="Nữ">Nữ</option>
                                        <option value="Khác">Khác</option>
                                    </select>
                                </div>
                            </div>
                            <div id="billing_address">
                                <div class="form-group">
                                    <select class="form-control" name="country" id="country">
                                        <option value="vietnam">Vui lòng chọn tỉnh thành của bạn</option>
                                        <option value="An Giang">An Giang</option>
                                        <option value="Bà Rịa - Vũng Tàu">Bà Rịa - Vũng Tàu</option>
                                        <option value="Bạc Liêu">Bạc Liêu</option>
                                        <option value="Bắc Giang">Bắc Giang</option>
                                        <option value="Bắc Kạn">Bắc Kạn</option>
                                        <option value="Bắc Ninh">Bắc Ninh</option>
                                        <option value="Bến Tre">Bến Tre</option>
                                        <option value="Bình Định">Bình Định</option>
                                        <option value="Bình Dương">Bình Dương</option>
                                        <option value="Bình Phước">Bình Phước</option>
                                        <option value="Bình Thuận">Bình Thuận</option>
                                        <option value="Cà Mau">Cà Mau</option>
                                        <option value="Cao Bằng">Cao Bằng</option>
                                        <option value="Đắk Lắk">Đắk Lắk</option>
                                        <option value="Đắk Nông">Đắk Nông</option>
                                        <option value="Điện Biên">Điện Biên</option>
                                        <option value="Đồng Nai">Đồng Nai</option>
                                        <option value="Đồng Tháp">Đồng Tháp</option>
                                        <option value="Gia Lai">Gia Lai</option>
                                        <option value="Hà Giang">Hà Giang</option>
                                        <option value="Hà Nam">Hà Nam</option>
                                        <option value="Hà Tĩnh">Hà Tĩnh</option>
                                        <option value="Hải Dương">Hải Dương</option>
                                        <option value="Hậu Giang">Hậu Giang</option>
                                        <option value="Hòa Bình">Hòa Bình</option>
                                        <option value="Hưng Yên">Hưng Yên</option>
                                        <option value="Khánh Hòa">Khánh Hòa</option>
                                        <option value="Kiên Giang">Kiên Giang</option>
                                        <option value="Kon Tum">Kon Tum</option>
                                        <option value="Lai Châu">Lai Châu</option>
                                        <option value="Lâm Đồng">Lâm Đồng</option>
                                        <option value="Lạng Sơn">Lạng Sơn</option>
                                        <option value="Lào Cai">Lào Cai</option>
                                        <option value="Long An">Long An</option>
                                        <option value="Nam Định">Nam Định</option>
                                        <option value="Nghệ An">Nghệ An</option>
                                        <option value="Ninh Bình">Ninh Bình</option>
                                        <option value="Ninh Thuận">Ninh Thuận</option>
                                        <option value="Phú Thọ">Phú Thọ</option>
                                        <option value="Phú Yên">Phú Yên</option>
                                        <option value="Quảng Bình">Quảng Bình</option>
                                        <option value="Quảng Nam">Quảng Nam</option>
                                        <option value="Quảng Ngãi">Quảng Ngãi</option>
                                        <option value="Quảng Ninh">Quảng Ninh</option>
                                        <option value="Quảng Trị">Quảng Trị</option>
                                        <option value="Sóc Trăng">Sóc Trăng</option>
                                        <option value="Sơn La">Sơn La</option>
                                        <option value="Tây Ninh">Tây Ninh</option>
                                        <option value="Thái Bình">Thái Bình</option>
                                        <option value="Thái Nguyên">Thái Nguyên</option>
                                        <option value="Thanh Hóa">Thanh Hóa</option>
                                        <option value="Thừa Thiên Huế">Thừa Thiên Huế</option>
                                        <option value="Tiền Giang">Tiền Giang</option>
                                        <option value="Trà Vinh">Trà Vinh</option>
                                        <option value="Tuyên Quang">Tuyên Quang</option>
                                        <option value="Vĩnh Long">Vĩnh Long</option>
                                        <option value="Vĩnh Phúc">Vĩnh Phúc</option>
                                        <option value="Yên Bái">Yên Bái</option>
                                        <option value="Cần Thơ ">Cần Thơ </option>
                                        <option value="Đà Nẵng ">Đà Nẵng </option>
                                        <option value="Hải Phòng ">Hải Phòng </option>
                                        <option value="Hà Nội ">Hà Nội</option>
                                        <option value="Thành phố Hồ Chí Minh ">Thành phố Hồ Chí Minh </option>
                                    </select>

                                </div>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="address" id="address" placeholder="Địa chỉ">
                            </div>
                            <div class="form-group mb-5">
                                <input type="text" class="form-control" name="message" id="message" placeholder="Lời Nhắn Chủ Shop">
                            </div>
                        </div>




                        <div class="form-group mb-4">
                            <h3>Phương thức thanh toán</h3>
                            <p>Tất cả các giao dịch đều được bảo mật và mã hóa.</p>
                            <select class="form-control" name="payment_method" id="payment_method" onchange="showHideSTK()">
                                <option value="COD">Thanh toán khi nhận hàng (COD)</option>
                                <option value="CK">Chuyển khoản</option>
                            </select>
                            <div id="stk_display" style="display: none;">
                                <p id="stk_text">Số tài khoản: [Số tài khoản của bạn]</p>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Thanh toán</button>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="product-container mt-5">
                        <div class="container pl-3">
                            <form action="updateCart.php" method="post">
                                <!-- Thay đổi tên file và đường dẫn action theo nhu cầu của bạn -->
                                <div class="container">
                                    <?php
                                    // Kiểm tra xem giỏ hàng có tồn tại không
                                    if (isset($_SESSION['cart']) && is_array($_SESSION['cart'])) {
                                        $totalAmount = 0; // Tổng số tiền

                                        foreach ($_SESSION['cart'] as $cart_item) {
                                            $subtotal = $cart_item['quantity'] * $cart_item['price']; // Tính tổng số tiền cho sản phẩm
                                            $totalAmount += $subtotal; // Cộng dồn vào tổng số tiền
                                    ?>
                                            <div class="row cart-item pb-3">
                                                <div class="col-sm-4">
                                                    <img class="rounded-2" src="data:image/jpeg;base64,<?= $cart_item['image']; ?>" alt="Product Image">
                                                </div>
                                                <div class="col-sm-8">
                                                    <div class="container">
                                                        <div class="row">
                                                            <?= $cart_item['name']; ?>
                                                        </div>
                                                        <div class="row py-3">
                                                            <div class="col-sm-6 p-0">
                                                                <?= $cart_item['code']; ?>
                                                            </div>
                                                            <div class="col-sm-4 p-0 d-flex justify-content-end">
                                                                <?= $cart_item['price']; ?>
                                                            </div>
                                                            <div class="row">
                                                                <!-- Hiển thị số lượng -->
                                                                <?php if ($cart_item['quantity'] > 1) : ?>
                                                                    x
                                                                    <?= $cart_item['quantity']; ?>
                                                                <?php else : ?>
                                                                    x 1
                                                                <?php endif; ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php
                                        }

                                        // Hiển thị tổng số tiền
                                        ?>

                                    <?php
                                    } else {
                                        // Hiển thị thông báo nếu giỏ hàng không tồn tại
                                        echo "Giỏ hàng trống.";
                                    }
                                    ?>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="row ">
                        <div class="col d-flex justify-content-end">
                            Tổng số tiền:
                            <?= $totalAmount; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <script>
        function showHideSTK() {
            var paymentMethod = document.getElementById("payment_method").value;
            var stkDisplay = document.getElementById("stk_display");

            if (paymentMethod === "CK") {
                stkDisplay.style.display = "block";
                document.getElementById("stk_text").innerText = "Số tài khoản: [Số tài khoản của bạn]";
            } else {
                stkDisplay.style.display = "none";
            }
        }
    </script>

    <!-- tổng tiền giỏ hàng -->

    <script>
        function decreaseQuantity() {
            var input = event.target.parentElement.querySelector('.quantity-input');
            var value = parseInt(input.value) - 1;
            input.value = value > 0 ? value : 1;
        }

        function increaseQuantity() {
            var input = event.target.parentElement.querySelector('.quantity-input');
            input.value = parseInt(input.value) + 1;
        }

        function removeItem(code, sidebar) {
            // Add logic to remove item from cart
        }
    </script>

    <!-- Add Bootstrap JS and Popper.js scripts -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>
<?php
// Đặt một biến để kiểm soát việc hiển thị banner
$showBanner = true;

// Kiểm tra nếu không phải là trang index.php thì đặt biến thành false
if (basename($_SERVER['PHP_SELF']) !== 'index.php') {
    $showBanner = false;
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>
    <?php
    // Bạn cần có một session đã đăng nhập để lấy thông tin tài khoản hiện tại
    session_start();
    ?>
    <header id="section-header" class="header moto-section">
        <div class="navbar navbar-expand-lg navbar-light">
            <div class="container">
                <div class="row w-100">
                    <div class="col-lg-6 align-self-center">
                        <p class="moto-text_system_2 mb-0">
                            <span class="d-flex justify-content-center align-items-center">
                                <i class="fa-solid fa-phone fa-sm"></i></span>&nbsp;&nbsp;<a href="#"
                                style="text-decoration: none;">
                                +84 395.399.892</a>&nbsp;Từ 9:00 đến 19:00 tất cả các ngày trong tuần
                        </p>
                    </div>
                    <div class="col-lg-6">
                        <div class="row justify-content-end">
                            <div class="col-sm-6 d-flex justify-content-end">
                                <div data-widget-id="wid_1524125623_a2pb4lmv8" class="">
                                    <div store-search-widget="" bis_skin_checked="1">
                                        <form action="" method="GET" accept-charset="utf-8"
                                            class="search-form form-inline my-2 my-lg-0">
                                            <label class="search-form_label">
                                                <input type="text" name="keyword" autocomplete="off" value=""
                                                    class="search-form_input form-control" />
                                                <i class="fa-solid fa-magnifying-glass fa-sm search-icon"></i>
                                            </label>
                                            <span class="search-form_submit fa-search search-submit-icon"></span>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 d-flex justify-content-end">
                                <div id="wid_1524125584_64lbu0ohb" class="">
                                    <ul class="navbar-nav">
                                        <li class="nav-item">
                                            <a class="nav-link" id="openSidebar">
                                                <i class="fa fa-shopping-cart"></i>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" ng-click="handleTargetPage()" id="user-icon">
                                                <i class="fa fa-user"></i>
                                            </a>
                                            <div class="user-info" id="user-info">
                                                <!-- <img src="../img/avatar.png" class="c-rounded" style="width: 200px; height: 200px;" alt=""> -->
                                                <?php
                                                include "../db/dbconnect.php";

                                                // Kiểm tra xem 'username' đã được thiết lập trong session trước khi sử dụng
                                                // if (isset($_SESSION['username'])) {
                                                //     echo '<p class="pt-2 mb-1">User: ' . $_SESSION['username'] . '</p>';
                                                // }
                                                

                                                if (isset($_SESSION['username'])) {
                                                    $username = $_SESSION['username'];

                                                    // Truy vấn để lấy thông tin tài khoản
                                                    $sql = "SELECT * FROM users WHERE user = '$username'";
                                                    $result = $conn->query($sql);

                                                    if ($result->num_rows > 0) {
                                                        $row = $result->fetch_assoc();

                                                        // Hiển thị hình ảnh avatar
                                                        echo '<img class="c-rounded" src="data:image/jpeg;base64,' . base64_encode($row['avatar']) . '"style="width: 200px; height: 200px;"  alt="Avatar">';

                                                        // hiển thị username
                                                        echo '<p class="pt-2 mb-0">User: ' . $_SESSION['username'] . '</p>';

                                                        // Hiển thị số dư
                                                        echo '<p class="">Số dư: ' . number_format($row['balance']) . ' &#8363;</p>';
                                                        echo '<a href="../thanhtoan/Payment_history.php" style="text-decoration: none;">Lịch sử mua hàng</a>';
                                                        // Hiển thị nút đăng xuất
                                                        echo '<div class="d-flex justify-content-center">
                                    <button class="btn btn-outline-primary" id="logOutbtn" onclick="logout()">Đăng xuất</button>
                                  </div>';
                                                    } else {
                                                        echo "Không tìm thấy thông tin tài khoản.";
                                                    }
                                                } else {
                                                    echo "Bạn chưa đăng nhập.";
                                                }

                                                // Đóng kết nối
                                                $conn->close();
                                                ?>

                                                <script>
                                                    function logout() {
                                                        // Xử lý đăng xuất ở phía client (bằng JavaScript)
                                                        window.location.href = '../Security/logout.php'; // Chuyển hướng đến tệp logout.php để xử lý đăng xuất

                                                        // Bạn có thể thêm dòng sau để chuyển hướng người dùng trở lại trang đăng nhập ngay sau khi đăng xuất
                                                        // window.location.href = '../Security/login.php'; // Thay thế 'login.php' bằng trang bạn muốn chuyển hướng đến
                                                    }
                                                </script>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php if ($showBanner): ?>
            <div class="banner-img banner1">
                <div class="container-fluid" bis_skin_checked="1">
                    <div class="row" data-container="container" bis_skin_checked="1">
                        <div class="col-sm-12 vh-100">
                            <div data-widget-id="wid_1524569774_ikd6tjku4" class="">
                                <div class="" style="height: 30px"></div>
                            </div>
                            <div class="">
                                <div class="container" bis_skin_checked="1">
                                    <div class="row" data-container="" bis_skin_checked="1">
                                        <div class="col-sm-4 d-flex justify-content-start">
                                            <div class="col-xs-12 d-flex align-items-center justify-content-center">
                                                <div class="" data-widget="image">
                                                    <a href="" data-action="home_page" class="image-link moto-link">
                                                        <img class="logo-link"
                                                            src="https://demo.try-builder.com/site/03/00s/1w/0300s1wxnw55tckx/mt-content/uploads/2018/04/mt-1422_header_logo1.png"
                                                            alt="">
                                                    </a>
                                                </div>
                                                <div class="">
                                                    <div class="" bis_skin_checked="1">
                                                        <p class="moto-text_system_1 d-flex align-items-center mb-0">
                                                            <a data-action="home_page" data-anchor=""
                                                                class="moto-link home_page logo-link" href=""
                                                                bis_skin_checked="1">
                                                                <span class="image-replacement"></span>
                                                                AZALEA
                                                            </a>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-8 d-flex justify-content-end">
                                            <div data-widget-id="wid_1524125978_i6n6k0aja" class="menu-container">
                                                <a href="#" class="menu-toggle-btn"><i
                                                        class="menu-toggle-btn-icon fa fa-bars"></i></a>
                                                <ul class="menu-list menu-list_horizontal header m-0">
                                                    <li class="moto-widget-menu-item">
                                                        <a href="../home/index.php" data-action="home_page"
                                                            class="menu-link menu-link-level-1 menu-link-active moto-link">TRANG
                                                            CHỦ</a>
                                                    </li>
                                                    <li class="moto-widget-menu-item">
                                                        <a href="../aboutUs/aboutus.php" data-action="page"
                                                            class="menu-link menu-link-level-1 moto-link">ABOUT US</a>
                                                    </li>
                                                    <li class="moto-widget-menu-item menu-item-has-submenu">
                                                        <a href="../site/shop.php" data-action="store.category"
                                                            class="menu-link menu-link-level-1 menu-link-submenu moto-link">SHOP
                                                            <i class="fa-solid fa-angle-down"></i></a>
                                                        <ul class="menu-sublist">
                                                            <li class="moto-widget-menu-item">
                                                                <a href="../site/dress.php" data-action="store.category"
                                                                    class="menu-link menu-link-level-2 moto-link">VÁY
                                                                    CƯỚI</a>
                                                            </li>
                                                            <li class="moto-widget-menu-item">
                                                                <a href="../site/accessories.php"
                                                                    data-action="store.category"
                                                                    class="menu-link menu-link-level-2 moto-link">PHỤ
                                                                    KIỆN</a>
                                                            </li>
                                                            <li class="moto-widget-menu-item">
                                                                <a href="../site/collections.php"
                                                                    data-action="store.category"
                                                                    class="menu-link menu-link-level-2 moto-link">BỘ SƯU TẬP
                                                                    ĐỘC
                                                                    QUYỀN</a>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                    <li class="moto-widget-menu-item">
                                                        <a href="../thanhtoan/Payment_history.php" data-action="blog.index"
                                                            class="menu-link menu-link-level-1 moto-link">BLOG</a>
                                                    </li>
                                                    <li class="moto-widget-menu-item">
                                                        <a href="#" data-action="page"
                                                            class="menu-link menu-link-level-1 moto-link">LIÊN HỆ</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div data-widget-id="wid_1524136522_44x7e4ya1" class="">
                                <div class="" style="height: 10px"></div>
                            </div>
                            <div class="container align-items-center text-banner row-banner">
                                <div class="text-banner banner1">
                                    <div class="" bis_skin_checked="1">
                                        <p class="moto-text_system_6">BRIDAL 2024</p>
                                        <p class="moto-text_system_3">COLLECTION</p>
                                        <p class="moto-text_225">
                                            Browse the complete Bridal 2024 collection.
                                        </p>
                                    </div>
                                </div>
                                <div class="container-fluid p-0">
                                    <button class="btn btn-danger" data-widget-id="wid_1524136851_x7uuibamn"
                                        data-widget="button" bis_skin_checked="1">
                                        <a href="store/category/shop/" data-action="store.category"
                                            class="moto-widget-button-link moto-size-medium moto-link d-flex"
                                            bis_skin_checked="1">
                                            <span class="fa moto-widget-theme-icon"></span>
                                            <span class="moto-widget-button-divider"></span>
                                            <span class="moto-widget-button-label text-white">XEM NGAY!</span>
                                        </a>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>


    </header>

    <div class="overlay" id="overlay"></div>
    <div class="sidebar" id="sidebar">
        <div class="header-container">
            <div class="container" style="padding-top: 15px;">
                <span style="font-size: 23px;">GIỎ HÀNG</span>
            </div>
            <div class="close-btn" id="closeSidebar">
                <i class="fa-solid fa-times"></i>
            </div>
            <hr>
        </div>
        <!-- Sản phẩm -->
        <div class="product-container pt-3">
            <div class="container">
                <?php
                $totalPrice = 0;
                // Giả sử $_SESSION['cart'] là mảng chứa các sản phẩm trong giỏ hàng
                if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
                    ?>
                    <form action="updateCart.php" method="post" id="updateForm<?= $cart_item['code']; ?>">
                        <?php
                        foreach ($_SESSION['cart'] as $cart_item) {
                            $totalPrice += $cart_item['price'] * $cart_item['quantity']; // Tính tổng giá tiền cho sản phẩm
                            ?>
                            <div class="container">
                                <div class="row cart-item pb-3">
                                    <div class="col-sm-5">
                                        <img class="rounded-2" src="data:image/jpeg;base64,<?= $cart_item['image']; ?>"
                                            style="height: 200px;" alt="Hình ảnh sản phẩm">
                                    </div>
                                    <div class="col-sm-7">
                                        <div class="quantity-container">
                                            <div class="row">
                                                <?= $cart_item['name']; ?>
                                            </div>
                                            <div class="row my-3">
                                                <div class="col-sm-6 p-0">
                                                    <?= $cart_item['code']; ?>
                                                </div>
                                                <div class="col-sm-6 p-0">
                                                    <?= $cart_item['price']; ?>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-6 align-self-center">
                                                    <div class="quantity-selector">
                                                        <div class="quantity-button" onclick="updateQuantity(this, -1)">-</div>
                                                        <input type="text" class="quantity-input" name="quantity[]"
                                                            value="<?= $cart_item['quantity']; ?>" readonly
                                                            data-code="<?= $cart_item['code']; ?>">
                                                        <div class="quantity-button" onclick="updateQuantity(this, 1)">+</div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="remove-button text-center">
                                                        <a href="javascript:void(0);"
                                                            onclick="removeItem('<?= $cart_item['code']; ?>', 'sidebar')">Xóa</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php
                        }
                        ?>
                    </form>
                    <?php
                } else {
                    echo "Giỏ hàng trống.";
                }
                ?>
            </div>
        </div>
        <div class="footer-container">
            <hr>
            <div class="container">
                <div class="row d-flex justify-content-end pb-3">
                    <div class="col-sm-6 d-flex justify-content-end">
                        <strong>Tổng Giá Tiền: <span id="totalPrice">
                                <?= $totalPrice; ?>
                            </span></strong>
                    </div>
                </div>
                <div class="btn-tt container-fluid text-center p-0 pb-3">
                    <a href="../thanhtoan/thanhtoan.php" class="btn text-color-black btn-primary">Thanh toán</a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="../css/style.css" />
  <title>webvaycuoi</title>
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link
    href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@100&family=Lobster&family=Taviraj:wght@100;300&display=swap"
    rel="stylesheet" />

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
    integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />

  <style>
    body {
      font-family: "Josefin Sans", sans-serif;
      font-family: "Lobster", sans-serif;
      font-family: "Taviraj", serif;
    }
  </style>
</head>

<body>
  <header id="section-header" class="header moto-section">
    <div class="navbar navbar-expand-lg navbar-light">
      <div class="container">
        <div class="row w-100">
          <div class="col-lg-6 align-self-center">
            <p class="moto-text_system_2 mb-0">
              <span class="d-flex justify-content-center align-items-center">
                <i class="fa-solid fa-phone fa-sm"></i></span>&nbsp;&nbsp;<a href="#" style="text-decoration: none;">
                +84 395.399.892</a>&nbsp;Từ 9:00 đến 19:00 tất cả các ngày trong tuần
            </p>
          </div>
          <div class="col-lg-6">
            <div class="row justify-content-end">
              <div class="col-sm-6 d-flex justify-content-end">
                <div data-widget-id="wid_1524125623_a2pb4lmv8" class="">
                  <div store-search-widget="" bis_skin_checked="1">
                    <form action="" method="GET" accept-charset="utf-8" class="search-form form-inline my-2 my-lg-0">
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
                        <span class="cart-count">0</span>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" ng-click="handleTargetPage()" id="user-icon">
                        <i class="fa fa-user"></i>
                      </a>
                      <div class="user-info" id="user-info">
                        <!-- <img src="../img/avatar.png" class="c-rounded" style="width: 200px; height: 200px;" alt=""> -->
                        <?php
                        include 'C:/xampp/php/BAITAP/BTLPHP/db/dbconnect.php';

                        // Kiểm tra xem 'username' đã được thiết lập trong session trước khi sử dụng
                        if (isset($_SESSION['username'])) {
                          echo '<p class="pt-2 mb-1">User: ' . $_SESSION['username'] . '</p>';
                        }

                        // Bạn cần có một session đã đăng nhập để lấy thông tin tài khoản hiện tại
                        session_start();

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
                            <a data-action="home_page" data-anchor="" class="moto-link home_page logo-link" href=""
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
                      <a href="#" class="menu-toggle-btn"><i class="menu-toggle-btn-icon fa fa-bars"></i></a>
                      <ul class="menu-list menu-list_horizontal header m-0">
                        <li class="moto-widget-menu-item">
                          <a href="#" data-action="home_page"
                            class="menu-link menu-link-level-1 menu-link-active moto-link">TRANG CHỦ</a>
                        </li>
                        <li class="moto-widget-menu-item">
                          <a href="#" data-action="page" class="menu-link menu-link-level-1 moto-link">ABOUT US</a>
                        </li>
                        <li class="moto-widget-menu-item menu-item-has-submenu">
                          <a href="../site/shop.php" data-action="store.category"
                            class="menu-link menu-link-level-1 menu-link-submenu moto-link">SHOP
                            <i class="fa-solid fa-angle-down"></i></a>
                          <ul class="menu-sublist">
                            <li class="moto-widget-menu-item">
                              <a href="../site/dress.php" data-action="store.category"
                                class="menu-link menu-link-level-2 moto-link">VÁY CƯỚI</a>
                            </li>
                            <li class="moto-widget-menu-item">
                              <a href="../site/accessories.php" data-action="store.category"
                                class="menu-link menu-link-level-2 moto-link">PHỤ KIỆN</a>
                            </li>
                            <li class="moto-widget-menu-item">
                              <a href="collections.php" data-action="store.category"
                                class="menu-link menu-link-level-2 moto-link">BỘ SƯU TẬP ĐỘC QUYỀN</a>
                            </li>
                          </ul>
                        </li>
                        <li class="moto-widget-menu-item">
                          <a href="#" data-action="blog.index" class="menu-link menu-link-level-1 moto-link">BLOG</a>
                        </li>
                        <li class="moto-widget-menu-item">
                          <a href="#" data-action="page" class="menu-link menu-link-level-1 moto-link">LIÊN HỆ</a>
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
                <button class="btn btn-danger" data-widget-id="wid_1524136851_x7uuibamn" data-widget="button"
                  bis_skin_checked="1">
                  <a href="store/category/shop/" data-action="store.category"
                    class="moto-widget-button-link moto-size-medium moto-link d-flex" bis_skin_checked="1">
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
  </header>

  <div class="overlay" id="overlay"></div>
  <div class="sidebar" id="sidebar">
    <div class="container" style="padding-top: 15px;">
      <span style="font-size: 23px;">CART</span>
    </div>
    <div class="close-btn" id="closeSidebar">
      <i class="fa-solid fa-times"></i>
    </div>
    <hr>
    <!-- sản phẩm trong giỏ hàng -->
    <div class="container pt-2">
      <?php
      // Kiểm tra xem giỏ hàng có sản phẩm hay không
      session_start();
      if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
        foreach ($_SESSION['cart'] as $cart_item) {
          ?>
          <div class="row">
            <div class="col-sm-5">
              <img class="rounded-2" src="data:image/jpeg;base64,<?= $cart_item['image'] ?>" style="height: 200px;" alt="">
            </div>
            <div class="col-sm-7">
              <div class="quantity-container">
                <div class="row">
                  <div class="col-sm-6">
                    <div class="quantity-selector">
                      <!-- Các nút tăng giảm số lượng -->
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="row">
                      <span class="remove-button text-center">Remove</span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <?php
        }
      } else {
        // Hiển thị thông báo nếu giỏ hàng trống
        echo "Giỏ hàng trống.";
      }
      ?>
    </div>
  </div>

  <section class="py-4">
    <div class="container type-categories">
      <div class="row">
        <div class="col-4 p-4">
          <a href="../site/dress.php" class="card-link">
            <div class="card" style="width: 100%">
              <img
                src="https://lavitta.vn/cdn/shop/files/z5009401811761_77bf56a6cf6eba0dbfd6a2fcc66288d7_600x.jpg?v=1703525193"
                class="card-img-top" alt="mau1" />
              <div class="overlay-content">
                <div class="content">
                  <p class="text-black">VÁY CƯỚI</p>
                  <!-- <a href="#" class="btn"><button class="btn btn-danger" type="submit">Button</button></a> -->
                </div>
              </div>
            </div>
          </a>
        </div>

        <div class="col-4 p-4">
          <a href="../site/accessories.php" class="card-link">
            <div class="card" style="width: 100%">
              <img
                src="https://lavitta.vn/cdn/shop/files/z5009401802593_ac3db59bda6187bff17af1b8bbcfbbc5_600x.jpg?v=1703525097"
                class="card-img-top" alt="mau2" />
              <div class="overlay-content">
                <div class="content">
                  <p class="text-black">PHỤ KIỆN</p>
                  <!-- <a href="#" class="btn"><button class="btn btn-danger" type="submit">Button</button></a> -->
                </div>
              </div>
            </div>
          </a>
        </div>

        <div class="col-4 p-4">
          <a href="../site/collections.php" class="card-link">
            <div class="card" style="width: 100%">
              <img
                src="https://lavitta.vn/cdn/shop/files/z5009401283292_9fe878edd75c243caa8d1b1ed6927490_600x.jpg?v=1703524257"
                class="card-img-top" alt="mau3" />
              <div class="overlay-content">
                <div class="content">
                  <p class="text-black">BỘ SƯU TẬP ĐỘC QUYỀN</p>
                  <!-- <a href="#" class="btn"><button class="btn btn-danger" type="submit">Button</button></a> -->
                </div>
              </div>
            </div>
          </a>
        </div>
      </div>
    </div>
  </section>

  <div class="container-fluid banner-img banner2">
    <div class="row banner2">
      <div class="col-sm-12 banner2">
        <div class="container banner2">
          <div class="row banner2">
            <div class="col-sm-6"></div>
            <div class="col-sm-6">
              <p class="moto-text_225">
                Browse the complete Bridal 2024 collection.
              </p>
              <p class="moto-text_system_6">FOR YOUR</p>
              <p class="moto-text_system_3">WEDDING</p>
              <div class="container-fluid p-0">
                <button class="btn btn-danger" data-widget-id="wid_1524136851_x7uuibamn" data-widget="button"
                  bis_skin_checked="1">
                  <a href="store/category/shop/" data-action="store.category"
                    class="moto-widget-button-link moto-size-medium moto-link d-flex" bis_skin_checked="1">
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
  </div>

  <div class="container py-5">
    <div class="row">
      <h1 class="text-center text-white">
        <img data-src="" src="https://demo.try-builder.commt-content/uploads/2018/04/mt-1422_header_logo1.png" class=""
          data-id="1120" title="" alt="" />
      </h1>

      <h1 class="text-center text-white mb-4">OUR PRODUCTS</h1>
      <?php
      include 'C:/xampp/php/BAITAP/BTLPHP/db/dbconnect.php';

      // Sửa câu truy vấn SQL để lấy ngẫu nhiên 8 dòng
      $sql = "SELECT t1.`name_sp`, t1.`image_sp`, t1.`price`, t1.`code_sp` FROM `tb_image` t1 JOIN (SELECT `code_sp`, MAX(`id_sp`) AS max_id_sp FROM `tb_image` GROUP BY `code_sp`) t2 ON t1.`code_sp` = t2.`code_sp` AND t1.`id_sp` = t2.`max_id_sp` WHERE t1.`code_sp` LIKE '%BM%' OR t1.`code_sp` LIKE '%DC%' ORDER BY RAND() LIMIT 8;";
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
        // Duyệt qua từng dòng dữ liệu
        while ($row = $result->fetch_assoc()) {
          ?>
          <div class="col-sm-3">
            <div class="card sp" style="width: 100%" onmouseover="addHoverEffect(this)" onmouseout="removeHoverEffect(this)"
              onclick="redirectToProductDetails('<?= $row['code_sp'] ?>')">
              <img class="h-100" src="data:image/jpeg;base64,<?= base64_encode($row['image_sp']) ?>" alt="" />
              <a href="#" class="eye-link">
                <i class="fa-regular fa-eye"></i>
              </a>
            </div>

            <div class="d-flex justify-content-center pt-3">
              <p class="m-0 text-center">
                <?= $row['name_sp'] ?><br>
                <!-- <?= $row['code_sp'] ?><br> -->
                <?= '<span style="color: #dc3545;">' . number_format($row['price']) . '&#8363;</span>' ?>
              </p>
            </div>

            <div class="d-flex justify-content-center pt-3">
              <form method="post" action="add2cart.php">
                <input type="hidden" name="product_image" value="<?= base64_encode($row['image_sp']) ?>">
                <input type="hidden" name="product_name" value="<?= $row['name_sp'] ?>">
                <input type="hidden" name="product_code" value="<?= $row['code_sp'] ?>">
                <input type="hidden" name="product_price" value="<?= $row['price'] ?>">

                <button type="submit" name="add_to_cart" class="btn btn-danger">
                  Thêm vào giỏ hàng
                </button>
              </form>
            </div>
          </div>
          <?php
        }
      } else {
        echo "Không có dữ liệu";
      }

      // Đóng kết nối
      $conn->close();
      ?>
    </div>
  </div>

  <div class="container py-5">
    <div class="row py-5">
      <div class="col-sm-6">
        <img class="w-100 rounded"
          src="https://mymedia.vn/wp-content/uploads/2022/08/chup-anh-cuoi-co-dau-mot-minh-2.jpg" alt="" />
      </div>
      <div class="col-sm-6 d-flex align-items-center">
        <div class="">
          <p class="moto-text_system_6">FOR YOUR</p>
          <p class="moto-text_system_3">WEDDING</p>
          <p class="moto-text_225">
            Browse the complete Bridal 2024 collection.
          </p>
        </div>
      </div>
    </div>
    <div class="row py-5">
      <div class="col-sm-6 d-flex align-items-center">
        <div class="">
          <p class="moto-text_system_6">FOR YOUR</p>
          <p class="moto-text_system_3">WEDDING</p>
          <p class="moto-text_225">
            Browse the complete Bridal 2024 collection.
          </p>
        </div>
      </div>
      <div class="col-sm-6">
        <img class="w-100 rounded"
          src="https://mimosawedding.net/wp-content/uploads/2021/10/chup-anh-cuoi-co-dau-mot-minh-20.jpg" alt="" />
      </div>
    </div>
  </div>

  <footer id="section-footer" class="footer moto-section moto-sticky__bootstrapped">
    <div class="">
      <div class="container-fluid" bis_skin_checked="1">
        <div class="row" data-container="container" bis_skin_checked="1">
          <div class="col-sm-12" data-widget="row.column" data-container="container" data-spacing="aaaa"
            data-bg-position="left top" bis_skin_checked="1">
            <div class="" data-grid-type="sm" data-widget="row" data-spacing="aama" data-bg-position="left top"
              data-draggable-disabled="" bis_skin_checked="1">
              <div class="container-fluid" bis_skin_checked="1">
                <div class="row" data-container="container" bis_skin_checked="1">
                  <div class="col-sm-4" data-widget="row.column" data-container="container" data-spacing="aaaa"
                    data-bg-position="left top" bis_skin_checked="1"></div>
                  <div class="col-sm-4" data-widget="row.column" data-container="container" data-spacing="aaaa"
                    data-bg-position="left top" bis_skin_checked="1">
                    <div class="" data-grid-type="xs" data-widget="row" data-spacing="aaaa" data-bg-position="left top"
                      bis_skin_checked="1">
                      <div class="container-fluid" bis_skin_checked="1">
                        <div class="row" data-container="container" bis_skin_checked="1">
                          <div class="col-xs-2" data-widget="row.column" data-container="container" data-spacing="aaaa"
                            data-bg-position="left top" bis_skin_checked="1"></div>
                          <div class="col-xs-9 py-3 d-flex justify-content-center" data-widget="row.column"
                            data-container="container" data-spacing="aaaa" data-bg-position="left top"
                            bis_skin_checked="1">
                            <div class="" data-grid-type="xs" data-widget="row" data-spacing="sasa"
                              data-bg-position="left top" data-draggable-disabled="" bis_skin_checked="1">
                              <div class="container-fluid" bis_skin_checked="1">
                                <div class="row align-items-center" data-container="container" bis_skin_checked="1">
                                  <div class="col-xs-12 d-flex align-items-center justify-content-center"
                                    data-widget="row.column" data-container="container" data-spacing="aaaa"
                                    data-bg-position="left top" bis_skin_checked="1">
                                    <div class="" data-widget="image" bis_skin_checked="1">
                                      <a href="" data-action="home_page" class="image-link moto-link"
                                        bis_skin_checked="1">
                                        <img class="logo-link"
                                          src="https://demo.try-builder.com/site/03/00s/1w/0300s1wxnw55tckx/mt-content/uploads/2018/04/mt-1422_header_logo1.png"
                                          alt="">
                                      </a>
                                    </div>
                                    <div class="" data-widget="text" data-preset="default" data-spacing="aaaa"
                                      data-animation="" data-draggable-disabled="" bis_skin_checked="1">
                                      <div class="" bis_skin_checked="1">
                                        <p class="moto-text_system_1 d-flex align-items-center mb-0">
                                          <a data-action="home_page" data-anchor=""
                                            class="moto-link home_page logo-link" href="" bis_skin_checked="1">
                                            <span class="image-replacement"></span>
                                            AZALEA
                                          </a>
                                        </p>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="col-xs-1" data-widget="row.column" data-container="container" data-spacing="aaaa"
                            data-bg-position="left top" bis_skin_checked="1"></div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-4" data-widget="row.column" data-container="container" data-spacing="aaaa"
                    data-bg-position="left top" bis_skin_checked="1"></div>
                </div>
              </div>
            </div>
            <div data-widget-id="wid_1524128091_05kg60ys0" class="" data-preset="default" data-widget="menu"
              bis_skin_checked="1">
              <a href="#" class="menu-toggle-btn"><i class=" fa fa-bars"></i></a>
              <ul class="menu-list menu-list_horizontal footer">
                <li class="moto-widget-menu-item">
                  <a href="index.php" data-action="home_page"
                    class="menu-link menu-link-level-1 menu-link-active moto-link" bis_skin_checked="1">TRANG CHỦ</a>
                </li>
                <li class="moto-widget-menu-item">
                  <a href="" data-action="page" class="menu-link menu-link-level-1 moto-link" bis_skin_checked="1">ABOUT
                    US</a>
                </li>
                <li class="moto-widget-menu-item">
                  <a href="" data-action="blog.index" class="menu-link menu-link-level-1 moto-link"
                    bis_skin_checked="1">BLOG</a>
                </li>
                <li class="moto-widget-menu-item">
                  <a href="../site/shop.php" data-action="store.category" class="menu-link menu-link-level-1 moto-link"
                    bis_skin_checked="1">SHOP</a>
                </li>
                <li class="moto-widget-menu-item">
                  <a href="" data-action="page" class="menu-link menu-link-level-1 moto-link" bis_skin_checked="1">LIÊN
                    HỆ</a>
                </li>
              </ul>
            </div>
            <div class="" data-widget="text" data-preset="default" data-spacing="saaa" data-animation=""
              data-draggable-disabled="" bis_skin_checked="1">
              <div class="" bis_skin_checked="1">
                <p class="moto-text_system_8" style="text-align: center">
                  <a target="_self" data-action="url" class="moto-link payment" href="#"><span class="fa"><i
                        class="fa-brands fa-cc-visa fa-xl payment"></i></span></a>&nbsp;<a target="_self"
                    data-action="url" class="moto-link" href="#"><span class="fa"><i
                        class="fa-brands fa-cc-mastercard fa-xl payment"></i></span></a>&nbsp;<a target="_self"
                    data-action="url" class="moto-link" href="#"><span class="fa"><i
                        class="fa-brands fa-cc-discover fa-xl payment"></i></span></a>&nbsp;<a target="_self"
                    data-action="url" class="moto-link" href="#"><span class="fa"><i
                        class="fa-brands fa-cc-apple-pay fa-xl payment"></i></span></a>&nbsp;<a target="_self"
                    data-action="url" class="moto-link" href="#"><span class="fa"><i
                        class="fa-brands fa-cc-paypal fa-xl payment"></i></span></a>&nbsp;<a target="_self"
                    data-action="url" class="moto-link" href="#"><span class="fa"><i
                        class="fa-brands fa-cc-stripe fa-xl payment"></i></span></a>
                </p>
              </div>
            </div>
            <div data-widget-id="wid_1524128807_2abosenqb" class="" data-widget="divider_horizontal" data-preset="3"
              bis_skin_checked="1">
              <hr class="moto-widget-divider-line" style="max-width: 100%; width: 100%" />
            </div>
            <div class="" data-widget="text" data-preset="default" data-spacing="aaaa" data-animation=""
              data-draggable-disabled="" bis_skin_checked="1">
              <div class="moto-widget-text-content moto-widget-text-editable" bis_skin_checked="1">
                <p class="moto-text_224" style="text-align: center">
                  © 2024 Azalea. All Right Reserved. Designed by
                  <a target="_blank" rel="nofollow" data-action="url" class="moto-link author"
                    href="http://github.com/hvuitsme" bis_skin_checked="1">Hvuitsme</a>.&nbsp;<a href=""
                    data-action="page" data-id="27" class="moto-link policy" bis_skin_checked="1">Privacy Policy</a>
                </p>
              </div>
            </div>
            <div id="wid_1524129043_jzrillzxh" data-widget-id="wid_1524129043_jzrillzxh" class=""
              data-widget="social_links_extended" data-preset="default" bis_skin_checked="1">
              <ul class="social-links-extended__list">
                <li class="social-links-extended__item ">
                  <a href="#" class="moto-widget-social-links-extended__link" target="_blank">
                    <span class="moto-widget-social-links-extended__icon fa"><i
                        class="fa-brands fa-square-facebook fa-xl"></i></span>
                  </a>
                </li>
                <li class="social-links-extended__item ">
                  <a href="#" class="" target="_blank">
                    <span class="fa"><i class="fa-brands fa-square-twitter fa-xl"></i></span>
                  </a>
                </li>
                <li class="social-links-extended__item ">
                  <a href="#" class="" target="_blank">
                    <span class="moto-widget-social-links-extended__icon fa"><i
                        class="fa-brands fa-linkedin fa-xl"></i></span>
                  </a>
                </li>
                <li class="social-links-extended__item ">
                  <a href="#" class="moto-widget-social-links-extended__link" target="_blank">
                    <span class="moto-widget-social-links-extended__icon fa"><i
                        class="fa-brands fa-instagram fa-xl"></i></span>
                  </a>
                </li>
              </ul>
              <style type="text/css"></style>
            </div>
          </div>
        </div>
      </div>
    </div>
  </footer>

  <!-- js script -->

  <script>
    $(document).ready(function () {
      // Kiểm tra kích thước màn hình và thêm/xóa lớp CSS
      function checkScreenSize() {
        var screenSize =
          window.innerWidth ||
          document.documentElement.clientWidth ||
          document.body.clientWidth;

        // Nếu kích thước màn hình là 768px hoặc nhỏ hơn, thêm lớp visible-xs
        if (screenSize <= 768) {
          $(".menu-toggle-btn").addClass("visible-xs");
        } else {
          $(".menu-toggle-btn").removeClass("visible-xs");
        }
      }

      // Gọi hàm kiểm tra khi trang web tải và khi thay đổi kích thước màn hình
      $(window).on("load resize", function () {
        checkScreenSize();
      });
    });

    // function redirectToAnotherPage() {
    //   // Thực hiện chuyển hướng khi nhấp vào thẻ
    //   window.location.href = "https://github.com/hvuitsme";
    // }

    function redirectToProductDetails(code_sp) {
      // Thực hiện chuyển hướng khi nhấp vào thẻ với mã sản phẩm
      window.location.href = "../detail/info.php?code=" + code_sp;
    }

    function addHoverEffect(card) {
      // Thực hiện các thay đổi khi di chuột vào
      card.style.boxShadow = "0 0 10px rgba(0, 0, 0, 0.3)";
    }

    function removeHoverEffect(card) {
      // Thực hiện các thay đổi khi di chuột ra
      card.style.boxShadow = "none";
    }
  </script>

  <!-- phần sidebar -->

  <script>
    document.getElementById('openSidebar').addEventListener('click', function () {
      document.getElementById('overlay').style.display = 'block';
      document.getElementById('sidebar').style.right = '0';
      document.body.classList.add('no-scroll');
    });

    document.getElementById('closeSidebar').addEventListener('click', function () {
      document.getElementById('overlay').style.display = 'none';
      document.getElementById('sidebar').style.right = '-450px';
      document.body.classList.remove('no-scroll');
    });

    document.getElementById('overlay').addEventListener('click', function () {
      document.getElementById('overlay').style.display = 'none';
      document.getElementById('sidebar').style.right = '-450px';
      document.body.classList.remove('no-scroll');
    });
  </script>

  <!-- test -->

  <!-- quantity Selector -->
  <script>
    function increaseQuantity() {
      var input = document.querySelector('.quantity-input');
      input.value = parseInt(input.value) + 1;
    }

    function decreaseQuantity() {
      var input = document.querySelector('.quantity-input');
      var value = parseInt(input.value) - 1;
      input.value = value > 0 ? value : 1;
    }
  </script>

  <!-- cdnjs -->

  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
    crossorigin="anonymous"></script>
</body>

</html>
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
  <style>
    .header-container,
    .footer-container {
      height: 70px;
    }

    .product-container {
      max-height: 730px;
      overflow-y: auto;
    }
  </style>
</head>

<body>
  <?php
  include "../header/header.php";
  ?>

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
    <?php
    include "../product/ourproduct.php";
    ?>
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
    <?php
    include "../footer/footer.php";
    ?>
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
    // function increaseQuantity() {
    //   var input = event.target.parentElement.querySelector('.quantity-input');
    //   input.value = parseInt(input.value) + 1;
    //   updateCart(input);
    // }

    // function decreaseQuantity() {
    //   var input = event.target.parentElement.querySelector('.quantity-input');
    //   var value = parseInt(input.value) - 1;
    //   input.value = value > 0 ? value : 1;
    //   updateCart(input);
    // }

    // function updateCart(input) {
    //   var code = input.dataset.code;
    //   // Thêm logic ở đây để cập nhật session hoặc thực hiện bất kỳ hành động nào khác dựa trên mã sản phẩm và số lượng
    // }

    document.addEventListener('DOMContentLoaded', function () {
      var quantityInputs = document.querySelectorAll('.quantity-input');

      quantityInputs.forEach(function (input) {
        var code = input.dataset.code;
        var storedQuantity = sessionStorage.getItem('quantity_' + code);

        // Kiểm tra nếu giá trị là khoảng trắng thì đặt mặc định là 1
        if (storedQuantity !== null && storedQuantity.trim() !== '' && !isNaN(storedQuantity)) {
          input.value = storedQuantity;
        } else {
          input.value = 1;
        }
      });

      function updateQuantity(input, delta) {
        var code = input.dataset.code;
        var currentValue = parseInt(input.value);

        // Kiểm tra giá trị hiện tại có phải NaN hoặc là 0 không
        if (isNaN(currentValue) || currentValue === 0) {
          input.value = 1;
        } else {
          var newValue = Math.max(1, currentValue + delta);
          input.value = newValue;
          sessionStorage.setItem('quantity_' + code, newValue);
          updateCart(input);
        }
      }

      document.querySelectorAll('.quantity-button').forEach(function (button) {
        button.addEventListener('click', function () {
          var input = button.parentElement.querySelector('.quantity-input');
          var delta = button.textContent === '+' ? 1 : -1;
          updateQuantity(input, delta);
        });
      });
    });

    function updateCart(input) {
      var code = input.dataset.code;
      var quantity = input.value;

      var xhr = new XMLHttpRequest();
      xhr.open('POST', 'updateCart.php', true);
      xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
      xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
          // Xử lý phản hồi từ máy chủ
          var response = JSON.parse(xhr.responseText);

          // Kiểm tra nếu trạng thái là thành công và cập nhật tổng giá tiền
          if (response.status === 'success') {
            var totalPriceElement = document.getElementById('totalPrice');
            if (totalPriceElement) {
              totalPriceElement.textContent = response.totalPrice;
            }
          }
        }
      };
      xhr.send('update_cart=1&code=' + code + '&quantity=' + quantity);
    }
  </script>

  <script>
    function removeItem(productCode, sidebarId) {
      // Sử dụng AJAX để gửi yêu cầu xóa sản phẩm
      $.ajax({
        type: "POST",
        url: "updateCart.php",
        data: {
          remove_item: productCode
        }, // Gửi mã sản phẩm cần xóa
        success: function (response) {
          // Cập nhật nội dung giỏ hàng
          $("#cart-container").html(response);

          // Chuyển hướng đến id của sidebar
          window.location.href = "#" + sidebarId;
        },
        error: function () {
          alert("Error removing item from cart.");
        }
      });
    }
  </script>

  <!-- cdnjs -->

  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
    crossorigin="anonymous"></script>
</body>

</html>
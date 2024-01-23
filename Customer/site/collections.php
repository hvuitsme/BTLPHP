<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="../css/shop.css" />
  <link rel="stylesheet" href="../css/style.css" />
  <title>webvaycuoi</title>

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
  <div class="breadcrumb-web">
    <div class="container py-4">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="../home/index.php">Home</a></li>
          <li class="breadcrumb-item active" aria-current="page">Collections</li>
        </ol>
      </nav>
    </div>
  </div>

  <div class="container">
    <div class="row mt-5">
      <!-- phần danh mục -->

      <div class="col-sm-3">
        <?php 
        include"../directory/directory.php";
        ?>
      </div>

      <!-- phần sản phẩm trong shop -->

      <div class="col-sm-9">

        <div class="container">
          <hr class="custom-hr" />
          <h1>BỘ SƯU TẬP ĐỘC QUYỀN</h1>
        </div>

        <div class="container pt_2">
          <div class="row">
            <h1 class="text-center text-white">
              <img data-src="" src="https://demo.try-builder.commt-content/uploads/2018/04/mt-1422_header_logo1.png" class="" data-id="1120" title="" alt="" />
            </h1>
            <?php
            include "../db/dbconnect.php";

            // Sửa câu truy vấn SQL để lấy ngẫu nhiên 8 dòng
            $sql = "SELECT t1.`name_sp`, t1.`image_sp`, t1.`price`, t1.`code_sp` FROM `tb_product` t1 JOIN ( SELECT `code_sp`, MAX(`Ma_sp`) AS max_Ma_sp FROM `tb_product` GROUP BY `code_sp` ) t2 ON t1.`code_sp` = t2.`code_sp` AND t1.`Ma_sp` = t2.`max_Ma_sp` WHERE t1.`code_sp` LIKE '%DC%';";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
              // Duyệt qua từng dòng dữ liệu
              while ($row = $result->fetch_assoc()) {
            ?>
                <div class="col-sm-4 pb-3">
                  <div class="card sp" style="width: 100%" onmouseover="addHoverEffect(this)" onmouseout="removeHoverEffect(this)" onclick="redirectToProductDetails('<?= $row['code_sp'] ?>')">
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
                    <button type="button" class="btn btn-danger">
                      Thêm vào giỏ hàng
                    </button>
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
      </div>
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
    $(document).ready(function() {
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
      $(window).on("load resize", function() {
        checkScreenSize();
      });
    });

    function redirectToAnotherPage() {
      // Thực hiện chuyển hướng khi nhấp vào thẻ
      window.location.href = "https://github.com/hvuitsme";
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

  <script>
    // Lấy đường dẫn URL hiện tại
    var currentPath = window.location.pathname;

    // Danh sách các thẻ a chứa thẻ span
    var links = document.querySelectorAll('a span');

    // Lặp qua từng thẻ để kiểm tra đường dẫn
    links.forEach(function(link) {
      // Lấy đường dẫn từ href của thẻ a chứa thẻ span
      var linkPath = link.parentElement.getAttribute('href');

      // So sánh đường dẫn
      if (currentPath === linkPath) {
        // Nếu là trang hiện tại, thêm class để đổi màu
        link.classList.add('current-page');
      }
    });
  </script>

  <script>
    $(document).ready(function() {
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
      $(window).on("load resize", function() {
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

  <!-- cdnjs -->

  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>
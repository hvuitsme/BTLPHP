<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="../css/shop.css" />
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
          <li class="breadcrumb-item active" aria-current="page">Dress</li>
        </ol>
      </nav>
    </div>
  </div>

  <div class="container">
    <div class="row mt-5">
      <!-- phần danh mục -->

      <div class="col-sm-3">
        <div class="row">
          <!-- <h4 class="mb-4">Danh Mục</h4> -->
          <p class="mb-4">Danh mục</p>
          <a href="dress.php"><span>VÁY CƯỚI</span></a>
          <a href="accessories.php"><span>PHỤ KIỆN</span></a>
          <a href="collections.php"><span>BỘ SƯU TẬP ĐỘC QUYỀN</span></a>
          <a href="shop.php"><span>SHOP</span></a>
        </div>

        <div class="row">
          <!-- <h4 class="mb-4 mt-5">Thông tin</h4> -->

          <p class="mb-4 mt-5">Danh mục</p>
          <a href=""><span>ABOUT US</span></a>
          <a href=""><span>CONTACTS</span></a>
          <a href=""><span>BLOG</span></a>
          <a href=""><span>PRIVACY POLICY</span></a>
        </div>

        <div class="row">
          <h4 class="mb-4 mt-5">Theo Dõi:</h4>
        </div>
      </div>

      <!-- phần sản phẩm trong shop -->

      <div class="col-sm-9">

        <hr class="custom-hr" />

        <h1>SHOP</h1>

        <div class="container pt_2">
          <div class="row">

            <?php
            // Kết nối đến cơ sở dữ liệu
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "web";

            $conn = new mysqli($servername, $username, $password, $dbname);

            // Kiểm tra kết nối
            if ($conn->connect_error) {
              die("Kết nối không thành công: " . $conn->connect_error);
            }
            ?>
            <?php
            $sql = "SELECT * FROM `image_demo_vaycuoi`";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
              // Duyệt qua từng dòng dữ liệu
              while ($row = $result->fetch_assoc()) {
            ?>
                <div class="col-sm-3 mt-3">
                  <div class="card sp" style="width: 100%" onmouseover="addHoverEffect(this)" onmouseout="removeHoverEffect(this)" onclick="redirectToAnotherPage()">
                    <img class="h-100" src="data:image/jpeg;base64,<?= base64_encode($row['image_sp_demo']) ?>" alt="" />
                    <a href="#" class="eye-link">
                      <i class="fa-regular fa-eye"></i>
                    </a>
                  </div>

                  <div class="d-flex justify-content-center pt-3">
                    <p class="m-0 text-center">
                      <?= $row['name_sp_demo'] ?><br>
                      <?= $row['price'] ?><br>
                    </p>
                  </div>

                  <div class="d-flex justify-content-center pt-1">
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

  <!-- cdnjs -->

  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/info.css">
    <title>Document</title>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@100&family=Lobster&family=Taviraj:wght@100;300&display=swap" rel="stylesheet" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<style>
    body {
        font-family: "Josefin Sans", sans-serif;
        font-family: "Lobster", sans-serif;
        font-family: "Taviraj", serif;
    }
</style>

<body>

    <div class="container">
        <div class="row pt-5">
            <div class="col-sm-7">
                <?php
                include 'C:/xampp/php/BAITAP/BTLPHP/db/dbconnect.php';

                // Function to display product details
                function displayProductDetails($code_sp, $conn)
                {
                    $sql = "SELECT * FROM tb_image WHERE code_sp = '$code_sp'";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        echo '<div class="ecommerce-gallery" data-mdb-zoom-effect="true" data-mdb-auto-height="true">';
                        echo '<div class="row shadow-5">';
                        echo '<div class="col-4">';

                        $firstImage = true;

                        while ($row = $result->fetch_assoc()) {
                            echo '<div class="mt-1 d-flex flex-row-reverse">';
                            $borderClass = $firstImage ? 'border-red' : '';
                            echo '<img src="data:image/jpeg;base64,' . base64_encode($row['image_sp']) . '" alt="' . $row['name_sp'] . '" class="gallery-thumbnail rounded w-50 ' . $borderClass . '" />';
                            echo '</div>';
                            $firstImage = false;
                        }

                        echo '</div>';
                        echo '<div class="col-8 mb-1">';
                        echo '<div class="lightbox">';
                        $result->data_seek(0);
                        $row = $result->fetch_assoc();
                        echo '<img src="data:image/jpeg;base64,' . base64_encode($row['image_sp']) . '" alt="' . $row['name_sp'] . '" class="ecommerce-gallery-main-img active rounded" />';
                        echo '</div>';
                        echo '</div>';
                        echo '</div>';
                        echo '</div>';
                    } else {
                        echo 'Sản phẩm không tồn tại.';
                    }
                }

                // Get product code from the URL parameter
                $code_sp = isset($_GET['code']) ? $_GET['code'] : '';

                // Display product details based on the product code
                displayProductDetails($code_sp, $conn);

                // Close connection
                $conn->close();
                ?>

                <div class="row">
                    <div class="col-sm-2">

                    </div>
                    <div class="col-sm-10 hr">
                        <hr>
                    </div>
                </div>
            </div>
            <div class="col-sm-5 py-4">
                <div class="" style="margin-left: 50px; margin-right: 50px" ;>
                    <p class="pt-3">AZALEA SHOP</p>
                    <p>VL38 + T</p>
                    <p><del>71.749.000₫</del></p>
                    <p>7.749.000₫</p>
                    <hr>
                </div>
                <div class="share-container">
                    <span id="share-text">Share:  </span>
                    <div class="share-icons">
                        <!-- Các biểu tượng chia sẻ ở đây -->
                        <a href="https://www.facebook.com/hvuitsme.23" target="_blank" title="Facebook">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="https://www.instagram.com/hvu_itsme/" target="_blank" title="Instagram">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a href="https://https://t.me/hvuitsmee" target="_blank" title="Telegram">
                            <i class="fab fa-telegram"></i>
                        </a>
                    </div>
                </div>
                <div class="quantity-container">
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="quantity-selector">
                                <div class="quantity-button" onclick="decreaseQuantity()">-</div>
                                <input type="text" class="quantity-input" value="1" readonly>
                                <div class="quantity-button" onclick="increaseQuantity()">+</div>
                            </div>
                        </div>
                    </div>
                    <div class="row pt-5" style="padding-left: 12px; padding-right: 12px;">
                        <button type="button" class="btn btn-outline-light">Thêm vào giỏ hàng</button>
                    </div>
                    <div class="row pt-2" style="padding-left: 12px; padding-right: 12px;">
                        <button type="button" class="btn btn-outline-light">Mua ngay</button>
                    </div>
                </div>

            </div>
        </div>
        <div class="row">

        </div>
    </div>
    <hr>
    <div class="container">
        <h3 class="text-center" style="padding-top: 80px; padding-bottom: 80px;">BẠN CÓ THỂ THÍCH</h3>

        <div class="container">
            <div class="row">
                <?php
                include 'C:/xampp/php/BAITAP/BTLPHP/db/dbconnect.php';

                // Sửa câu truy vấn SQL để lấy ngẫu nhiên 8 dòng
                $sql = "SELECT t1.`name_sp`, t1.`image_sp`, t1.`price`, t1.`code_sp` FROM `tb_image` t1 JOIN (SELECT `code_sp`, MAX(`id_sp`) AS max_id_sp FROM `tb_image` GROUP BY `code_sp`) t2 ON t1.`code_sp` = t2.`code_sp` AND t1.`id_sp` = t2.`max_id_sp` WHERE t1.`code_sp` LIKE '%BM%' OR t1.`code_sp` LIKE '%DC%' ORDER BY RAND() LIMIT 4;";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    // Duyệt qua từng dòng dữ liệu
                    while ($row = $result->fetch_assoc()) {
                ?>
                        <div class="col-sm-3">
                            <div class="card sp" style="width: 100%" onmouseover="addHoverEffect(this)" onmouseout="removeHoverEffect(this)" onclick="redirectToProductDetails('<?= $row['code_sp'] ?>')">
                                <img class="h-100" src="data:image/jpeg;base64,<?= base64_encode($row['image_sp']) ?>" alt="" />
                                <a href="#" class="eye-link">
                                    <i class="fa-regular fa-eye"></i>
                                </a>
                            </div>

                            <div class="d-flex justify-content-center pt-3">
                                <p class="m-0 text-center">
                                    <?= $row['name_sp'] ?><br>
                                    <?= $row['code_sp'] ?><br>
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

    <!-- Bootstrap JS and Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    <!-- Custom JavaScript -->

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

    <!-- static effect -->
    <!-- <script>
        $(document).ready(function () {
            $('.gallery-thumbnail').click(function () {
                $('.gallery-thumbnail').removeClass('active');
                $(this).addClass('active');
                var imgSrc = $(this).attr('src');
                $('.ecommerce-gallery-main-img').attr('src', imgSrc);
            });
        });
    </script> -->

    <!-- orther effects -->
    <script>
        $(document).ready(function() {
            $('.gallery-thumbnail').click(function() {
                $('.gallery-thumbnail').removeClass('active');
                $(this).addClass('active');
                var imgSrc = $(this).attr('src');
                $('.ecommerce-gallery-main-img').attr('src', imgSrc);
                // $('.ecommerce-gallery-main-img').css('transform', 'scale(1.03)');
                // setTimeout(function () {
                //     $('.ecommerce-gallery-main-img').css('transform', 'scale(1)');
                // }, 300);

                $('.ecommerce-gallery-main-img').css('filter', 'blur(1px)'); // Điều chỉnh giá trị theo yêu cầu của bạn
                setTimeout(function() {
                    $('.ecommerce-gallery-main-img').css('filter', 'blur(0)');
                }, 300);
            });
        });
    </script>
</body>

</html>
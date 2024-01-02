<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/info.css">
    <title>Document</title>
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
                <div class="ecommerce-gallery" data-mdb-zoom-effect="true" data-mdb-auto-height="true">
                    <div class="row shadow-5">
                        <div class="col-4">
                            <div class="mt-1 d-flex flex-row-reverse">
                                <img src="https://mdbcdn.b-cdn.net/img/Photos/Horizontal/E-commerce/Vertical/14a.webp"
                                    alt="Gallery image 1" class="gallery-thumbnail rounded w-50 active" />
                            </div>
                            <div class="mt-1 d-flex flex-row-reverse">
                                <img src="https://mdbcdn.b-cdn.net/img/Photos/Horizontal/E-commerce/Vertical/12a.webp"
                                    alt="Gallery image 2" class="gallery-thumbnail rounded w-50" />
                            </div>
                            <div class="mt-1 d-flex flex-row-reverse">
                                <img src="https://mdbcdn.b-cdn.net/img/Photos/Horizontal/E-commerce/Vertical/13a.webp"
                                    alt="Gallery image 3" class="gallery-thumbnail rounded w-50" />
                            </div>
                            <div class="mt-1 d-flex flex-row-reverse">
                                <img src="https://mdbcdn.b-cdn.net/img/Photos/Horizontal/E-commerce/Vertical/15a.webp"
                                    alt="Gallery image 4" class="gallery-thumbnail rounded w-50" />
                            </div>
                        </div>
                        <div class="col-8 mb-1">
                            <div class="lightbox">
                                <img src="https://mdbcdn.b-cdn.net/img/Photos/Horizontal/E-commerce/Vertical/14a.webp"
                                    alt="Gallery image 1" class="ecommerce-gallery-main-img active rounded" />
                                <!-- Add other images here with the same class but different source -->
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    
                    <div class="col-sm-10">
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
                    <span id="share-text">Share:</span>
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
                    <div class="row pt-5" style="padding-left: 12px; padding-right: 12px;" >
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
    </div>

    <!-- Bootstrap JS and Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    <!-- Custom JavaScript -->

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
        $(document).ready(function () {
            $('.gallery-thumbnail').click(function () {
                $('.gallery-thumbnail').removeClass('active');
                $(this).addClass('active');
                var imgSrc = $(this).attr('src');
                $('.ecommerce-gallery-main-img').attr('src', imgSrc);
                // $('.ecommerce-gallery-main-img').css('transform', 'scale(1.03)');
                // setTimeout(function () {
                //     $('.ecommerce-gallery-main-img').css('transform', 'scale(1)');
                // }, 300);

                $('.ecommerce-gallery-main-img').css('filter', 'blur(3px)'); // Điều chỉnh giá trị theo yêu cầu của bạn
                setTimeout(function () {
                    $('.ecommerce-gallery-main-img').css('filter', 'blur(0)');
                }, 300);
            });
        });
    </script>
</body>

</html>
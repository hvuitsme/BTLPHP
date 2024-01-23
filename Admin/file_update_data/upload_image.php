<?php
include "../db/dbconnect.php";

// Thêm dữ liệu vào bảng 'tb_product'
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["image"])) {
    // Lấy dữ liệu từ form
    $name_sp = $_POST["name_sp"];
    $price = $_POST["price"];
    $brands = $_POST["brands"];
    $status = $_POST["status"];
    $code_sp = $_POST["code_sp"];
    $product_id = $_POST["product_id"];

    // Lấy dữ liệu từ file ảnh
    $imageData = file_get_contents($_FILES["image"]["tmp_name"]);

    // Thực hiện truy vấn để thêm dữ liệu vào bảng 'tb_product'
    $stmt_product = $conn->prepare("INSERT INTO tb_product (Ma_sp, name_sp, image_sp, price, Brands, status, code_sp) VALUES (?, ?, ?, ?, ?, ?, ?)");
    if (!$stmt_product) {
        die("Lỗi câu truy vấn tb_product: " . $conn->error);
    }

    $stmt_product->bind_param("issssss", $product_id, $name_sp, $imageData, $price, $brands, $status, $code_sp);

    if (!$stmt_product->execute()) {
        echo "Lỗi khi upload sản phẩm: " . $stmt_product->error;
        $stmt_product->close();
        $conn->close();
        exit;
    }

    $stmt_product->close();

    echo "Dữ liệu đã được thêm vào bảng 'tb_product' thành công!";

    // Đóng kết nối
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload sản phẩm</title>
    <!-- Add Bootstrap CDN link for styling -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="../Main interface/index.php">Quản lý đơn hàng</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="../Main interface/index.php">Danh sách đơn hàng</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../file_update_data/upload_image.php">Thêm đơn hàng</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../user/user.php">Danh sách khách hàng</a>
                </li>
            </ul>
        </div>
    </div>
    <div class="container mt-5">
        <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="name_sp">Tên sản phẩm:</label>
                <input type="text" class="form-control" name="name_sp" required>
            </div>

            <div class="form-group">
                <label for="price">Giá:</label>
                <input type="text" class="form-control" name="price">
            </div>

            <div class="form-group">
                <label for="brands">Thương hiệu:</label>
                <input type="text" class="form-control" name="brands">
            </div>

            <div class="form-group">
                <label for="status">Trạng thái:</label>
                <input type="text" class="form-control" name="status" required>
            </div>

            <div class="form-group">
                <label for="code_sp">Mã sản phẩm:</label>
                <input type="text" class="form-control" name="code_sp" required>
            </div>

            <div class="form-group">
                <label for="product_id">ID Sản phẩm:</label>
                <input type="text" class="form-control" name="product_id" required>
            </div>

            <div class="form-group">
                <label for="image">Chọn ảnh:</label>
                <input type="file" class="form-control-file" name="image" accept="image/*" required>
            </div>

            <button type="submit" class="btn btn-primary">Upload</button>
        </form>
    </div>

    <!-- Add Bootstrap JS and Popper.js CDN links for functionality -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
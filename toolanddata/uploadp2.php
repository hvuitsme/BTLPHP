<?php
// Kết nối đến cơ sở dữ liệu
$servername = "localhost";
$username = "root";
$password = "";
$database = "web";
$conn = new mysqli($servername, $username, $password, $database);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}

// Thêm dữ liệu vào bảng 'tb_image'
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

    // Thực hiện truy vấn để thêm dữ liệu vào bảng 'tb_image'
    $stmt_image = $conn->prepare("INSERT INTO tb_image (id_sp, name_sp, image_sp, price, Brands, status, code_sp) VALUES (?, ?, ?, ?, ?, ?, ?)");
    if (!$stmt_image) {
        die("Lỗi câu truy vấn tb_image: " . $conn->error);
    }

    $stmt_image->bind_param("sssssss", $product_id, $name_sp, $imageData, $price, $brands, $status, $code_sp);

    if (!$stmt_image->execute()) {
        echo "Lỗi khi upload ảnh: " . $stmt_image->error;
        $stmt_image->close();
        $conn->close();
        exit;
    }

    $stmt_image->close();

    // Thực hiện truy vấn để thêm dữ liệu vào bảng 'price_sp'
    $stmt_price = $conn->prepare("INSERT INTO price_sp (code_sp, price) VALUES (?, ?)");
    if (!$stmt_price) {
        die("Lỗi câu truy vấn price_sp: " . $conn->error);
    }

    $stmt_price->bind_param("ss", $code_sp, $price);

    if (!$stmt_price->execute()) {
        echo "Lỗi khi thêm giá sản phẩm: " . $stmt_price->error;
        $stmt_price->close();
        $conn->close();
        exit;
    }

    $stmt_price->close();

    echo "Dữ liệu đã được thêm vào bảng 'tb_image' và 'price_sp' thành công!";

    // Đóng kết nối
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload ảnh</title>
</head>

<body>
    <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post" enctype="multipart/form-data">
        <label for="name_sp">Tên sản phẩm:</label>
        <input type="text" name="name_sp" required><br>

        <label for="price">Giá:</label>
        <input type="text" name="price"><br>

        <label for="brands">Thương hiệu:</label>
        <input type="text" name="brands" required><br>

        <label for="status">Trạng thái:</label>
        <input type="text" name="status" required><br>

        <label for="code_sp">Mã sản phẩm:</label>
        <input type="text" name="code_sp" required><br>

        <label for="product_id">ID Sản phẩm:</label>
        <input type="text" name="product_id" required><br>

        <label for="image">Chọn ảnh:</label>
        <input type="file" name="image" accept="image/*" required><br>

        <input type="submit" value="Upload">
    </form>
</body>

</html>
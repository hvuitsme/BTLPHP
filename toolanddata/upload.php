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

// Thêm dữ liệu vào bảng 
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["image"])) {
    // Lấy dữ liệu từ form
    $name_sp = $_POST["name_sp"];
    $status = $_POST["status"];
    $price = $_POST["price"]; // Thêm giá vào form
    $product_id = $_POST["product_id"]; // Thêm ID vào form
    $product_code = $_POST["product_code"]; 

    // Lấy dữ liệu từ file ảnh
    $imageData = file_get_contents($_FILES["image"]["tmp_name"]);

    // Thực hiện truy vấn để thêm dữ liệu vào bảng 'product'
    $stmt_product = $conn->prepare("INSERT INTO product (id_sp, name_sp, price) VALUES (?, ?, ?)");
    if (!$stmt_product) {
        die("Lỗi câu truy vấn product: " . $conn->error);
    }

    $stmt_product->bind_param("sss", $product_id, $name_sp, $price);

    if (!$stmt_product->execute()) {
        echo "Lỗi khi thêm sản phẩm: " . $stmt_product->error;
        $stmt_product->close();
        $conn->close();
        exit;
    }

    $stmt_product->close();

    // Thực hiện truy vấn để thêm dữ liệu vào bảng 'status_sp'
    $stmt_status = $conn->prepare("INSERT INTO status_sp (id_sp, status) VALUES (?, ?)");
    if (!$stmt_status) {
        die("Lỗi câu truy vấn status_sp: " . $conn->error);
    }

    $stmt_status->bind_param("ss", $product_id, $status);

    if (!$stmt_status->execute()) {
        echo "Lỗi khi thêm trạng thái: " . $stmt_status->error;
        $stmt_status->close();
        $conn->close();
        exit;
    }

    $stmt_status->close();

    // Thực hiện truy vấn để thêm dữ liệu vào bảng 'image'
    $stmt_image = $conn->prepare("INSERT INTO image (id_sp, image_sp, code_sp) VALUES (?, ?, ?)");
    if (!$stmt_image) {
        die("Lỗi câu truy vấn image: " . $conn->error);
    }

    $stmt_image->bind_param("ss", $product_id, $imageData, $product_code);

    if (!$stmt_image->execute()) {
        echo "Lỗi khi upload ảnh: " . $stmt_image->error;
        $stmt_image->close();
        $conn->close();
        exit;
    }

    $stmt_image->close();

    echo "Dữ liệu đã được thêm vào các bảng thành công!";

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

        <label for="status">Trạng thái:</label>
        <input type="text" name="status" required><br>

        <label for="price">Giá:</label>
        <input type="text" name="price" required><br>

        <label for="product_id">ID Sản phẩm:</label>
        <input type="text" name="product_id" required><br>

        <label for="code_sp">Mã sản phẩm:</label>
        <input type="text" name="product_code" required><br>

        <label for="image">Chọn ảnh:</label>
        <input type="file" name="image" accept="image/*" required><br>

        <input type="submit" value="Upload">
    </form>
</body>

</html>
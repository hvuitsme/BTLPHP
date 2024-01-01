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

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["image"])) {
    // Lấy dữ liệu từ form
    $name_sp = $_POST["name_sp"];
    $status = $_POST["status"];

    // Lấy dữ liệu từ file ảnh
    $imageData = file_get_contents($_FILES["image"]["tmp_name"]);

    // Chuẩn bị truy vấn SQL
    $stmt = $conn->prepare("INSERT INTO image_sanpham (image_sp, name_sp, status) VALUES (?, ?, ?)");
    if (!$stmt = $conn->prepare("INSERT INTO image_sanpham (image_sp, name_sp, status) VALUES (?, ?, ?)")) {
        die("Lỗi câu truy vấn: " . $conn->error);
    }   

    $stmt->bind_param("sss", $imageData, $name_sp, $status);


    // Thực hiện truy vấn
    if ($stmt->execute()) {
        echo "Upload ảnh thành công!";
    } else {
        echo "Lỗi khi upload ảnh: " . $stmt->error;
    }

    // Đóng kết nối
    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">

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

        <label for="image">Chọn ảnh:</label>
        <input type="file" name="image" accept="image/*" required><br>

        <input type="submit" value="Upload">
    </form>
</body>

</html>

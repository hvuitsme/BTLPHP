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
<!-- include 'C:/xampp/php/BAITAP/BTLPHP/db/dbconnect.php'; -->

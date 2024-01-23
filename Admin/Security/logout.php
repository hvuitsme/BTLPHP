<?php
// Bắt đầu session
session_start();

// Hủy toàn bộ session
session_destroy();

// Chuyển hướng về trang đăng nhập hoặc trang chính của bạn
header("Location: ../first.php"); // Thay thế 'login.php' bằng trang bạn muốn chuyển hướng đến
exit();
?>
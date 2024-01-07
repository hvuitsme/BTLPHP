<?php
include 'C:/xampp/php/BAITAP/BTLPHP/db/dbconnect.php';
function displayProductByCode($code_sp, $conn)
{
    $sql = "SELECT * FROM tb_image WHERE code_sp = '$code_sp'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo '<img src="data:image/jpeg;base64,' . base64_encode($row['image_sp']) . '" alt="' . $row['name_sp'] . '" />';
        }
    } else {
        echo 'Product not found.';
    }
}

// Example usage:
$code_sp = "BM1";
displayProductByCode($code_sp, $conn);

// Close connection
$conn->close();

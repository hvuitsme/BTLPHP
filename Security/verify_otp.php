<?php
// Session needs to be started
session_start();

require '../mail/PHPMailer/src/Exception.php';
require '../mail/PHPMailer/src/PHPMailer.php';
require '../mail/PHPMailer/src/SMTP.php';

// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class Mailer
{
    public function sendMaild($title, $content, $addressMail)
    {
        //Create an instance; passing `true` enables exceptions
        $mail = new PHPMailer(true);

        try {
            //Server settings
            $mail->SMTPDebug = SMTP::DEBUG_SERVER; // Enable verbose debug output
            $mail->isSMTP(); // Send using SMTP
            $mail->CharSet = 'utf-8';
            $mail->Host = 'smtp.gmail.com'; // Set the SMTP server to send through
            $mail->SMTPAuth = true; // Enable SMTP authentication
            $mail->Username = 'hvuits.me@gmail.com'; // SMTP username
            $mail->Password = 'raji uczq askr bdmj'; // SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS; // Enable implicit TLS encryption
            $mail->Port = 465; // TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

            //Recipients
            $mail->setFrom('hvuits.me@gmail.com', 'BTLPHP');
            $mail->addAddress($addressMail);     //Add a recipient

            //Content
            $mail->isHTML(true); // Set email format to HTML
            $mail->Subject = $title;
            $mail->Body = $content;

            $mail->send();
            echo 'Message has been sent';
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user = $_POST['forgotUser'];
    $email = $_POST['forgotEmail'];
    $inputOTP = (int) trim($_POST['OTP']); // Chuyển đổi thành số nguyên và loại bỏ khoảng trắng

    // Lấy OTP đã lưu
    $storedOTP = isset($_SESSION['storedOTP']) ? $_SESSION['storedOTP'] : null;

    if ($storedOTP !== null && $inputOTP !== null && $inputOTP === $storedOTP) {
        // Xác nhận đúng OTP, cho phép thay đổi mật khẩu
        // ...

        // Sau khi xác nhận, có thể xóa OTP đã sử dụng
        unset($_SESSION['storedOTP']);

        echo "Xác nhận OTP thành công!";
    } else {
        // Thông báo sai OTP
        echo "Sai OTP. Vui lòng thử lại.";
    }
}

// Hàm này cần được thay đổi để lấy OTP từ cơ sở dữ liệu hoặc n

?>

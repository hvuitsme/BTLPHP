<?php
session_start();

// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Ensure session is started
// session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user = $_POST['forgotUser'];
    $email = $_POST['forgotEmail'];

    // Lưu thông tin người dùng vào session
    $_SESSION['forgotPasswordUser'] = $user;
    $_SESSION['forgotPasswordEmail'] = $email;

    // Tạo và lưu trữ OTP
    $otp = generateOTP($user, $email);
    echo "Generated OTP: $otp<br>";

    // Gửi email với OTP
    $content = "Chào mừng quý khách <br> OTP để đổi mật khẩu tài khoản của bạn là: $otp";
    sendOTPByEmail($content, $email);

    echo "Một email chứa OTP đã được gửi đến địa chỉ email của bạn.";

    // Sau khi nhận giá trị OTP, in ra để kiểm tra
    $inputOTP = isset($_SESSION['inputOTP']) ? $_SESSION['inputOTP'] : null;
    $storedOTP = isset($_SESSION['storedOTP']) ? $_SESSION['storedOTP'] : null;
    echo "Input OTP: $inputOTP<br>";
    echo "Stored OTP: $storedOTP<br>";
}

function generateOTP($user, $email)
{
    session_regenerate_id(); // Tạo session ID mới
    $otp = rand(100000, 999999);
    saveOTP($user, $email, $otp); // Lưu OTP vào session
    return $otp;
}

function saveOTP($user, $email, $otp)
{
    // Lưu trữ OTP vào session
    $_SESSION['storedOTP'] = $otp;
}

function sendOTPByEmail($content, $email)
{
    require '../mail/PHPMailer/src/Exception.php';
    require '../mail/PHPMailer/src/PHPMailer.php';
    require '../mail/PHPMailer/src/SMTP.php';

    $mailer = new PHPMailer(true);

    try {
        // Server settings
        $mailer->SMTPDebug = SMTP::DEBUG_SERVER; // Enable verbose debug output
        $mailer->isSMTP(); // Send using SMTP
        $mailer->CharSet = 'utf-8';
        $mailer->Host = 'smtp.gmail.com'; // Set the SMTP server to send through
        $mailer->SMTPAuth = true; // Enable SMTP authentication
        $mailer->Username = 'hvuits.me@gmail.com'; // SMTP username
        $mailer->Password = 'qavz lrkp pcmu xwjj'; // SMTP password
        $mailer->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; // Enable TLS encryption
        $mailer->Port = 587; // TCP port to connect to

        // Recipients
        $mailer->setFrom('hvuits.me@gmail.com', 'BTLPHP');
        $mailer->addAddress($email); // Add a recipient

        // Content
        $mailer->isHTML(true); // Set email format to HTML
        $mailer->Subject = "OTP Verification";
        $mailer->Body = $content;

        $mailer->send();
        echo '<script>alert("Message has been sent");</script>';
    } catch (Exception $e) {
        echo '<script>alert("Message could not be sent. Mailer Error: {$mailer->ErrorInfo}");</script>';
    }
}
?>

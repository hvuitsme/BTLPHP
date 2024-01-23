<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/login.css">
    <title>Log in</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <link rel="stylesheet" href="../css/login.css">
</head>

<body>
    <div class="wrapper">
        <div class="title-text">
            <div class="title login">Login Form</div>
            <div class="title signup">Signup Form</div>
        </div>
        <div class="form-container">
            <div class="slide-controls">
                <input type="radio" name="slide" id="login" checked>
                <input type="radio" name="slide" id="signup">
                <label for="login" class="slide login">Login</label>
                <label for="signup" class="slide signup">Signup</label>
                <div class="slider-tab"></div>
            </div>
            <div class="form-inner">
                <form action="#" class="login" method="post" id="loginForm">
                    <div class="field">
                        <input type="text" placeholder="Email Address" name="email" required>
                    </div>
                    <div class="field">
                        <input type="password" placeholder="Password" name="password" required>
                    </div>
                    <div class="pass-link"><a href="#">Forgot password?</a></div>
                    <div class="field btn">
                        <div class="btn-layer"></div>
                        <input type="submit" value="Login" name="login">
                    </div>
                    <div class="signup-link">Not a member? <a href="#">Signup now</a></div>
                </form>
                <form action="#" class="signup" method="post" id="signupForm">
                    <div class="field">
                        <input type="text" placeholder="Email Address" name="email" required>
                    </div>
                    <div class="field">
                        <input type="password" placeholder="Password" name="password" required>
                    </div>
                    <div class="field">
                        <input type="password" placeholder="Confirm password" name="confirm_password" required>
                    </div>
                    <div class="field btn">
                        <div class="btn-layer"></div>
                        <input type="submit" value="Signup" name="signup">
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        const loginText = document.querySelector(".title-text .login");
        const loginForm = document.querySelector("form.login");
        const loginBtn = document.querySelector("label.login");
        const signupBtn = document.querySelector("label.signup");
        const signupLink = document.querySelector("form .signup-link a");

        signupBtn.onclick = (() => {
            loginForm.style.marginLeft = "-50%";
            loginText.style.marginLeft = "-50%";
        });

        loginBtn.onclick = (() => {
            loginForm.style.marginLeft = "0%";
            loginText.style.marginLeft = "0%";
        });

        signupLink.onclick = (() => {
            signupBtn.click();
            return false;
        });

        // Thêm hàm xử lý đăng nhập thành công và chuyển hướng
        document.querySelector("#loginForm").addEventListener("submit", async function (event) {
            event.preventDefault();

            // Thực hiện kiểm tra đăng nhập ở đây (có thể sử dụng AJAX hoặc Fetch API)

            // Giả sử đăng nhập thành công, bạn có thể thực hiện chuyển hướng bằng cách dùng window.location.href
            // Ví dụ: window.location.href = "/index.html";
            // Hoặc bạn có thể sử dụng Fetch API để gửi yêu cầu đăng nhập đến server và chờ phản hồi.
            // Ví dụ giả sử đăng nhập thành công:
            window.location.href = "/index.html";
        });

        // Thêm hàm xử lý đăng ký và thêm vào cơ sở dữ liệu
        document.querySelector("#signupForm").addEventListener("submit", async function (event) {
            event.preventDefault();

            // Thực hiện kiểm tra và thêm vào cơ sở dữ liệu ở đây (có thể sử dụng AJAX hoặc Fetch API)

            // Sau khi thêm vào cơ sở dữ liệu, bạn có thể thực hiện chuyển hướng hoặc thực hiện các thao tác khác
            // Ví dụ: window.location.href = "/index.html";
        });
    </script>

    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C
    6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>
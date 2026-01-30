<?php
session_start();
require_once 'config.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $email = $_POST['email'];
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT * FROM users WHERE email=?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $res = $stmt->get_result();

    if ($res->num_rows > 0) {
        $user = $res->fetch_assoc();

        if (password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['name'] = $user['fullname'];
            header("Location: dashboard.php");
            exit();
        } else {
            $error = "Wrong password.";
        }
    } else {
        $error = "User not found.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>FunFinity | Login</title>

    <style>
        * {
            box-sizing: border-box;
            font-family: 'Segoe UI', Arial, sans-serif;
        }

        body {
            background-image: url("image/background.png");
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            margin: 0;
            height: 100vh;
            color: white;
            overflow: hidden;
        }

        /* Dark Overlay for readability */
        body::before {
            content: "";
            position: fixed;
            inset: 0;
            background: rgba(0, 0, 0, 0.3);
            z-index: -1;
        }

        /* --- NAVBAR --- */
        .nav {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 25px 70px;
        }

        .logo a {
            font-size: 26px;
            font-weight: bold;
            text-decoration: none;
            color: white;
            transition: transform 0.3s ease, opacity 0.3s;
            display: inline-block;
        }

        .logo a:hover {
            transform: scale(1.1) rotate(-2deg); /* Playful amusement park tilt */
            opacity: 0.9;
        }

        .nav-right {
            display: flex;
            align-items: center;
        }

        .nav-right a {
            color: white;
            text-decoration: none;
            margin-left: 25px;
            font-size: 14px;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        /* Sign Up link hover */
        .nav-right a:not(.login-btn):hover {
            color: #ff5c7a;
            text-shadow: 0 0 10px rgba(255, 92, 122, 0.5);
        }

        /* White Nav Button */
        .nav .login-btn {
            background: white;
            color: #333;
            padding: 10px 25px;
            border-radius: 25px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.2);
        }

        .nav .login-btn:hover {
            background: #ff5c7a;
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(255, 92, 122, 0.4);
        }

        /* --- LOGIN AREA --- */
        .login-wrapper {
            height: calc(100vh - 100px);
            display: flex;
            align-items: center;
            padding-left: 120px;
        }

        .login-box {
            width: 420px;
            animation: fadeIn 0.8s ease-out;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateX(-20px); }
            to { opacity: 1; transform: translateX(0); }
        }

        .login-box h1 {
            font-size: 56px;
            margin-bottom: 10px;
            line-height: 1;
            letter-spacing: 1px;
        }

        .login-box p {
            opacity: 0.85;
            margin-bottom: 35px;
            font-size: 1.1rem;
        }

        /* Input Fields */
        .input-group {
            background: rgba(255, 255, 255, 0.2);
            backdrop-filter: blur(5px);
            border-radius: 30px;
            padding: 14px 22px;
            margin-bottom: 15px;
            position: relative;
            border: 1px solid rgba(255,255,255,0.1);
            transition: all 0.3s ease;
        }

        .input-group:focus-within {
            background: rgba(255, 255, 255, 0.3);
            border-color: #ff5c7a;
        }

        .input-group input {
            width: 100%;
            border: none;
            background: transparent;
            outline: none;
            color: white;
            font-size: 15px;
            padding-right: 40px;
        }

        .input-group input::placeholder {
            color: rgba(255, 255, 255, 0.7);
        }

        /* Eye icon hover */
        .eye {
            position: absolute;
            right: 18px;
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
            width: 20px;
            height: 20px;
            opacity: 0.6;
            transition: opacity 0.3s;
        }

        .eye:hover {
            opacity: 1;
        }

        .eye svg {
            width: 100%;
            height: 100%;
            stroke: white;
            fill: none;
            stroke-width: 2;
        }

        /* Options area */
        .options {
            display: flex;
            justify-content: space-between;
            font-size: 13px;
            margin: 10px 5px 30px;
        }

        .options a {
            color: white;
            text-decoration: none;
            transition: color 0.3s;
        }

        .options a:hover {
            color: #ff5c7a;
            text-decoration: underline;
        }

        /* MAIN SUBMIT BUTTON */
        .login-box button {
            width: 180px;
            padding: 14px;
            border: none;
            background: #ff5c7a;
            color: white;
            border-radius: 30px;
            font-size: 15px;
            font-weight: bold;
            cursor: pointer;
            box-shadow: 0 8px 25px rgba(255, 92, 122, 0.3);
            transition: all 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        }

        .login-box button:hover {
            background: #ff758c;
            transform: scale(1.05);
            box-shadow: 0 12px 30px rgba(255, 92, 122, 0.5);
        }

        .login-box button:active {
            transform: scale(0.98);
        }

        .error {
            background: rgba(255, 0, 0, 0.2);
            border-left: 4px solid #ff5c7a;
            padding: 10px;
            font-size: 13px;
            margin-bottom: 15px;
            border-radius: 4px;
        }

        /* Chrome Autofill Fix */
        input:-webkit-autofill {
            -webkit-box-shadow: 0 0 0 1000px rgba(0,0,0,0.5) inset !important;
            -webkit-text-fill-color: white !important;
        }
    </style>
</head>

<body>

    <div class="nav">
        <div class="logo">
            <a href="index.php">FUNFINITY 🎡</a>
        </div>

        <div class="nav-right">
            <a href="signup.php">SIGN UP</a>
            <a href="login.php" class="login-btn">LOGIN</a>
        </div>
    </div>

    <div class="login-wrapper">
        <div class="login-box">
            <h1>WELCOME<br>BACK!</h1>
            <p>Please enter your login details.</p>

            <?php if(!empty($error)): ?>
                <div class="error"><?= $error ?></div>
            <?php endif; ?>

            <form method="POST">
                <div class="input-group">
                    <input type="email" name="email" placeholder="Username or Email" required>
                </div>

                <div class="input-group">
                    <input type="password" name="password" id="password" placeholder="Password" required>
                    <span class="eye" onclick="togglePassword()">
                        <svg viewBox="0 0 24 24">
                            <path d="M1 12s4-7 11-7 11 7 11 7-4 7-11 7S1 12 1 12z"/>
                            <circle cx="12" cy="12" r="3"/>
                        </svg>
                    </span>
                </div>

                <div class="options">
                    <label style="cursor: pointer; display: flex; align-items: center;">
                        <input type="checkbox" style="margin-right: 8px;"> 
                        Remember me
                    </label>
                    <a href="#">Forgot Password?</a>
                </div>    

                <button type="submit">LOG IN NOW</button>
            </form>
        </div>
    </div>

    <script>
    function togglePassword() {
        const input = document.getElementById("password");
        input.type = input.type === "password" ? "text" : "password";
    }
    </script>

</body>
</html>
<?php
require_once 'config.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name  = $_POST['fullname'];
    $email = $_POST['email'];
    $pass  = $_POST['password'];
    $confirm = $_POST['confirm'];

    if ($pass !== $confirm) {
        $error = "Passwords do not match.";
    } else {
        $hashed = password_hash($pass, PASSWORD_DEFAULT);
        $stmt = $conn->prepare("INSERT INTO users(fullname,email,password) VALUES(?,?,?)");
        $stmt->bind_param("sss", $name, $email, $hashed);
        
        if($stmt->execute()){
            header("Location: login.php");
            exit();
        } else {
            $error = "Registration failed. Email might already exist.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>FunFinity | Join the Fun</title>

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

        /* Overlay */
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
            transition: transform 0.3s ease;
            display: inline-block;
        }

        .logo a:hover {
            transform: scale(1.1) rotate(-2deg);
        }

        .nav-right a {
            color: white;
            text-decoration: none;
            margin-left: 25px;
            font-size: 14px;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .nav-right a:not(.login-btn):hover {
            color: #ff5c7a;
        }

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
        }

        /* --- SIGNUP AREA --- */
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
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .login-box h1 {
            font-size: 56px;
            margin-bottom: 10px;
            letter-spacing: 1px;
        }

        .login-box p {
            opacity: 0.85;
            margin-bottom: 30px;
        }

        /* Inputs */
        .input-group {
            background: rgba(255, 255, 255, 0.2);
            backdrop-filter: blur(5px);
            border-radius: 30px;
            padding: 12px 22px;
            margin-bottom: 12px;
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
        }

        .input-group input::placeholder {
            color: rgba(255, 255, 255, 0.7);
        }

        /* Eye icon */
        .eye {
            position: absolute;
            right: 18px;
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
            width: 20px;
            opacity: 0.6;
            transition: 0.3s;
        }

        .eye:hover { opacity: 1; }

        .eye svg {
            stroke: white;
            fill: none;
            stroke-width: 2;
        }

        /* Terms & Conditions */
        .options {
            font-size: 13px;
            margin: 15px 5px 25px;
        }

        .options label {
            cursor: pointer;
            display: flex;
            align-items: center;
        }

        .options input {
            margin-right: 10px;
        }

        /* MAIN BUTTON */
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

        .error {
            color: #ffb3b3;
            font-size: 13px;
            margin-bottom: 10px;
            background: rgba(255,0,0,0.1);
            padding: 8px;
            border-radius: 5px;
        }
    </style>
</head>

<body>

    <div class="nav">
        <div class="logo">
            <a href="index.php">FUNFINITY 🎡</a>
        </div>

        <div class="nav-right">
            <a href="signup.php" class="login-btn">SIGN UP</a>
            <a href="login.php">LOGIN</a>
        </div>
    </div>

    <div class="login-wrapper">
        <div class="login-box">
            <h1>WELCOME!</h1>
            <p>Ready for the thrills? Create your account.</p>

            <?php if(isset($error)): ?>
                <div class="error"><?php echo $error; ?></div>
            <?php endif; ?>

            <form method="POST">
                <div class="input-group">
                    <input type="text" name="fullname" placeholder="Your Full Name" required>
                </div>

                <div class="input-group">
                    <input type="email" name="email" placeholder="Email Address" required>
                </div>

                <div class="input-group">
                    <input type="password" name="password" id="pass1" placeholder="Password" required>
                    <span class="eye" onclick="togglePass('pass1')">
                        <svg viewBox="0 0 24 24"><path d="M1 12s4-7 11-7 11 7 11 7-4 7-11 7S1 12 1 12z"/><circle cx="12" cy="12" r="3"/></svg>
                    </span>
                </div>

                <div class="input-group">
                    <input type="password" name="confirm" id="pass2" placeholder="Confirm Password" required>
                    <span class="eye" onclick="togglePass('pass2')">
                        <svg viewBox="0 0 24 24"><path d="M1 12s4-7 11-7 11 7 11 7-4 7-11 7S1 12 1 12z"/><circle cx="12" cy="12" r="3"/></svg>
                    </span>
                </div>

                <div class="options">
                    <label>
                        <input type="checkbox" required>
                        I agree to the Terms & Conditions
                    </label>
                </div>    

                <button type="submit">CREATE ACCOUNT</button>
            </form>
        </div>
    </div>

    <script>
        function togglePass(id) {
            const el = document.getElementById(id);
            el.type = el.type === "password" ? "text" : "password";
        }
    </script>
</body>
</html>
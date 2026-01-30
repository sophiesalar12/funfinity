<!DOCTYPE html>
<html lang="en">
<head>
    <title>FunFinity Home</title>
    <style>
        /* Base Styling */
        body {
            margin: 0;
            padding: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-image: url("image/landing.jpg"); /* Ensure this path is correct */
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            height: 100vh;
            color: white;
            overflow-x: hidden;
        }

        /* Dark Overlay to make text pop */
        body::before {
            content: "";
            position: fixed;
            inset: 0;
            background: rgba(0, 0, 0, 0.4);
            z-index: -1;
        }

        /* Modern Glassmorphic Nav */
        .nav {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px 80px;
            background: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(10px);
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            position: sticky;
            top: 0;
            z-index: 1000;
        }

        .logo {
            font-size: 1.5rem;
            font-weight: bold;
            letter-spacing: 1px;
            color: white;
            text-decoration: none;
        }

        .nav-links a {
            color: white;
            text-decoration: none;
            margin-left: 30px;
            font-weight: 500;
            transition: 0.3s;
            font-size: 0.95rem;
        }

        .nav-links a:hover {
            color: #ff4d6d; /* Theme Pink */
        }

        /* Hero Content */
        .hero {
            height: 80vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
            padding: 0 20px;
        }

        .hero h1 {
            font-size: 4rem;
            margin-bottom: 10px;
            text-shadow: 2px 4px 10px rgba(0,0,0,0.5);
        }

        .hero p {
            font-size: 1.2rem;
            margin-bottom: 30px;
            opacity: 0.9;
        }

        /* Themed Button */
        .btn-main {
            padding: 15px 40px;
            background: #ff4d6d;
            color: white;
            text-decoration: none;
            border-radius: 50px;
            font-weight: bold;
            text-transform: uppercase;
            letter-spacing: 1px;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(255, 77, 109, 0.4);
            border: none;
            cursor: pointer;
        }

        .btn-main:hover {
            transform: translateY(-3px);
            box-shadow: 0 6px 20px rgba(255, 77, 109, 0.6);
            background: #ff758c;
        }
    </style>
</head>
<body>

<div class="nav">
    <a href="index.php" class="logo">FUNFINITY 🎡</a>

    <div class="nav-links">
        <a href="home.php">Home</a>
        <a href="#">About</a>
        <a href="#">Promotions</a>
        <a href="#">Activities</a>

        <?php if(isset($_SESSION['user_id'])): ?>
            <a href="dashboard.php" style="color: #00d1b2;">Dashboard</a>
            <a href="logout.php">Logout</a>
        <?php else: ?>
            <a href="login.php">Login</a>
            <a href="signup.php">Register</a>
        <?php endif; ?>
    </div>
</div>

<div class="hero">
    <h1>Welcome to FunFinity</h1>
    <p>The ultimate destination for thrill-seekers and family fun.</p>
    
    <a href="home.php" class="btn-main">Unlock the Fun</a>
</div>

</body>
</html>
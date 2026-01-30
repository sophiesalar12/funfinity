<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>FunFinity | Home</title>
    <style>
        * { box-sizing: border-box; }
        
        body {
            font-family: 'Segoe UI', Arial, sans-serif;
            background: #f0f2f5; /* Light grey for a clean "app" feel */
            margin: 0;
            color: #333;
        }

        /* --- PROFESSIONAL TOP NAV --- */
        .nav {
            background: #1a1a2e; /* Deep navy for professionalism */
            color: white;
            padding: 0 60px;
            height: 70px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }

        .logo {
            font-size: 22px;
            font-weight: bold;
            letter-spacing: 1px;
            color: #ff5c7a; /* Brand pink as an accent */
        }

        .nav-links a {
            color: white;
            margin-left: 25px;
            text-decoration: none;
            font-size: 14px;
            font-weight: 500;
            transition: color 0.3s;
        }

        .nav-links a:hover {
            color: #ff5c7a;
        }

        /* --- MAIN CONTENT AREA --- */
        .container {
            max-width: 1200px;
            margin: 40px auto;
            padding: 0 20px;
        }

        .welcome-banner {
            background: white;
            padding: 30px;
            border-radius: 15px;
            margin-bottom: 30px;
            border-left: 6px solid #ff5c7a;
            box-shadow: 0 4px 6px rgba(0,0,0,0.05);
        }

        .welcome-banner h1 {
            margin: 0;
            font-size: 28px;
            color: #1a1a2e;
        }

        /* --- FEATURE CARDS --- */
        .grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 25px;
        }

        .card {
            background: white;
            border-radius: 12px;
            padding: 25px;
            text-align: center;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            cursor: pointer;
            border: 1px solid #eee;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0,0,0,0.1);
        }

        .card .icon {
            font-size: 40px;
            margin-bottom: 15px;
            display: block;
        }

        .card h3 {
            margin: 10px 0;
            color: #1a1a2e;
        }

        .card p {
            font-size: 14px;
            color: #666;
            line-height: 1.5;
        }

        .btn-outline {
            display: inline-block;
            margin-top: 15px;
            padding: 8px 20px;
            border: 2px solid #ff5c7a;
            color: #ff5c7a;
            text-decoration: none;
            border-radius: 20px;
            font-weight: bold;
            font-size: 13px;
            transition: 0.3s;
        }

        .btn-outline:hover {
            background: #ff5c7a;
            color: white;
        }
    </style>
</head>

<body>

    <div class="nav">
        <div class="logo">FUNFINITY 🎡</div>

        <div class="nav-links">
            <a href="home.php">Home</a>
            <a href="#">Promotions</a>
            <a href="#">Activities</a>
            
            <?php if(isset($_SESSION['user_id'])): ?>
                <a href="dashboard.php" style="color: #00d1b2;">My Dashboard</a>
                <a href="logout.php">Logout</a>
            <?php else: ?>
                <a href="login.php">Login</a>
                <a href="signup.php">Register</a>
            <?php endif; ?>
        </div>
    </div>

    <div class="container">
        <div class="welcome-banner">
            <h1>Welcome Back, <?php echo isset($_SESSION['name']) ? $_SESSION['name'] : 'Guest'; ?>!</h1>
            <p>Ready to explore the park today? Check out our latest attractions below.</p>
        </div>

        <div class="grid">
            <div class="card">
                <span class="icon">🎢</span>
                <h3>Thrilling Rides</h3>
                <p>From the Giant Drop to the Velocity Coaster, find your next rush.</p>
                <a href="rides.php" class="btn-outline">View Rides</a>
            </div>

            <div class="card">
                <span class="icon">🎁</span>
                <h3>Active Promos</h3>
                <p>Flash sale: Get 20% off for groups of 5 or more this weekend!</p>
                <a href="promos.php" class="btn-outline">See Deals</a>
            </div>

            <div class="card">
                <span class="icon">📅</span>
                <h3>Book Tickets</h3>
                <p>Reserve your spot and skip the long queues at the entrance.</p>
                <a href="ticket.php" class="btn-outline">Book Now</a>
            </div>
        </div>
    </div>

</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FunFinity | Rides & Thrills</title>
    <style>
        * { box-sizing: border-box; transition: all 0.3s ease; }
        
        body {
            font-family: 'Segoe UI', Roboto, Arial, sans-serif;
            background: #f8f9fa;
            margin: 0;
            color: #2d3436;
        }

        /* --- PROFESSIONAL TOP NAV --- */
        .nav {
            background: #1a1a2e;
            color: white;
            padding: 0 50px;
            height: 70px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            position: sticky;
            top: 0;
            z-index: 1000;
        }

        .logo {
            font-size: 22px;
            font-weight: bold;
            color: #ff5c7a;
            text-decoration: none;
        }

        .nav-links a {
            color: white;
            margin-left: 20px;
            text-decoration: none;
            font-size: 14px;
            font-weight: 500;
        }

        .nav-links a:hover { color: #ff5c7a; }

        /* --- PAGE HEADER --- */
        .page-header {
            background: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.6)), url('image/rides-bg.jpg');
            background-size: cover;
            background-position: center;
            color: white;
            padding: 60px 20px;
            text-align: center;
        }

        .page-header h1 { margin: 0; font-size: 3rem; }

        /* --- RIDE GRID --- */
        .container {
            max-width: 1200px;
            margin: 40px auto;
            padding: 0 20px;
        }

        .filter-bar {
            margin-bottom: 30px;
            display: flex;
            gap: 15px;
            justify-content: center;
        }

        .filter-btn {
            padding: 8px 20px;
            border: 2px solid #ff5c7a;
            background: transparent;
            color: #ff5c7a;
            border-radius: 20px;
            cursor: pointer;
            font-weight: bold;
        }

        .filter-btn.active, .filter-btn:hover {
            background: #ff5c7a;
            color: white;
        }

        .ride-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 30px;
        }

        .ride-card {
            background: white;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0,0,0,0.08);
            position: relative;
        }

        .ride-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 12px 25px rgba(0,0,0,0.15);
        }

        .ride-image {
            height: 200px;
            background: #dfe6e9; /* Placeholder color */
            position: relative;
        }

        /* Badge for wait times */
        .wait-tag {
            position: absolute;
            top: 15px;
            right: 15px;
            background: rgba(0, 0, 0, 0.7);
            color: #00d1b2;
            padding: 5px 12px;
            border-radius: 15px;
            font-size: 12px;
            font-weight: bold;
            border: 1px solid #00d1b2;
        }

        .ride-info {
            padding: 20px;
        }

        .ride-info h3 {
            margin: 0 0 10px 0;
            color: #1a1a2e;
        }

        .ride-meta {
            display: flex;
            justify-content: space-between;
            font-size: 13px;
            color: #636e72;
            margin-bottom: 15px;
        }

        .thrill-level {
            color: #ff5c7a;
            font-weight: bold;
        }

        .btn-book {
            display: block;
            width: 100%;
            padding: 12px;
            text-align: center;
            background: #1a1a2e;
            color: white;
            text-decoration: none;
            border-radius: 8px;
            font-weight: bold;
            font-size: 14px;
        }

        .btn-book:hover {
            background: #ff5c7a;
        }
    </style>
</head>
<body>

    <nav class="nav">
        <a href="home.php" class="logo">FUNFINITY 🎡</a>
        <div class="nav-links">
            <a href="home.php">Home</a>
            <a href="rides.php">Rides</a>
            <a href="dashboard.php">My Tickets</a>
            <a href="logout.php">Logout</a>
        </div>
    </nav>

    <header class="page-header">
        <h1>Park Attractions</h1>
        <p>Find your next thrill or family-friendly adventure</p>
    </header>

    <div class="container">
        <div class="filter-bar">
            <button class="filter-btn active">All</button>
            <button class="filter-btn">Thrill</button>
            <button class="filter-btn">Family</button>
            <button class="filter-btn">Water</button>
        </div>

        <div class="ride-grid">
            <div class="ride-card">
                <div class="ride-image">
                    <div class="wait-tag">15 MIN WAIT</div>
                    <img src="image/coaster.jpg" alt="Ride" style="width:100%; height:100%; object-fit:cover;">
                </div>
                <div class="ride-info">
                    <h3>Velocity Coaster</h3>
                    <div class="ride-meta">
                        <span>Height: 140cm+</span>
                        <span class="thrill-level">EXTREME</span>
                    </div>
                    <p style="font-size: 14px; color: #636e72;">Experience 0-60mph in 2 seconds on our fastest steel coaster.</p>
                    <a href="booking.php" class="btn-book">Fast Pass Booking</a>
                </div>
            </div>

            <div class="ride-card">
                <div class="ride-image">
                    <div class="wait-tag" style="color:#ffcc00; border-color:#ffcc00;">45 MIN WAIT</div>
                    <img src="image/ferris.jpg" alt="Ride" style="width:100%; height:100%; object-fit:cover;">
                </div>
                <div class="ride-info">
                    <h3>Sky Gaze Wheel</h3>
                    <div class="ride-meta">
                        <span>All Ages</span>
                        <span class="thrill-level" style="color:#00d1b2;">LOW</span>
                    </div>
                    <p style="font-size: 14px; color: #636e72;">Take in the breathtaking views of the entire park from 200ft up.</p>
                    <a href="booking.php" class="btn-book">Book Tickets</a>
                </div>
            </div>

            <div class="ride-card">
                <div class="ride-image">
                    <div class="wait-tag">5 MIN WAIT</div>
                    <img src="image/splash.jpg" alt="Ride" style="width:100%; height:100%; object-fit:cover;">
                </div>
                <div class="ride-info">
                    <h3>Aqua Drop</h3>
                    <div class="ride-meta">
                        <span>Height: 120cm+</span>
                        <span class="thrill-level">MEDIUM</span>
                    </div>
                    <p style="font-size: 14px; color: #636e72;">Cool off with a massive splash on our signature log flume ride.</p>
                    <a href="booking.php" class="btn-book">Fast Pass Booking</a>
                </div>
            </div>
        </div>
    </div>

</body>
</html>
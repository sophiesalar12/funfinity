<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>FunFinity | Hot Deals</title>
    <style>
        * { box-sizing: border-box; font-family: 'Segoe UI', sans-serif; transition: all 0.3s ease; }
        
        body { background: #f0f2f5; margin: 0; color: #2d3436; }

        /* --- NAV --- */
        .nav { background: #1a1a2e; color: white; padding: 15px 60px; display: flex; justify-content: space-between; align-items: center; }
        .logo { font-weight: bold; font-size: 22px; color: #ff5c7a; text-decoration: none; }
        .nav a { color: white; text-decoration: none; font-size: 14px; margin-left: 20px; }

        /* --- HEADER --- */
        .promo-header {
            background: linear-gradient(135deg, #ff5c7a 0%, #ff758c 100%);
            color: white;
            padding: 60px 20px;
            text-align: center;
            clip-path: ellipse(150% 100% at 50% 0%);
        }

        .promo-header h1 { margin: 0; font-size: 3rem; text-transform: uppercase; letter-spacing: 2px; }
        .promo-header p { font-size: 1.2rem; opacity: 0.9; }

        /* --- PROMO GRID --- */
        .container { max-width: 1100px; margin: -40px auto 60px; padding: 0 20px; }

        .promo-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
            gap: 25px;
        }

        /* The Ticket/Coupon Look */
        .promo-card {
            background: white;
            border-radius: 20px;
            display: flex;
            flex-direction: column;
            overflow: hidden;
            box-shadow: 0 10px 20px rgba(0,0,0,0.05);
            border-left: 8px solid #ff5c7a;
            position: relative;
        }

        .promo-card:hover { transform: translateY(-10px); box-shadow: 0 15px 30px rgba(0,0,0,0.1); }

        /* Scalloped edge effect for "Ticket" feel */
        .promo-card::after, .promo-card::before {
            content: "";
            position: absolute;
            background: #f0f2f5;
            width: 20px;
            height: 20px;
            border-radius: 50%;
            top: 50%;
            transform: translateY(-50%);
        }
        .promo-card::before { left: -14px; }
        .promo-card::after { right: -14px; }

        .promo-content { padding: 30px; }

        .promo-tag {
            background: #fff0f3;
            color: #ff5c7a;
            padding: 5px 12px;
            border-radius: 5px;
            font-size: 12px;
            font-weight: bold;
            display: inline-block;
            margin-bottom: 10px;
        }

        .promo-title { font-size: 24px; font-weight: bold; margin: 0 0 10px 0; color: #1a1a2e; }
        .promo-desc { font-size: 14px; color: #636e72; line-height: 1.6; margin-bottom: 20px; }

        .promo-footer {
            background: #fafafa;
            padding: 20px 30px;
            border-top: 2px dashed #eee;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .promo-code {
            font-family: 'Courier New', monospace;
            font-weight: bold;
            color: #1a1a2e;
            background: #eee;
            padding: 5px 10px;
            border-radius: 4px;
        }

        .btn-claim {
            background: #1a1a2e;
            color: white;
            text-decoration: none;
            padding: 10px 20px;
            border-radius: 10px;
            font-size: 13px;
            font-weight: bold;
        }

        .btn-claim:hover { background: #ff5c7a; }

        .expiry { font-size: 11px; color: #b2bec3; margin-top: 10px; display: block; }
    </style>
</head>
<body>

<nav class="nav">
    <a href="home.php" class="logo">FUNFINITY 🎡</a>
    <div>
        <a href="home.php">Home</a>
        <a href="rides.php">Rides</a>
        <a href="logout.php">Logout</a>
    </div>
</nav>

<header class="promo-header">
    <h1>Flash Sales & Promos</h1>
    <p>Grab these deals before they vanish into thin air!</p>
</header>

<div class="container">
    <div class="promo-grid">
        
        <div class="promo-card">
            <div class="promo-content">
                <div class="promo-tag">LIMITED TIME</div>
                <div class="promo-title">Barkada Bundle 🖐️</div>
                <p class="promo-desc">Bring the whole squad! Get 5 Adult tickets for the price of 4. Perfect for the ultimate weekend getaway.</p>
                <span class="expiry">Valid until: June 30, 2026</span>
            </div>
            <div class="promo-footer">
                <span class="promo-code">FUNSQUAD5</span>
                <a href="book.php" class="btn-claim">CLAIM DEAL</a>
            </div>
        </div>

        <div class="promo-card" style="border-left-color: #00d1b2;">
            <div class="promo-content">
                <div class="promo-tag" style="background: #e6fffa; color: #00d1b2;">STUDENT EXCLUSIVE</div>
                <div class="promo-title">Study Break 20% OFF</div>
                <p class="promo-desc">Present your valid Student ID at the counter or use this code online to enjoy a 20% discount on any ride pass.</p>
                <span class="expiry">Valid Mon - Fri only</span>
            </div>
            <div class="promo-footer">
                <span class="promo-code">STUDENTLIFE</span>
                <a href="book.php" class="btn-claim" style="background: #00d1b2;">CLAIM DEAL</a>
            </div>
        </div>

        <div class="promo-card" style="border-left-color: #ffcc00;">
            <div class="promo-content">
                <div class="promo-tag" style="background: #fffdeb; color: #f39c12;">BIRTHDAY GIFT</div>
                <div class="promo-title">Birthday Freebie! 🎂</div>
                <p class="promo-desc">It's your special day! Celebrants get a FREE All-Day Pass when accompanied by at least two paying guests.</p>
                <span class="expiry">Available all year round</span>
            </div>
            <div class="promo-footer">
                <span class="promo-code">HBD-FUN</span>
                <a href="book.php" class="btn-claim" style="background: #f39c12;">CLAIM DEAL</a>
            </div>
        </div>

    </div>
</div>

</body>
</html>
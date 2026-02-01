<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>About Us | FunFinity</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Orbitron:wght@400;700&family=Rajdhani:wght@500;700&display=swap');

        * { box-sizing: border-box; margin: 0; padding: 0; }
        
        body {
            font-family: 'Rajdhani', sans-serif;
            background: #0b0b1a; 
            background: linear-gradient(to bottom, #0b0b1a 0%, #1a1a4e 50%, #0b0b1a 100%);
            color: white;
            overflow-x: hidden;
        }

        /* --- NAV BAR (Synchronized with Home) --- */
        .nav {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 30px 80px; /* Matching Home's spacing */
            width: 100%;
            background: rgba(0, 0, 0, 0.3);
            backdrop-filter: blur(10px);
            position: sticky; /* Sticky is better for long pages like About */
            top: 0;
            z-index: 1000;
        }

        .logo {
            font-family: 'Orbitron', sans-serif;
            font-size: 26px;
            font-weight: bold;
            color: white;
            text-transform: uppercase;
            letter-spacing: 2px;
        }

        .nav-links {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .nav-links a {
            color: white;
            text-decoration: none;
            font-size: 15px;
            text-transform: uppercase;
            font-weight: 700;
            padding: 10px 25px;
            border-radius: 50px;
            transition: all 0.3s ease;
            letter-spacing: 1px;
            display: inline-block;
        }

        /* Hover effect from Home */
        .nav-links a:hover:not(.active) {
            background-color: white;
            color: #3b5bdb;
            transform: translateY(-2px);
            box-shadow: 0 4px 15px rgba(255, 255, 255, 0.2);
        }

        /* Active "ABOUT" pill style */
        .nav-links a.active {
            background: white;
            color: #3b5bdb;
            box-shadow: 0 4px 15px rgba(0,0,0,0.2);
        }

        /* Logout button style */
        .btn-logout {
            border: 1.5px solid white;
            margin-left: 10px;
        }

        /* --- ABOUT CONTENT --- */
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 80px 20px;
        }

        .main-title {
            font-family: 'Orbitron', sans-serif;
            font-size: 5rem;
            text-align: center;
            letter-spacing: 10px;
            margin-bottom: 5px;
        }

        .subtitle {
            text-align: center;
            letter-spacing: 4px;
            color: rgba(255,255,255,0.7);
            margin-bottom: 80px;
            text-transform: uppercase;
        }

        .story-flex {
            display: flex;
            gap: 50px;
            align-items: flex-start;
            margin-bottom: 100px;
        }

        .story-content { flex: 1.2; }
        .story-content h2 { font-family: 'Orbitron', sans-serif; font-size: 2.5rem; margin-bottom: 25px; line-height: 1.1; }
        .story-content p { font-size: 1.1rem; color: rgba(255,255,255,0.8); line-height: 1.6; margin-bottom: 25px; }

        .mission-quote {
            background: rgba(255, 255, 255, 0.05);
            padding: 30px;
            border-left: 5px solid #3b5bdb;
            border-radius: 0 20px 20px 0;
            box-shadow: 15px 15px 40px rgba(0,0,0,0.4);
            font-style: italic;
            backdrop-filter: blur(10px);
        }

        .story-img-box {
            flex: 1;
            padding: 10px;
            border: 3px solid #9d50bb;
            border-radius: 20px;
            box-shadow: 0 0 30px rgba(157, 80, 187, 0.3);
        }
        .story-img-box img { width: 100%; border-radius: 10px; display: block; }

        /* --- MAP SECTION --- */
        .map-title {
            font-family: 'Orbitron', sans-serif;
            text-align: center;
            font-size: 3rem;
            letter-spacing: 5px;
            margin-bottom: 60px;
        }

        .map-flex {
            display: flex;
            align-items: center;
            gap: 50px;
            margin-bottom: 50px;
        }

        .map-graphic { flex: 1.5; }
        .map-graphic img { width: 100%; filter: drop-shadow(0 0 20px rgba(0, 168, 204, 0.4)); }

        .zone-stack { flex: 1; display: flex; flex-direction: column; gap: 15px; }
        
        .zone-card {
            background: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(10px);
            padding: 20px;
            border-radius: 15px;
            border-left: 6px solid #3b5bdb;
            border: 1px solid rgba(255, 255, 255, 0.1);
            transition: 0.3s;
        }
        .zone-card:hover { transform: translateX(10px); background: rgba(255, 255, 255, 0.1); }
        .zone-card h4 { font-family: 'Orbitron', sans-serif; font-size: 1rem; margin-bottom: 5px; }
        .zone-card p { font-size: 0.85rem; color: rgba(255,255,255,0.6); }

        .btn-map-download {
            display: block;
            width: fit-content;
            margin: 30px auto 100px;
            padding: 12px 35px;
            background: white;
            color: black;
            text-decoration: none;
            border-radius: 50px;
            font-weight: bold;
            font-size: 0.9rem;
            transition: 0.3s;
        }
        .btn-map-download:hover { background: #3b5bdb; color: white; }

        /* --- STATS BAR --- */
        .stats-bar {
            display: flex;
            justify-content: center;
            gap: 20px;
            margin-bottom: 120px;
        }

        .stat-item {
            background: rgba(255, 255, 255, 0.05);
            padding: 30px 60px;
            border-radius: 15px;
            text-align: center;
            border: 1px solid rgba(255,255,255,0.1);
        }
        .stat-item h3 { font-family: 'Orbitron', sans-serif; font-size: 2.5rem; color: #3b5bdb; }
        .stat-item p { font-size: 0.9rem; letter-spacing: 2px; text-transform: uppercase; color: #00e5ff; }

        /* --- CORE VALUES --- */
        .values-title { font-family: 'Orbitron', sans-serif; text-align: center; font-size: 3.5rem; margin-bottom: 60px; letter-spacing: 4px; }
        
        .values-grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: 40px; }
        
        .value-node { text-align: left; }
        .node-num {
            background: #3b5bdb;
            width: 45px; height: 45px;
            display: flex; align-items: center; justify-content: center;
            border-radius: 10px; font-family: 'Orbitron'; margin-bottom: 20px;
        }
        .value-node h3 { font-family: 'Orbitron'; margin-bottom: 15px; font-size: 1.4rem; }
        .value-node p { color: rgba(255,255,255,0.6); line-height: 1.6; }

        footer {
            margin-top: 100px;
            background: #00e5ff;
            color: #0b0b1a;
            padding: 30px 80px;
            display: flex;
            justify-content: space-between;
            font-weight: bold;
        }
    </style>
</head>
<body>

    <nav class="nav">
        <div class="logo">FUNFINITY</div>
        <div class="nav-links">
            <a href="home.php">HOME</a>
            <a href="about.php" class="active">ABOUT</a>
            <a href="#">PROMOS</a>
            <a href="#">TICKETS</a>
            <a href="#">RIDES</a>
            <a href="index.php" class="btn-logout">LOGOUT</a>
        </div>
    </nav>

    <div class="container">
        <h1 class="main-title">OUR STORY</h1>
        <p class="subtitle">BEYOND THE HORIZON OF IMAGINATION.</p>

        <section class="story-flex">
            <div class="story-content">
                <h2>THE FUTURE OF<br>ENTERTAINMENT</h2>
                <p>Founded in 2026, FunFinity was born from a single dream: to erase the line between reality and the digital world. We don't just build rides; we build portals to new dimensions.</p>
                <div class="mission-quote">
                    "OUR MISSION IS TO PROVIDE AN INFINITE ESCAPE WHERE TECHNOLOGY MEETS ADRENALINE, CREATING MEMORIES THAT DEFY THE LAWS OF PHYSICS."
                </div>
            </div>
            <div class="story-img-box">
                <img src="image/landing.jpg" alt="Ferris Wheel">
            </div>
        </section>

        <h2 class="map-title">NAVIGATE THE INFINITY</h2>
        
        <section class="map-flex">
            <div class="map-graphic">
                <img src="image/map.png" alt="Park Map">
            </div>
            <div class="zone-stack">
                <div class="zone-card">
                    <h4>ZONE A: CENTRAL HUB</h4>
                    <p>Park entrance and main gathering area.</p>
                </div>
                <div class="zone-card">
                    <h4>ZONE B: ICE ZONE</h4>
                    <p>Snowy rides and cool attractions.</p>
                </div>
                <div class="zone-card">
                    <h4>ZONE C: DESERT ZONE</h4>
                    <p>Fast rides and adventure in a sandy area.</p>
                </div>
                <div class="zone-card">
                    <h4>ZONE D: JUNGLE ZONE</h4>
                    <p>Nature-themed rides and family attractions.</p>
                </div>
                <div class="zone-card">
                    <h4>ZONE E: WATER ZONE</h4>
                    <p>Splash rides and relaxing attractions.</p>
                </div>
            </div>
        </section>
        
        <a href="#" class="btn-map-download">DOWNLOAD HD MAP (PDF)</a>

        <section class="stats-bar">
            <div class="stat-item"><h3>50+</h3><p>Epic Rides</p></div>
            <div class="stat-item"><h3>700K+</h3><p>Happy Guests</p></div>
            <div class="stat-item"><h3>12</h3><p>Hotels</p></div>
            <div class="stat-item"><h3>24/7</h3><p>Adventure</p></div>
        </section>

        <h2 class="values-title">CORE VALUES</h2>
        <section class="values-grid">
            <div class="value-node">
                <div class="node-num">01</div>
                <h3>INNOVATION</h3>
                <p>We utilize the world's most advanced magnetic propulsion and VR integration systems.</p>
            </div>
            <div class="value-node">
                <div class="node-num">02</div>
                <h3>SAFETY FIRST</h3>
                <p>Our AI-monitored safety protocols ensure that while your heart races, you are in safe hands.</p>
            </div>
            <div class="value-node">
                <div class="node-num">03</div>
                <h3>SUSTAINABILITY</h3>
                <p>The park is powered 100% by renewable energy, including solar-integrated tracks.</p>
            </div>
        </section>
    </div>

    <footer>
        <div>© 2026 FUNFINITY THEME PARK.</div>
        <div style="display:flex; gap: 20px;">
            <a href="#" style="color: inherit; text-decoration: none;">PRIVACY</a>
            <a href="#" style="color: inherit; text-decoration: none;">SUPPORT</a>
        </div>
    </footer>

</body>
</html>
<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>FunFinity | Navigate the Infinity</title>
    <style>
        /* Import a futuristic font if possible, otherwise Segoe UI works well */
        @import url('https://fonts.googleapis.com/css2?family=Orbitron:wght@400;700&family=Rajdhani:wght@500;700&display=swap');

        * { box-sizing: border-box; margin: 0; padding: 0; }
        
        body {
            font-family: 'Rajdhani', sans-serif;
            background: #0b0b1a; /* Dark background from image */
            background: linear-gradient(to bottom, #0b0b1a 0%, #1a1a4e 50%, #00a8cc 100%);
            color: white;
            overflow-x: hidden;
        }

 /* --- UPDATED NAV BAR --- */
        .nav {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 30px 80px; /* Increased padding */
            position: absolute;
            width: 100%;
            z-index: 100;
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
    padding: 10px 25px; /* Pill-sized padding */
    border-radius: 50px; /* Perfect pill shape */
    transition: all 0.3s ease; /* Smooth fade and movement */
    letter-spacing: 1px;
    display: inline-block;
}

/* THE HOVER EFFECT: Matches Login style */
.nav-links a:hover:not(.active) {
    background-color: white;
    color: #3b5bdb; /* Blue/Purple text from your "HOME" crop */
    transform: translateY(-2px); /* Subtle lift like the login page */
    box-shadow: 0 4px 15px rgba(255, 255, 255, 0.2);
}

/* The active "HOME" pill style */
.nav-links a.active {
    background: white;
    color: #3b5bdb;
    box-shadow: 0 4px 15px rgba(0,0,0,0.2);
}

/* Optional: If you want Home to glow pink when hovered */
.nav-links a.active:hover {
    background: #ff5c7a;
    color: white;
    box-shadow: 0 6px 20px rgba(255, 92, 122, 0.4);
}


                /* Logout button style */
        .btn-logout {
            border: 1.5px solid white;
            margin-left: 10px;
        }


        /* --- HERO SECTION --- */
 .hero {
    height: 100vh;
    background: url('image/homepic.png') center/cover no-repeat;
    display: flex;
    justify-content: center;
    align-items: center;
    position: relative;
}

/* Lighten the overlay to let the image shine through */
.hero-overlay {
    background: rgba(0, 0, 0, 0.2); /* Changed from 0.4 to 0.2 for clarity */
    position: absolute;
    inset: 0;
}

/* Match the sleek glass look from the reference */
.hero-box {
    position: relative;
    text-align: center;
    border: 1.5px solid rgba(255, 255, 255, 0.4);
    padding: 60px;
    border-radius: 40px; /* More rounded like the photo */
    backdrop-filter: blur(4px); /* Reduced blur to make background clearer */
    background: rgba(255, 255, 255, 0.05); /* Subtle glass tint */
    max-width: 800px;
}

.hero-box h1 {
    font-family: 'Orbitron', sans-serif;
    font-size: 4rem; /* Larger like the reference */
    margin-bottom: 20px;
    text-transform: uppercase;
    letter-spacing: 4px;
    text-shadow: 0 0 20px rgba(255, 255, 255, 0.3);
}

.hero-box p {
    font-size: 1.2rem;
    max-width: 600px;
    margin: 0 auto;
    line-height: 1.6;
    letter-spacing: 1px;
}

        .btn-start {
            margin-top: 30px;
            padding: 12px 40px;
            background: white;
            color: black;
            text-decoration: none;
            border-radius: 50px;
            font-weight: bold;
            display: inline-block;
            transition: 0.3s;
        }

        /* --- STATS SECTION --- */
        .section-future {
            padding: 100px 60px;
            display: flex;
            gap: 50px;
            align-items: center;
        }

        .future-img {
            flex: 1;
            border-radius: 30px;
            overflow: hidden;
            box-shadow: 0 0 30px rgba(0,0,0,0.5);
        }

        .future-img img { width: 100%; display: block; }

        .future-content { flex: 1; }
        .future-content h2 { font-family: 'Orbitron', sans-serif; font-size: 2.5rem; margin-bottom: 20px; }

        .stats-grid { display: flex; gap: 20px; margin-top: 30px; }
        .stat-card {
            background: linear-gradient(135deg, #4e54c8, #8f94fb);
            padding: 20px;
            border-radius: 15px;
            flex: 1;
            text-align: center;
            border: 1px solid rgba(255,255,255,0.3);
        }

        /* --- MAP SECTION --- */
        .map-section {
            padding: 100px 60px;
            text-align: center;
        }

        .section-title {
            font-family: 'Orbitron', sans-serif;
            font-size: 3rem;
            margin-bottom: 50px;
            text-transform: uppercase;
        }
        /* Styling for the new subheader */
        .section-subtitle {
        font-family: 'Rajdhani', sans-serif; /* Using the cleaner font */
        font-size: 1.2rem;
        color: rgba(255, 255, 255, 0.8); /* Slightly transparent white */
        margin-top: -40px; /* Pulls it closer to the h2 title */
        margin-bottom: 50px; /* Space before the cards start */
        text-transform: uppercase;
        letter-spacing: 1px;
        }

/* --- ENHANCED MAP SECTION --- */
.map-section .section-title {
    font-size: 3rem; /* Making "NAVIGATE THE INFINITY" very big */
    letter-spacing: 5px;
    margin-bottom: 60px;
    text-shadow: 0 0 30px rgba(78, 84, 200, 0.5);
}

.map-container {
    display: flex;
    gap: 60px;
    align-items: center;
    justify-content: center;
    padding: 0 5%;
}

.map-img img {
    width: 100%;
    max-width: 650px; /* Bigger map presence */
    filter: drop-shadow(0 0 20px rgba(0, 168, 204, 0.4));
}

.zone-list {
    display: flex;
    flex-direction: column;
    gap: 20px;
}

/* Glassmorphism Zone Cards */
.zone-item {
    background: rgba(255, 255, 255, 0.05); /* Very transparent */
    backdrop-filter: blur(10px); /* Blur effect like the image */
    padding: 25px 35px;
    border-radius: 20px;
    width: 450px; /* Wider cards */
    text-align: left;
    border: 1px solid rgba(255, 255, 255, 0.1);
    border-left: 8px solid #4e54c8; /* Thick blue accent line */
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
    transition: all 0.4s ease;
}

.zone-item:hover {
    background: rgba(255, 255, 255, 0.15);
    transform: translateX(15px);
    border-left: 8px solid #00a8cc; /* Color shift on hover */
    box-shadow: 0 0 20px rgba(0, 168, 204, 0.3);
}

.zone-item strong {
    font-family: 'Orbitron', sans-serif;
    font-size: 1.3rem;
    display: block;
    margin-bottom: 8px;
    color: #fff;
    letter-spacing: 1px;
}

.zone-item p {
    font-size: 1rem;
    color: rgba(255, 255, 255, 0.7);
    line-height: 1.4;
}

        /* --- PASSES SECTION --- */
        .pass-section { padding: 100px 60px; text-align: center; }
        .pass-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 30px;
            margin-top: 50px;
        }

        .pass-card {
            background: linear-gradient(to bottom, #4e54c8, #10ac84);
            border-radius: 25px;
            overflow: hidden;
            padding-bottom: 30px;
        }

        .pass-card img { width: 100%; height: 250px; object-fit: cover; }
        .pass-card h3 { margin: 20px 0; font-family: 'Orbitron', sans-serif; }
        .price { font-size: 2rem; font-weight: bold; margin-bottom: 20px; display: block;}

        .btn-ticket {
            background: #c1ff72;
            color: black;
            padding: 10px 30px;
            text-decoration: none;
            border-radius: 10px;
            font-weight: bold;
        }

        footer {
            padding: 40px;
            background: #00a8cc;
            display: flex;
            justify-content: space-between;
            font-size: 14px;
        }
    </style>
</head>
<body>

    <div class="nav">
        <div class="logo">FUNFINITY</div>
        <div class="nav-links">
            <a href="home.php" class="active">Home</a>
            <a href="about.php">About</a>
            <a href="#">Promos</a>
            <a href="#">Tickets</a>
            <a href="#">Rides</a>
            <a href="index.php" class="btn-logout">LOGOUT</a>
        </div>
    </div>

    <div class="hero">
        <div class="hero-overlay"></div>
        <div class="hero-box">
            <h1>UNLEASH THE THRILL</h1>
            <p>Experience the world's fastest rides, endless adventure, and memories that last a lifetime.</p>
            <a href="#passes" class="btn-start">GET STARTED</a>
        </div>
    </div>

    <div class="section-future">
        <div class="future-img">
            <img src="image/landing.jpg" alt="Ferris Wheel">
        </div>
        <div class="future-content">
            <h2>WELCOME TO THE FUTURE OF FUN</h2>
            <p>Experience world-class attractions designed for thrill-seekers of all ages. From high-speed coasters to immersive zones.</p>
            <div class="stats-grid">
                <div class="stat-card">
                    <h3>50+</h3>
                    <p>EPIC RIDES</p>
                </div>
                <div class="stat-card">
                    <h3>700K+</h3>
                    <p>HAPPY GUESTS</p>
                </div>
            </div>
        </div>
    </div>

    <div class="map-section">
        <h2 class="section-title">NAVIGATE THE INFINITY</h2>
        <div class="map-container">
            <div class="map-img">
                <img src="image/map.png" alt="Park Map">
            </div>
            <div class="zone-list">
                <div class="zone-item">
                    <strong>ZONE A: CENTRAL HUB</strong>
                    <p>Park entrance and main gathering area.</p>
                </div>
                <div class="zone-item">
                    <strong>ZONE B: ICE ZONE</strong>
                    <p>Snowy rides and cool attractions.</p>
                </div>
                <div class="zone-item">
                    <strong>ZONE C: DESERT ZONE</strong>
                    <p>Fast rides and adventure in a sandy area.</p>
                </div>
                <div class="zone-item">
                    <strong>ZONE D: JUNGLE ZONE</strong>
                    <p>Nature-themed rides and family attractions.</p>
                </div>
                <div class="zone-item">
                    <strong>ZONE E: WATER ZONE</strong>
                    <p>Splash rides and relaxing attractions.</p>
                </div>
            </div>
        </div>
        <br><br>
        <a href="#" class="btn-start">DOWNLOAD HD MAP (PDF)</a>
    </div>

    <div id="passes" class="pass-section">
        <h2 class="section-title">CHOOSE YOUR PASS</h2>
        <p class="section-subtitle">Select the ticket that fits your adventure style.</p>
        <div class="pass-grid">
            <div class="pass-card">
                <img src="image/image (3).png" alt="Child">
                <h3>CHILD PASS</h3>
                <span class="price">₱499</span>
                <a href="#" class="btn-ticket">SELECT TICKET</a>
            </div>
            <div class="pass-card">
                <img src="image/image (2).png" alt="Teen">
                <h3>TEEN PASS</h3>
                <span class="price">₱699</span>
                <a href="#" class="btn-ticket">SELECT TICKET</a>
            </div>
            <div class="pass-card">
                <img src="image/image (1).png" alt="Adult">
                <h3>ADULT PASS</h3>
                <span class="price">₱899</span>
                <a href="#" class="btn-ticket">SELECT TICKET</a>
            </div>
        </div>
    </div>

    <footer>
        <div>© 2026 FUNFINITY THEME PARK.</div>
        <div>
            <a href="#" style="color: white; margin-right: 20px;">PRIVACY</a>
            <a href="#" style="color: white;">SUPPORT</a>
        </div>
    </footer>

</body>
</html>
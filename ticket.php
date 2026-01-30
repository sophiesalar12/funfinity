<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>FunFinity | Secure Payment</title>
    <style>
        * { box-sizing: border-box; font-family: 'Segoe UI', sans-serif; transition: all 0.3s ease; }
        
        body { background: #f4f7f6; margin: 0; color: #2d3436; }

        /* --- NAV --- */
        .nav { background: #1a1a2e; color: white; padding: 15px 60px; display: flex; justify-content: space-between; align-items: center; }
        .logo { font-weight: bold; font-size: 22px; color: #ff5c7a; text-decoration: none; }

        .booking-container {
            max-width: 1100px;
            margin: 40px auto;
            display: grid;
            grid-template-columns: 1fr 350px;
            gap: 30px;
            padding: 0 20px;
        }

        .main-form { background: white; padding: 30px; border-radius: 15px; box-shadow: 0 5px 15px rgba(0,0,0,0.05); }
        h2 { margin-top: 0; color: #1a1a2e; border-bottom: 2px solid #f0f2f5; padding-bottom: 10px; font-size: 20px; }

        /* --- PAYMENT METHOD STYLING --- */
        .payment-methods {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 15px;
            margin: 20px 0 30px;
        }

        .method-card {
            border: 2px solid #eee;
            border-radius: 12px;
            padding: 20px;
            cursor: pointer;
            text-align: center;
            position: relative;
        }

        /* Hide the actual radio button but keep it functional */
        .method-card input {
            position: absolute;
            opacity: 0;
            cursor: pointer;
        }

        .method-card img {
            height: 40px;
            margin-bottom: 10px;
            display: block;
            margin-left: auto;
            margin-right: auto;
        }

        .method-card span {
            font-weight: bold;
            font-size: 14px;
            display: block;
        }

        /* GCash Specific Hover/Active */

.method-card input:checked + .method-content.gcash-box {
    border-color: #007dfe;
    background-color: #f0f7ff;
    /* Use your local file name here */
    background-image: url("image/gcash.png"); 
    background-position: center 20%; /* Pushes logo slightly up to leave room for text */
    background-repeat: no-repeat;
    background-size: 50px; /* Keeps the logo at a professional icon size */
    padding-top: 60px; /* Adds space so text doesn't overlap the logo */
}

        /* Maya Specific Hover/Active */
        .method-card input:checked + .method-content.maya-box {
    border-color: #007dfe;
    background-color: #f0f7ff;
    /* Use your local file name here */
    background-image: url("image/maya.png"); 
    background-position: center 20%; /* Pushes logo slightly up to leave room for text */
    background-repeat: no-repeat;
    background-size: 50px; /* Keeps the logo at a professional icon size */
    padding-top: 60px; /* Adds space so text doesn't overlap the logo */
}

        /* Selected State Marker */
        .method-card input:checked + .method-content::after {
            content: "✓";
            position: absolute;
            top: 10px;
            right: 10px;
            background: #2d3436;
            color: white;
            width: 20px;
            height: 20px;
            border-radius: 50%;
            font-size: 12px;
            line-height: 20px;
        }

        /* --- SUMMARY SIDEBAR --- */
        .summary-card { background: #1a1a2e; color: white; padding: 25px; border-radius: 15px; height: fit-content; position: sticky; top: 20px; }
        .summary-card h3 { margin-top: 0; color: #ff5c7a; }
        .summary-item { display: flex; justify-content: space-between; margin-bottom: 15px; font-size: 14px; opacity: 0.8; }
        .total-row { display: flex; justify-content: space-between; font-size: 22px; font-weight: bold; margin-top: 20px; border-top: 1px solid rgba(255,255,255,0.1); padding-top: 20px;}

        .btn-pay {
            width: 100%;
            padding: 16px;
            background: #ff5c7a;
            color: white;
            border: none;
            border-radius: 12px;
            font-weight: bold;
            font-size: 16px;
            margin-top: 25px;
            cursor: pointer;
            box-shadow: 0 4px 15px rgba(255, 92, 122, 0.3);
        }

        .btn-pay:hover { background: #ff758c; transform: translateY(-2px); }
    </style>
</head>
<body>

<nav class="nav">
    <a href="home.php" class="logo">FUNFINITY 🎡</a>
    <div style="font-size: 13px; opacity: 0.8;">Step 2 of 2: Payment</div>
</nav>

<div class="booking-container">
    <div class="main-form">
        <h2>Select Payment Method</h2>
        <p style="font-size: 14px; color: #666; margin-bottom: 20px;">Choose your preferred e-wallet to complete the transaction.</p>

        <form action="process_payment.php" method="POST">
            <div class="payment-methods">
                <label class="method-card gcash">
                    <input type="radio" name="payment_method" value="gcash" required>
                    <div class="method-content gcash-box">
                        <span>Gcash</span>
                    </div>
                </label>

                <label class="method-card maya">
                    <input type="radio" name="payment_method" value="maya">
                    <div class="method-content maya-box">
                        <span>Maya</span>
                    </div>
                </label>
            </div>

            <h2>Billing Details</h2>
            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 15px; margin-top: 15px;">
                <input type="text" placeholder="First Name" style="padding: 12px; border: 1px solid #ddd; border-radius: 8px;" required>
                <input type="text" placeholder="Last Name" style="padding: 12px; border: 1px solid #ddd; border-radius: 8px;" required>
            </div>
            <input type="email" placeholder="Email Address for E-Ticket" style="width:100%; padding: 12px; border: 1px solid #ddd; border-radius: 8px; margin-top: 15px;" required>
        </form>
    </div>

    <div class="summary-card">
        <h3>Order Summary</h3>
        <div class="summary-item">
            <span>2x Adult Passes</span>
            <span>₱1,800.00</span>
        </div>
        <div class="summary-item">
            <span>1x Child Pass</span>
            <span>₱600.00</span>
        </div>
        <div class="summary-item">
            <span>Service Fee</span>
            <span>₱50.00</span>
        </div>
        
        <div class="total-row">
            <span>Total:</span>
            <span>₱2,450.00</span>
        </div>

        <button class="btn-pay" onclick="alert('Redirecting to E-Wallet...')">PAY NOW</button>
        
        <div style="margin-top: 20px; display: flex; align-items: center; justify-content: center; gap: 10px; opacity: 0.6; font-size: 11px;">
            <span>🛡️ Data encrypted</span>
            <span>✅ Instant Confirmation</span>
        </div>
    </div>
</div>

</body>
</html>
<?= template_header('Place Order') ?>
<?php

if (isset($_POST['checkout'])) {
    header('Location: index.php?page=checkout');
    exit;
}
?>

<div class="placeorder content-wrapper">
    <h1>PLACE ORDER</h1>
    <form action="index.php?page=orderprocess" method="post">
        <div class="billing-info">
            <center><h2>BILLING INFORMATION</h2> </center>
            <label for="name">Name:</label>
            <input type="text" name="name" id="name" required>
            <label for="name">Contact:</label>
            <input type="text" name="contact" id="contact" required>
            <label for="email">Email:</label>
            <input type="email" name="email" id="email" required>
            <label for="address">Address:</label>
            <input type="text" name="address" id="address" required>
            <label for="city">City:</label>
            <input type="text" name="city" id="city" required>
            <label for="address">Zip Code:</label>
            <input type="text" name="zipcode" id="zipcode" required>
        </div>
        <center>
        <div class="payment-options">
            <h3>Mode of Payment</h3>
            <p>Please select your mode of payment</p>
            <label>
                <input type="radio" name="payment" id="paypal" value="paypal" required>PayPal <br>
                <input type="radio" name="payment" id="gcash" value="gcash" required>Gcash <br>
                <input type="radio" name="payment" id="paymaya" value="paymaya" required>PayMaya <br>
                <input type="radio" name="payment" id="credit_card" value="credit_card" required>Credit Card <br>
            </label>
            <input type="submit" value="checkout" name="checkout"> 
        </center>
    </form>
</div>

<style>
    body {
        background-color: #f5f5f5;
        margin: 0;
        padding: 20px;
        scroll-behavior: smooth;
    }

    .placeorder {
        display: flex;
        flex-direction: column;
        
        text-align: left;
    }

    .placeorder h1 {
        font-size: 35px;
        color: #111b27;
    }

    .billing-info {
        border: 1px solid rgba(17, 27, 39, 0.5);
        border-radius: 10px;
        padding: 20px;
        background-color: rgba(255, 255, 255, 0.9);
        box-shadow: 0 0 10px rgba(17, 27, 39, 0.1);
        margin-bottom: 20px;
        width:100%;
    }

    .billing-info h2 {
        font-size: 18px;
        margin-bottom: 10px;
        color: #111b27;
    }

    .billing-info label {
        display: block;
        margin-bottom: 5px;
        color: #111b27;
    }

    .billing-info input[type="text"],
    .billing-info input[type="email"] {
        width: 100%;
        padding: 5px;
        margin-bottom: 10px;
        border: 1px solid rgba(17, 27, 39, 0.3);
        border-radius: 5px;
    }

    .payment-options {
        background-color: rgba(255, 255, 255, 0.9);
        border: 1px solid rgba(17, 27, 39, 0.5);
        border-radius: 10px;
        padding: 20px;
        box-shadow: 0 0 10px rgba(17, 27, 39, 0.1);
        margin-bottom: 50px;
        width: 650px;
        text-align: center;
    }

    .payment-options h3 {
        font-size: 18px;
        margin-bottom: 10px;
        color: #111b27;
    }

    .payment-options label {
        display: block;
        margin-bottom: 5px;
        color: #111b27;
    }

    .payment-options input[type="radio"] {
        margin-bottom: 10px;
    }

    .placeorder input[type="submit"] {
        background-color: #111b27;
        color: white;
        padding: 10px 20px;
        width: 100%;
        border: none;
        border-radius: 5px;
        font-size: 16px;
        cursor: pointer;
    }

    .placeorder input[type="submit"]:hover {
        background-color: #1f2d3d;
    }
</style>
<br><br><br><?= template_footer() ?>

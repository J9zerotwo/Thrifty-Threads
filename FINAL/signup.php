<?php if (isset($_POST["signup"])) {
    $firstName = $_POST["fname"];
    $surName = $_POST["lname"];
    $username = $_POST["username"];
    $email = $_POST["email_add"];
    $password = $_POST["password"];
    $confirmPassword = $_POST["confpass"];
    $address = $_POST["address"];
    $contact = $_POST["contact_no"];

    try {
        $DATABASE_HOST = 'localhost';
        $DATABASE_USER = 'root';
        $DATABASE_PASS = '';
        $DATABASE_NAME = 'shoppingcart';

        $conn = new PDO("mysql:host=$DATABASE_HOST;dbname=$DATABASE_NAME", $DATABASE_USER, $DATABASE_PASS);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        if ($password == $confirmPassword) {
            $query = "INSERT INTO customer_info (username, email, password, firstname, surname, address, contact)
            VALUES ('$username', '$email', '$password', '$firstName', '$surName', '$address', '$contact')";

            $conn->exec($query);
            header('Location: login.php');
            exit("You have successfully signed up!");
        }

    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }

    $conn = null;
} ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="login-style.css">
    <title>Account Registration</title>
</head>

<body>
    <div class="sign-up container">
        <div class="feautured">
            <h2>Signup your Account</h2>
        </div>
        <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
            <div class="input-row">
                <input type="text" name="fname" placeholder="First Name" required>
                <input type="text" name="lname" placeholder="Surname" required>
            </div>
            <div class="input-row">
                <input type="text" name="username" placeholder="Username" required>
                <input type="text" name="email_add" placeholder="Email Address" required>
            </div>
            <div class="input-row">
                <input type="password" name="password" placeholder="Password" required>
                <input type="password" name="confpass" placeholder="Confirm Password" required>
            </div>
            <input type="text" name="address" placeholder="Current Address" required>
            <input type="text" name="contact_no" placeholder="Contact Number" required>
            <input type="submit" name="signup" value="Signup">
            <a href="login.php">Already Have an Account?</a>
        </form>
    </div>
    <div class="alert-message">
        <?php if (isset($success)) {
            echo $success;
        } ?>
    </div>
</body>

</html>
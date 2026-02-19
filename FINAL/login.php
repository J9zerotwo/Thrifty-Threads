<?php session_start();
if (isset($_POST["login"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];

    if (isset($_SESSION["user"])) {
        header('Location: index.php');
        exit();
    }

    try {
        $DATABASE_HOST = 'localhost';
        $DATABASE_USER = 'root';
        $DATABASE_PASS = '';
        $DATABASE_NAME = 'shoppingcart';

        $conn = new PDO("mysql:host=$DATABASE_HOST;dbname=$DATABASE_NAME", $DATABASE_USER, $DATABASE_PASS);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $query = "SELECT * FROM customer_info WHERE username = :username LIMIT 1";
        $stmt = $conn->prepare($query);
        $stmt->bindValue(':username', $username);
        $stmt->execute();

        if ($stmt->rowCount() == 1) {
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            $tableUser = $row["username"];
            $tablePass = $row["password"];


            if ($tableUser == $username && $tablePass == $password) {
                $_SESSION["user"] = $tableUser;
                $_SESSION["email"] = $row["email"];
                $_SESSION["pass"] = $row["password"];
                $_SESSION["fname"] = $row["firstname"];
                $_SESSION["lname"] = $row["surname"];
                $_SESSION["home"] = $row["address"];
                $_SESSION["phone"] = $row["contact"];
                header('Location: index.php');
                exit();
            } else {
                $invalid = "Invalid username or password";
            }
        }

        $conn = null;

    } catch (PDOException $e) {
        die("ERROR: Could not able to connect." . $e->getMessage());
    }
} ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="login-style.css">
    <title>Welcome to Thrift Shop</title>
</head>

<body>
    <div>
        <?php if (isset($invalid)) {
            echo $invalid;
        } ?>
    </div>
    <div class="login-container">
        <div class="feautured">
        <center><img src='LOGO.png' alt='Logo' width="200" height="200"></center>
        <h2>Thrifthy Threads </h2> 
        </div>
        <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
            <input type="text" name="username" placeholder="Username" required><br>
            <input type="password" name="password" placeholder="Password" required><br>
            <input type="submit" value="Login" name="login">
        </form>
        <form action="signup.php" method="post">
            <input type="submit" value="Signup">
        </form>
    </div>
</body>

</html>
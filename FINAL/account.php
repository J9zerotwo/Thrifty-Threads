<style>
  * {
    box-sizing: border-box;
  }

  body {
    background-color: #f5f5f5;
    margin: 0;
    padding: 20px;
    scroll-behavior: smooth;
  }

  .account-container {
    background: #111b27;
    border-radius: 10px;
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
    padding: 20px;
    margin: 20px;
  }

  .acc-info {
    background: rgba(255, 255, 255, 0.1);
    border-radius: 10px;
    padding: 20px;
    margin-bottom: 20px;
    color: white;
    font-size: 18px;
    display: flex;
    flex-direction: column;

  }

  .acc-info span {
    font-weight: bold;
  }

  .acc-info b {
    display: inline-flex;
    margin-bottom: 10px;
  }

  .acc-info-item {
    margin-bottom: 10px;
    padding: 10px;
    border-radius: 10px;
    background: rgba(255, 255, 255, 0.2);
    color: #fff;
  }


  .acc-info-item span {
    font-weight: bold;
    color: #555;
  }

  .reset-container {
    background: rgba(255, 255, 255, 0.1);
    border-radius: 10px;
    padding: 20px;
    margin-top: 20px;
  }

  input[type="password"] {
    background: #f5f9ff;
    border: none;
    border-radius: 5px;
    color: #333;
    padding: 10px;
    margin-bottom: 10px;
    width: 65%;
  }

  input[type="submit"] {
    background: linear-gradient(45deg, #00adb5, #19647e);
    border: none;
    border-radius: 5px;
    color: #fff;
    padding: 10px 20px;
    cursor: pointer;
  }

  .alert-message {
    background: #e8f1ff;
    border-radius: 5px;
    padding: 10px;
    margin-bottom: 20px;
    text-align: center;
    color: red;
  }
</style>


<?php $name = $_SESSION["fname"] . " " . $_SESSION["lname"];
$email = $_SESSION["email"];
$pass = $_SESSION["pass"];
$user = $_SESSION["user"];
$address = $_SESSION["home"];
$phone = $_SESSION["phone"];

if (isset($_POST["reset"])) {

    $current_pass = $_POST["password"];
    $reset_password = $_POST["resetpass"];
    $confirm_reset = $_POST["confreset"];

    try {
        $DATABASE_HOST = 'localhost';
        $DATABASE_USER = 'root';
        $DATABASE_PASS = '';
        $DATABASE_NAME = 'shoppingcart';

        $conn = new PDO("mysql:host=$DATABASE_HOST;dbname=$DATABASE_NAME", $DATABASE_USER, $DATABASE_PASS);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $query = "UPDATE customer_info SET password='$reset_password' WHERE username='$user'";
        if ($pass == $current_pass) {
            if ($reset_password == $confirm_reset) {
                $stmt = $conn->prepare($query);
                $stmt->execute();
                $success = "You've successfully changed your password";
            } else {
                $failed = "Passwords do not match!";
            }
        } else {
            $nomatch = "Something went wrong. We're sorry";
        }

    } catch (PDOException $e) {
        echo $e->getMessage();
    }

    $conn = null;
} ?>

<?= template_header('Account') ?>
<div class="account alert-message"></div>
    <?php if (!isset($nomatch)) {
        if (!isset($failed)) {
            echo @$success;
        } else {
            echo $failed;
        }
    } else {
        echo $nomatch;
    } ?>
</div>

<div class="account account-container">
<center><h1>ACCOUNT INFORMATION</h1></center>
    <div class="acc-info">
        <div class="acc-info-item">
            <b>Name:</b> <?= $name ?>
        </div>
        <div class="acc-info-item">
            <b>Username:</b> <?= $user ?>
        </div>
        <div class="acc-info-item">
            <b>Email Address:</b> <?= $email ?>
        </div>
        <div class="acc-info-item">
            <b>Contact Number:</b> <?= $phone ?>
        </div>
        <div class="acc-info-item">
            <b>Home Address:</b> <?= $address ?>
        </div>
    </div>
    <div class="account reset-container">
        <form action="index.php?page=account" method="post">
        <center>
            <br><input type="password" name="password" placeholder="Current Password"><br>
            <br><input type="password" name="resetpass" placeholder="Reset Password"><br>
            <br><input type="password" name="confreset" placeholder="Confirm Reset Password"><br>
            <br><input type="submit" name="reset" value="Reset Password">
        </center>
        </form>
    </div>
</div>
<?= template_footer() ?>
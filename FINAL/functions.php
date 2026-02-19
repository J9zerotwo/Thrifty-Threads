<?php
function mysqli_connect_mysql()
{
    // Update the details below with your MySQL details
    $DATABASE_HOST = 'localhost';
    $DATABASE_USER = 'root';
    $DATABASE_PASS = '';
    $DATABASE_NAME = 'shoppingcart';

    // Create a new mysqli connection
    $conn = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);

    // Check connection
    if (!$conn) {
        exit('Failed to connect to database!');
    }

    // Set the connection character set to UTF-8
    mysqli_set_charset($conn, 'utf8');

    // Return the connection object
    return $conn;
}

// Template header, feel free to customize this
function template_header($title)
{
    // Get the number of items in the shopping cart, which will be displayed in the header.
    $num_items_in_cart = isset($_SESSION['cart']) ? count($_SESSION['cart']) : 0;
    echo <<<EOT
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>$title</title>
        <link href="style.css" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
    </head>
    <body>
        <header>
            <div class="content-wrapper">
                <h1>THRIFTY THREADS </h1>
                <nav>
                    <a href="index.php">Home</a>
                    <a href="index.php?page=products">Products</a>
                    <a href="index.php?page=account">Account</a>
                </nav>
                <div class="link-icons">
                    <a href="index.php?page=cart">
                        <i class="fas fa-shopping-cart"></i>
                        <span>$num_items_in_cart</span>
                    </a>
                </div>
                <nav>
                    <a href="logout.php">Logout</a>
                </nav>
            </div>
        </header>
        <main>
EOT;
}

// Template footer
function template_footer()
{
    $year = date('Y');
    echo <<<EOT
        </main>
        <footer>
            <div class="content-wrapper">
                <p>&copy; $year, Shopping Cart System</p>
            </div>
        </footer>
    </body>
</html>
EOT;
} ?>
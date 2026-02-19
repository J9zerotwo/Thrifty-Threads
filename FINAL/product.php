<?php
// Check to make sure the id parameter is specified in the URL
if (isset($_GET['id'])) {
    // Create a mysqli connection
    $conn = mysqli_connect('localhost', 'root', '', 'shoppingcart');

    // Check connection
    if (!$conn) {
        exit('Failed to connect to database!');
    }

    // Prepare the SQL statement
    $query = 'SELECT * FROM products WHERE id = ?';
    $stmt = mysqli_prepare($conn, $query);

    // Bind the value to the statement
    mysqli_stmt_bind_param($stmt, "i", $_GET['id']);

    // Execute the statement
    mysqli_stmt_execute($stmt);

    // Get the result set
    $result = mysqli_stmt_get_result($stmt);

    // Fetch the product from the result set and return the result as an array
    $product = mysqli_fetch_assoc($result);

    // Check if the product exists (array is not empty)
    if (!$product) {
        // Simple error to display if the id for the product doesn't exist (array is empty)
        exit('Product does not exist!');
    }

    // Close the statement
    mysqli_stmt_close($stmt);

    // Close the connection
    mysqli_close($conn);
} else {
    // Simple error to display if the id wasn't specified
    exit('Product does not exist!');
}
?>

<?=template_header('Product')?>

<div class="product content-wrapper">
    <img src="imgs/<?=$product['img']?>" width="500" height="500" alt="<?=$product['name']?>">
    <div>
        <h1 class="name"><?=$product['name']?></h1>
        <span class="price">
        &#8369;<?=$product['price']?>
            <?php if ($product['rrp'] > 0): ?>
            <span class="rrp">&#8369;<?=$product['rrp']?></span>
            <?php endif; ?>
        </span>
        <form action="index.php?page=cart" method="post">
            <input type="number" name="quantity" value="1" min="1" max="<?=$product['quantity']?>" placeholder="Quantity" required>
            <input type="hidden" name="product_id" value="<?=$product['id']?>">
            <input type="submit" value="Add To Cart">
        </form>
        <div class="description">
            <?=$product['desc']?>
        </div>
    </div>
</div>

<?=template_footer()?>

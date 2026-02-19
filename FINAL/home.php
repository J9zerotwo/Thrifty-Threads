<?php
// Create a mysqli connection
$conn = mysqli_connect('localhost', 'root', '', 'shoppingcart');

// Check connection
if (!$conn) {
    exit('Failed to connect to database!');
}

// Get the 4 most recently added products
$query = 'SELECT * FROM products ORDER BY date_added DESC LIMIT 4';
$result = mysqli_query($conn, $query);

// Fetch the result as an associative array
$recently_added_products = mysqli_fetch_all($result, MYSQLI_ASSOC);

// Free the result set
mysqli_free_result($result);

// Close the connection
mysqli_close($conn);
?>

<?=template_header('Home')?>

<div class="featured">
    <h2>Thrifty Threads</h2>
    <p>
        "Someone's trash is another persons treasure."
    </p>
</div>
<div class="recentlyadded content-wrapper">
    <h2>Recently Added Products</h2>
    <div class="products">
        <?php foreach ($recently_added_products as $product): ?>
        <a href="index.php?page=product&id=<?=$product['id']?>" class="product">
            <img src="imgs/<?=$product['img']?>" width="200" height="200" alt="<?=$product['name']?>">
            <span class="name"><?=$product['name']?></span>
            <span class="price">
            &#8369;<?=$product['price']?>
                <?php if ($product['rrp'] > 0): ?>
                <span class="rrp">&#8369;<?=$product['rrp']?></span>
                <?php endif; ?>
            </span>
        </a>
        <?php endforeach; ?>
    </div>
</div>

<?=template_footer()?>

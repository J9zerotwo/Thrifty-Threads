<?php

// The amounts of products to show on each page
$num_products_on_each_page = 12;

// The current page - in the URL, will appear as index.php?page=products&p=1, index.php?page=products&p=2, etc...
$current_page = isset($_GET['p']) && is_numeric($_GET['p']) ? (int)$_GET['p'] : 1;

// Create a mysqli connection
$conn = mysqli_connect('localhost', 'root', '', 'shoppingcart');

// Check connection
if (!$conn) {
    exit('Failed to connect to database!');
}

// Prepare the SQL statement
$query = 'SELECT * FROM products ORDER BY date_added DESC LIMIT ?,?';
$stmt = mysqli_prepare($conn, $query);

// Bind the values to the statement
$start_limit = ($current_page - 1) * $num_products_on_each_page;
$end_limit = $num_products_on_each_page;
mysqli_stmt_bind_param($stmt, "ii", $start_limit, $end_limit);

// Execute the statement
mysqli_stmt_execute($stmt);

// Get the result set
$result = mysqli_stmt_get_result($stmt);

// Fetch the products from the result set and return the result as an array
$products = mysqli_fetch_all($result, MYSQLI_ASSOC);

// Get the total number of products
$total_products = mysqli_num_rows(mysqli_query($conn, 'SELECT * FROM products'));

// Close the statement
mysqli_stmt_close($stmt);

// Close the connection
mysqli_close($conn);
?>

<?=template_header('Products')?>

<div class="products content-wrapper">
    <h1>Products</h1>
    <p><?=$total_products?> Products</p>
    <div class="products-wrapper">
        <?php foreach ($products as $product): ?>
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
    <div class="buttons">
        <?php if ($current_page > 1): ?>
        <a href="index.php?page=products&p=<?=$current_page-1?>">Prev</a>
        <?php endif; ?>
        <?php if ($total_products > ($current_page * $num_products_on_each_page) - $num_products_on_each_page + count($products)): ?>
        <a href="index.php?page=products&p=<?=$current_page+1?>">Next</a>
        <?php endif; ?>
    </div>
</div>

<?=template_footer()?>

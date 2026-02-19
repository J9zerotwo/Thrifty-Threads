<?php
// If the user clicked the add to cart button on the product page, check for the form data
if (isset($_POST['product_id'], $_POST['quantity']) && is_numeric($_POST['product_id']) && is_numeric($_POST['quantity'])) {
    // Set the post variables so we easily identify them and make sure they are integers
    $product_id = (int)$_POST['product_id'];
    $quantity = (int)$_POST['quantity'];

    // Create a mysqli connection
    $conn = mysqli_connect('localhost', 'root', '', 'shoppingcart');

    // Check connection
    if (!$conn) {
        exit('Failed to connect to database!');
    }

    // Prepare the SQL statement to check if the product exists in the database
    $stmt = mysqli_prepare($conn, 'SELECT * FROM products WHERE id = ?');
    mysqli_stmt_bind_param($stmt, 'i', $product_id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $product = mysqli_fetch_assoc($result);

    // Check if the product exists (array is not empty)
    if ($product && $quantity > 0) {
        // Product exists in the database, now we can create/update the session variable for the cart
        if (isset($_SESSION['cart']) && is_array($_SESSION['cart'])) {
            if (array_key_exists($product_id, $_SESSION['cart'])) {
                // Product exists in cart, so just update the quantity
                $_SESSION['cart'][$product_id] += $quantity;
            } else {
                // Product is not in cart, so add it
                $_SESSION['cart'][$product_id] = $quantity;
            }
        } else {
            // There are no products in the cart, so add the first product to cart
            $_SESSION['cart'] = array($product_id => $quantity);
        }
    }

    // Close the statement
    mysqli_stmt_close($stmt);

    // Close the connection
    mysqli_close($conn);

    // Prevent form resubmission
    header('location: index.php?page=cart');
    exit;
}

// Remove product from cart, check for the URL param "remove", which represents the product id
if (isset($_GET['remove']) && is_numeric($_GET['remove']) && isset($_SESSION['cart']) && isset($_SESSION['cart'][$_GET['remove']])) {
    // Remove the product from the shopping cart
    unset($_SESSION['cart'][$_GET['remove']]);
}

// Remove selected products from cart if the user clicks the "Remove Selected" button on the shopping cart page
if (isset($_POST['remove_selected']) && isset($_SESSION['cart']) && isset($_POST['selected_products'])) {
    $selected_product_ids = $_POST['selected_products'];

    foreach ($selected_product_ids as $selected_product_id) {
        if (isset($_SESSION['cart'][$selected_product_id])) {
            unset($_SESSION['cart'][$selected_product_id]);
        }
    }

    // Prevent form resubmission
    header('location: index.php?page=cart');
    exit;
}

// Update product quantities in cart if the user clicks the "Update" button on the shopping cart page
if (isset($_POST['update']) && isset($_SESSION['cart'])) {
    // Loop through the post data to update the quantities for every product in the cart
    foreach ($_POST as $k => $v) {
        if (strpos($k, 'quantity') !== false && is_numeric($v)) {
            $id = str_replace('quantity-', '', $k);
            $quantity = (int)$v;
            // Always perform checks and validation
            if (is_numeric($id) && isset($_SESSION['cart'][$id]) && $quantity > 0) {
                // Update the new quantity
                $_SESSION['cart'][$id] = $quantity;
            }
        }
    }
    // Prevent form resubmission
    header('location: index.php?page=cart');
    exit;
}

// Send the user to the place order page if they click the Place Order button and the cart is not empty
if (isset($_POST['placeorder']) && isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
    header('Location: index.php?page=placeorder');
    exit;
}

// Check the session variable for products in cart
$products_in_cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : array();
$products = array();
$subtotal = 0.00;

// If there are products in the cart
if ($products_in_cart) {
    // There are products in the cart, so we need to select those products from the database

    // Create a mysqli connection
    $conn = mysqli_connect('localhost', 'root', '', 'shoppingcart');

    // Check connection
    if (!$conn) {
        exit('Failed to connect to database!');
    }

    // Products in cart array to question mark string array, we need the SQL statement to include IN (?,?,?,...etc)
    $placeholders = implode(',', array_fill(0, count($products_in_cart), '?'));
    $query = "SELECT * FROM products WHERE id IN ($placeholders)";

    // Prepare the SQL statement
    $stmt = mysqli_prepare($conn, $query);

    // Bind the product ids as parameters
    $types = str_repeat('i', count($products_in_cart));
    mysqli_stmt_bind_param($stmt, $types, ...array_keys($products_in_cart));

    // Execute the statement
    mysqli_stmt_execute($stmt);

    // Get the result set
    $result = mysqli_stmt_get_result($stmt);

    // Fetch the products from the database and return the result as an array
    $products = mysqli_fetch_all($result, MYSQLI_ASSOC);

    // Calculate the subtotal
    foreach ($products as $product) {
        $subtotal += (float)$product['price'] * (int)$products_in_cart[$product['id']];
    }

    // Close the statement
    mysqli_stmt_close($stmt);

    // Close the connection
    mysqli_close($conn);
}
?>

<?=template_header('Cart')?>

<div class="cart content-wrapper">
    <h1>Shopping Cart</h1>
    <form action="index.php?page=cart" method="post">
        <table>
            <thead>
                <tr>
                    <td></td>
                    <td>Product</td>
                    <td>Price</td>
                    <td>Quantity</td>
                    <td>Total</td>
                </tr>
            </thead>
            <tbody>
                <?php if (empty($products)): ?>
                <tr>
                    <td colspan="5" style="text-align:center;">You have no products added to your Shopping Cart</td>
                </tr>
                <?php else: ?>
                <?php foreach ($products as $product): ?>
                <tr>
                    <td class="checkbox">
                        <input type="checkbox" name="selected_products[]" value="<?=$product['id']?>">
                    </td>
                    <td class="img">
                        <a href="index.php?page=product&id=<?=$product['id']?>">
                            <img src="imgs/<?=$product['img']?>" width="50" height="50" alt="<?=$product['name']?>">
                        </a>
                    </td>
                    
                    <td class="price">&#8369;<?=$product['price']?></td>
                    <td class="quantity">
                        <input type="number" name="quantity-<?=$product['id']?>" value="<?=$products_in_cart[$product['id']]?>" min="1" max="<?=$product['quantity']?>" placeholder="Quantity" required>
                    </td>
                    <td class="price">&#8369;<?=$product['price'] * $products_in_cart[$product['id']]?></td>
                </tr>
                <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
        <div class="subtotal">
            <span class="text">Subtotal</span>
            <span class="price">&#8369;<?=$subtotal?></span>
        </div>
        <div class="buttons">
            <input type="submit" value="Remove" name="remove_selected">
            <input type="submit" value="Update" name="update">
            <input type="submit" value="Place Order" name="placeorder">
        </div>
        <style>
    
    .checkbox input[type="checkbox"] {
    appearance: none;
    -webkit-appearance: none;
    -moz-appearance: none;
    width: 18px;
    height: 18px;
    border: 2px solid #ccc;
    border-radius: 4px;
    outline: none;
    cursor: pointer;
    position: relative;
}

.checkbox input[type="checkbox"]:checked {
    background-color: #007bff;
    border-color: #007bff;
}

.checkbox input[type="checkbox"]:checked::after {
    content: '';
    position: absolute;
    top: 50%;
    left: 50%;
    width: 5px;
    height: 10px;
    border: solid white;
    border-width: 0 3px 3px 0;
    transform: translate(-50%, -50%) rotate(45deg);
}

</style>

    </form>
</div>

<?=template_footer()?>
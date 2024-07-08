<?php
session_start();
$cart_message = '';

if (isset($_SESSION['cart_message'])) {
    $cart_message = $_SESSION['cart_message'];
    unset($_SESSION['cart_message']);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart Update</title>
</head>

<body>
    <h1><?php echo $cart_message; ?></h1>
    <a href="cart.php">Go to Cart</a>
    <a href="index.php">Continue Shopping</a>
</body>

</html>

<?php
session_start();

if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

if (isset($_POST['item_id'])) {
    $_SESSION['cart'][] = $_POST['item_id'];
    $_SESSION['cart_message'] = '1 new item(s) have been added to your cart';
}

header('Location: cart_update.php');
exit();
?>

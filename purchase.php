<?php
require_once "pdo.php";   //it includes information required to connect to database
session_start();
if (isset($_SESSION['cart'])) {  //checks if items are present in cart
    $count = count($_SESSION['cart']); //returns the no.of items in cart
    $_SESSION['count'] = $count;
    $stmt = $pdo->prepare('INSERT INTO purchase
          (username,total_items,total_amount) VALUES ( :name,:items,:amt)');  //inserting data into database
    $stmt->execute(array(
        ':name' => $_SESSION['name'],
        ':items' => $_SESSION['count'],
        ':amt' => $_SESSION['total']
    ));
    unset($_SESSION['cart']);  //clears the cart once data is stored in database
    //pop-up message
    echo " <script>
    alert('Thank you for shopping with us');
    window.location.href='index.php';
    </script>";
} else {
    //pop-up message
    echo " <script>
    alert('Your cart is empty');
    window.location.href='cart.php';
    </script>";
}

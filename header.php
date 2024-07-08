<?php
require_once "pdo.php";
session_start();
if (isset($_SESSION['name'])) {
    $profile = $_SESSION['name'];
} else {
    $profile = 'Profile';
}

$cart_count = isset($_SESSION['cart']) ? count($_SESSION['cart']) : 0;

if (isset($_POST['submit'])) {
    if ($_POST['searched_item'] != '') {
        $_SESSION['searched_item'] = $_POST['searched_item'];
        header('location:searched_item.php');
        return;
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <link rel="icon" type="image/jpg" href="images/logo3.png" />
    <script src="https://kit.fontawesome.com/66036fc421.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="header.css">
</head>

<body>
<header>
    <a href="index.php">
        <img src="images/logo3.png" alt="logo">
    </a>
    <nav>
        <ul>
            <li><a href="men.php">Men</a></li>
            <li><a href="women.php">Women</a></li>
            <li><a href="kids.php">Kids</a></li>
            <li><a href="index.php">Home</a></li>
        </ul>
        <div class="one">
            <form method="POST">
                <input type="text" name="searched_item" placeholder="Search for products, brands, and more..." size="40" />
                <button type="submit" name="submit">Search</button>
                <ul>
                    <li><a href="cart.php" class="top-right"><i class="fas fa-shopping-cart"></i>&nbsp;<span>Cart (<?php echo $cart_count; ?>)</span></a></li>
                    <li><a href="profile.php" class="top-right"><i class="fas fa-user-circle"></i>&nbsp;<span><?php echo htmlspecialchars($profile, ENT_QUOTES, 'UTF-8'); ?></span></a></li>
                </ul>
            </form>
        </div>
    </nav>
</header>

</body>
</html>

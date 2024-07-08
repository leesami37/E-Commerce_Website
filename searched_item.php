<?php require_once "header.php";    //all the contents of header.php file are added here
if (isset($_POST['Add_to_Cart'])) {  //checking if add to cart button is clicked or not
    if (isset($_SESSION['cart'])) {  //checks if anything is in cart
        $cartitems = array_column($_SESSION['cart'], 'item_name');  //this function returns the name of items that are in cart
        if (in_array($_POST['item_name'], $cartitems)) {  //this function checks whether the item is there in cart or not
            echo "<script>
            alert('Item Already Added');
            window.location.href='searched_item.php';
            </script>";
        } else {
            $count = count($_SESSION['cart']);  //returns the no.of items in cart
            $_SESSION['cart'][$count] = array('item_name' => $_POST['item_name'], 'cost' => $_POST['cost'], 'Quantity' => 1);
            //pop-up message
            echo "<script>
            alert('Item Added');
            window.location.href='searched_item.php';
        </script>";
        }
    } else {
        $_SESSION['cart'][0] = array('item_name' => $_POST['item_name'], 'cost' => $_POST['cost'], 'Quantity' => 1);
        echo "<script>
            alert('Item Added');
            window.location.href='searched_item.php';
            </script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Search Results</title>
    <link rel="stylesheet" href="categories.css">
</head>

<body>
    <div class="page-content">
        <?php
        $str = $_SESSION['searched_item'];
        $stmt = $pdo->query("SELECT * FROM stock where item = '$str' or product_name like '%$str%'"); //like checks whether the searched
        //word is in the columns item or product_name of the database
        $count = 0;
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $count++;
            echo '<div class="shirts">';
            echo '<div class="card">';
            echo '<img src= "' . $row['image'] . '" alt="...">';
            echo '<p class="highlight">' . $row['product_name'] . '</p>';
            echo '<p>' . $row['description'] . '</p>';
            echo '<p>' . $row['cost'] . "/-" . '</p>';
            echo '<form method="POST">';
            echo '<button type=submit name="Add_to_Cart">Add to Cart</button>';
            echo '<input type="hidden" name="item_name" value="' . $row['product_name'] . '">';
            echo '<input type="hidden" name="cost" value="' . $row['cost'] . '">';
            echo '</form>';
            echo '</div>';
            echo '</div>';
        }
        if ($count == 0) {
            echo "<h2>No items found</h2>";
        }
        ?>
    </div>
</body>
<footer>
    <h2>Thank you for choosing us.Hope you have a wonderful shopping session!</h2>
</footer>


</html>
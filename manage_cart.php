<?php require_once "header.php";    //all the contents of header.php file are added here
if (isset($_POST['Add_to_Cart'])) {  //checking if add to cart button is clicked or not
    if (isset($_SESSION['cart'])) {   //checks if anything is in cart
        $cartitems = array_column($_SESSION['cart'], 'item_name');  //this function returns the name of items that are in cart
        if (in_array($_POST['item_name'], $cartitems)) {  //this function checks whether the item is there in cart or not
            echo "<script>
            alert('Item Already Added');
            window.location.href='kids.php';
            </script>";
        } else {
            $count = count($_SESSION['cart']); //returns the no.of items in cart
            $_SESSION['cart'][$count] = array('item_name' => $_POST['item_name'], 'cost' => $_POST['cost'], 'Quantity' => 1);
            //pop-up message
            echo "<script>
            alert('Item Added');
            window.location.href='kids.php';
        </script>";
        }
    } else {
        $_SESSION['cart'][0] = array('item_name' => $_POST['item_name'], 'cost' => $_POST['cost'], 'Quantity' => 1);
        echo "<script>
            alert('Item Added');
            window.location.href='kids.php';
            </script>";
    }
}
if (isset($_POST['remove_item'])) {
    foreach ($_SESSION['cart'] as $key =>  $value) {
        if ($value['item_name'] == $_POST['item_name']) {
            unset($_SESSION['cart'][$key]);                     //removes the item from cart
            $_SESSION['cart'] = array_values($_SESSION['cart']);
            echo "
            <script>
            alert('Item Removed')
            window.location.href='cart.php'
            </script>";
        }
    }
}

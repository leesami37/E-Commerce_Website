<?php
session_start();
if (isset($_POST['purchase'])) {
    header('location:purchase.php');
    return;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <title>My Cart</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center border round bg-light my-5">
                <h1>MY CART</h1>
            </div>
            <div class="col-lg-9">
                <table class="table">
                    <thead class="text-center">
                        <tr>
                            <!-- to create a table -->
                            <th scope="col">Serial No.</th>
                            <th scope="col">Item Name</th>
                            <th scope="col">Cost</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        <?php
                        $total = 0;
                        if (isset($_SESSION['cart'])) {
                            foreach ($_SESSION['cart'] as $key => $value) {
                                $serial = $key + 1;
                                $total = $total + $value['cost'];            //to find the total cost of shopping
                                $_SESSION['total'] = $total;
                                echo "
                            <tr>
                                <td>$serial</td>
                                <td>$value[item_name]</td>
                                <td>$value[cost]</td>
                                <td>
                                <form action='manage_cart.php' method='POST'>
                                <button name='remove_item' class='btn btn-sm btn-outline-danger'>REMOVE</button>
                                <input type='hidden' name='item_name' value='$value[item_name]'> 
                                </form></td>
                            </tr>";
                            }
                        }
                        ?>
                    </tbody>
                </table>
            </div>
            <div class="col-lg-2">
                <div class="border bg-light rounded p-4">
                    <h4>Total:</h4>
                    <h5 class="text-end"><?php echo $total ?></h5><br>
                    <form method="POST">
                        <button name="purchase" class="btn btn-primary btn-block">Make Purchase</button><br><br>
                        <a class="btn btn-primary btn-block" href="index.php">Home</a>
                    </form>
                </div>
            </div>

        </div>

    </div>
</body>

</html>
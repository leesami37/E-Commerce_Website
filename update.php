<?php require_once "header.php";     //all the contents of header.php file are added here
if (isset($_POST['update_item'])) {   //if update item button is pressed go to update_item.php
    header('location:update_item.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="categories.css">
    <title>Update</title>
    <style>
        .card a {
            color: #000;
            padding: 7px 13px;
            border-radius: 3px;
            background: #1fff03;
            margin-left: 50px;
        }
    </style>
</head>

<body>
    <div class="page-content">
        <?php
        $stmt = $pdo->query("SELECT * FROM stock");
        $count = 0;
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $count++;
            echo '<div class="shirts">';
            echo '<div class="card">';
            echo '<img src= "' . $row['image'] . '" alt="...">';
            echo '<p class="highlight">' . $row['product_name'] . '</p>';
            echo '<p>' . $row['description'] . '</p>';
            echo '<p>' . $row['cost'] . "/-" . '</p>';
            echo '<br>';
            echo '<form method="POST">';
            echo '<a href="update_item.php?item_id=' . $row['item_id'] . '">Update Item</a> ';
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
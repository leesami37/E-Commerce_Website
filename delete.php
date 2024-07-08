<?php require_once "header.php";  //all the contents of header.php file are added here
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="categories.css">
    <title>Delete</title>
    <style>
        .card a {
            color: #000;
            padding: 7px 13px;
            border-radius: 3px;
            background: #f2695e;
            margin-left: 50px;
        }
    </style>
</head>

<body>
    <div class="page-content">
        <?php
        $stmt = $pdo->query("SELECT * FROM stock");  //* means everything
        $count = 0;
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $count++;
            echo '<div class="shirts">';
            echo '<div class="card">';
            echo '<img src= "' . $row['image'] . '" alt="...">';     //$row is the value of the named variable that is fetched 
            echo '<p class="highlight">' . $row['product_name'] . '</p>';
            echo '<p>' . $row['description'] . '</p>';
            echo '<p>' . $row['cost'] . "/-" . '</p>';
            echo '<br>';
            echo '<form method="POST">';
            echo '<a href="delete_item.php?item_id=' . $row['item_id'] . '">Delete Item</a> '; //? is used to concatenate details to url
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
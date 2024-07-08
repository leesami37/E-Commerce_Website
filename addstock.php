<?php
require_once "pdo.php";  //it includes information required to connect to database
session_start();
if (isset($_POST['submit'])) {    //to check if submit button is clicked or not
    $img_loc = $_FILES['image']['tmp_name'];
    $img_name = $_FILES['image']['name'];
    $img_ext = pathinfo($img_name, PATHINFO_EXTENSION);    //to fetch image extension
    if (($img_ext != 'jpg') && ($img_ext != 'jpeg') && ($img_ext != 'png') && ($img_ext != 'webp') && ($img_ext != 'jfif')) {
        echo "<script>alert('Invalid Image Extension')</script>";
        exit();
    }
    $img_size = $_FILES['image']['size'] / (1024 * 1024);    //to convert image size from bytes to MB
    if ($img_size > 5) {
        echo "<script>alert('Image size greater than 5MB')</script>";
        exit();
    }
    $_SESSION['item'] = $_POST['item'];
    $img_des = "Uploaded_Images/" . $_POST['product_name'] . "." . $img_ext;   //images uploaded to be stoed in that folder
    $stmt = $pdo->prepare('INSERT INTO stock      
          (category,item,product_name,description,cost,image) VALUES ( :category,:item,:name,:description,:cost,:image)'); //connecting to database
    $stmt->execute(array(                                //data from form pused into database
        ':category' => $_POST['category'],
        ':item' => $_POST['item'],
        ':name' => $_POST['product_name'],
        ':description' => $_POST['description'],
        ':cost' => $_POST['cost'],
        ':image' => $img_des
    ));
    $_SESSION['category'] = $_POST['category'];                 //converted to global variable
    $_SESSION['product_name'] = $_POST['product_name'];
    $_SESSION['description'] = $_POST['description'];
    $_SESSION['cost'] = $_POST['cost'];
    move_uploaded_file($img_loc, $img_des);
    echo " <script>
    alert('Item Added');
    window.location.href='adminlogged.php';
    </script>";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="addstock.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <title>Update Stock</title>
</head>

<body>
    <div class="middle">
        <form method="POST" enctype="multipart/form-data">
            <div class="mb-3">
                <label class="form-label">Category</label>
                <input type="text" class="form-control" name="category" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Item</label>
                <input type="text" class="form-control" name="item" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Name of the product</label>
                <input type="text" class="form-control" name="product_name" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Description</label>
                <input type="textarea" class="form-control" name="description">
            </div>
            <div class="mb-3">
                <label class="form-label">Cost</label>
                <input type="text" class="form-control" name="cost" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Image</label>
                <input type="file" class="form-control" name="image" required>
            </div>
            <button type="submit" class="btn btn-primary" name="submit">Submit</button>
            <a class="btn btn-primary" href="adminlogged.php" role="button">Back</a>
        </form>
    </div>

</body>

</html>
<?php require_once("pdo.php");  //it includes information required to connect to database
session_start();
$stmt = $pdo->prepare("SELECT * FROM stock where item_id = :xyz");
$stmt->execute(array(":xyz" => $_GET['item_id']));  //fetches id from the url
$row = $stmt->fetch(PDO::FETCH_ASSOC);

$category = htmlentities($row['category']);  //htmlentities is used to avoid sql injection
$item = htmlentities($row['item']);
$pname = htmlentities($row['product_name']);
$desc = htmlentities($row['description']);
$cost = htmlentities($row['cost']);
$image = htmlentities($row['image']);
$item_id = $row['item_id'];

if (isset($_POST['update'])) {
    if (strlen($_POST['category']) < 1 && strlen($_POST['item']) < 1 && strlen($_POST['product_name']) < 1 && strlen($_POST['cost']) < 1) {
        $_SESSION['error'] = 'Missing data';
        header("Location: update_item.php?user_id=" . $_POST['item_id']);
        return;
    }

    if (!is_numeric($_POST['cost'])) {    //checks whether cost is a number or not 
        $_SESSION['error'] = 'Cost Must be Numeric';
        header("Location: update_item.php?user_id=" . $_POST['item_id']);
        return;
    }
    if ($_FILES['image']['tmp_name'] != '') {
        $img_loc = $_FILES['image']['tmp_name'];
        $img_name = $_FILES['image']['name'];
        $img_ext = pathinfo($img_name, PATHINFO_EXTENSION);
        if (($img_ext != 'jpg') && ($img_ext != 'jpeg') && ($img_ext != 'png') && ($img_ext != 'webp') && ($img_ext != 'jfif')) {
            echo "<script>alert('Invalid Image Extension'); window.location.href='update_item.php'</script>";
        }
        $img_size = $_FILES['image']['size'] / (1024 * 1024);
        if ($img_size > 5) {
            echo "<script>alert('Image size greater than 5MB'); window.location.href='update_item.php'</script>";
        }
        $_SESSION['item'] = $_POST['item'];
        $img_des = "Uploaded_Images/" . $_POST['product_name'] . "." . $img_ext;
        move_uploaded_file($img_loc, $img_des);
    } else {
        $img_des = $image;    //if image is not updated image used while uploading will be used
    }
    $sql = "UPDATE stock SET category = :category,item = :item, product_name = :name,description = :description, 
    cost = :cost, image = :image WHERE item_id = :item_id";  //query used to update
    $stmt = $pdo->prepare($sql);
    $stmt->execute(array(
        ':category' => $_POST['category'],
        ':item' => $_POST['item'],
        ':name' => $_POST['product_name'],
        ':description' => $_POST['description'],
        ':cost' => $_POST['cost'],
        ':item_id' => $_POST['item_id'],
        ':image' => $img_des
    ));
    echo " <script>
    alert('Item Updated');
    window.location.href='update.php'; 
    </script>";
}


// Guardian: Make sure that user_id is present
if (!isset($_GET['item_id'])) {
    echo " <script>
    alert('Missing Item ID');
    window.location.href='update.php';
    </script>";
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="addstock.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <title>Update Details</title>
</head>

<body>
    <?php if (isset($_SESSION['error'])) {       //to display any error to user
        echo ('<p style = "color:red">' . $_SESSION['error'] . "</p>\n");
        unset($_SESSION['error']);
    }  ?>
    <div class="middle">
        <form method="POST" enctype="multipart/form-data">
            <div class="mb-3">
                <label class="form-label">Category</label>
                <input type="text" class="form-control" name="category" value="<?= $category ?>" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Item</label>
                <input type="text" class="form-control" name="item" value="<?= $item ?>" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Name of the product</label>
                <input type="text" class="form-control" name="product_name" value="<?= $pname ?>" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Description</label>
                <input type="textarea" class="form-control" name="description" value="<?= $desc ?>">
            </div>
            <div class="mb-3">
                <label class="form-label">Cost</label>
                <input type="text" class="form-control" name="cost" value="<?= $cost ?>" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Image</label>
                <input type="file" class="form-control" name="image">
            </div>
            <input type="hidden" name="item_id" value="<?= $item_id ?>">
            <button type="submit" class="btn btn-primary" name="update">Update</button>
            <a class="btn btn-primary" href="update.php" role="button">Back</a>
        </form>
    </div>
</body>

</html>
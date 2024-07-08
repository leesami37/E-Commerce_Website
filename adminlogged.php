<?php
session_start();
if (isset($_POST['logout'])) {      //checking is logout button is pressed
    header('location:logout.php');   //if pressed go to this location
    return;
}
if (isset($_POST['home'])) {
    header('location:index.php');
    return;
}
if (isset($_POST['add_item'])) {
    header('location:addstock.php');
    return;
}
if (isset($_POST['update_item'])) {
    header('location:update.php');
    return;
}
if (isset($_POST['delete_item'])) {
    header('location:delete.php');
    return;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>My Profile</title>
    <link rel="stylesheet" type="text/css" href="logged.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/fontawesome.min.css">
    <script src="https://kit.fontawesome.com/66036fc421.js" crossorigin="anonymous"></script>
    <!--above script is used to fetch icons-->
</head>

<body>
    <div class="white">
        <div class="left">
            <img src="images/loginlogo.png" alt="loginlogo">
        </div>
        <div class="right">
            <h2>Welcome <?= $_SESSION["name"] ?></h2>
            <form method="post">
                <button type="submit" name="add_item">Add Item</button></br></br>
                <button type="submit" name="update_item">Update Item</button></br></br>
                <button type="submit" name="delete_item">Delete Item</button></br></br>
                <button type="submit" name="logout">Logout</button></br></br>
                <button type="submit" name="home">Home</button>

            </form>
        </div>
    </div>

</body>

</html>
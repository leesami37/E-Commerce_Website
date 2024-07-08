<?php
require_once "pdo.php";   //it includes information required to connect to database
session_start();
if (isset($_SESSION['mailid']) || isset($_SESSION['name'])) {   //checking whether the firlds are empty or not
  header('location:logged.php');                  //if empty go to that location
  return;
} else {
  $salt = 'CaRRom_@42';                 //random string used for hashing
  if (isset($_POST['name']) && isset($_POST['pass'])) {
    $sql = 'SELECT * FROM Admin_login WHERE Admin_Name ="' . $_POST['name'] . '"';
    $stmt = $pdo->query($sql);      //running a query
    if ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {      //fetching data from database
      if ($_POST['pass'] == $row['Admin_Password']) {   //checking if entered data and data stored in database match to give access
        $_SESSION["name"] = $row["Admin_Name"];
        header('location:adminlogged.php');
        return;
      } else {
        $_SESSION["error"] = "Incorrect Password";
      }
    } else {
      $_SESSION["error"] = "Account doesn't exist";
    }
  }
}



?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>My Profile</title>
  <link rel="stylesheet" type="text/css" href="profile.css">
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
      <h2>Admin Login</h2>
      <?php
      if (isset($_SESSION["error"])) {
        echo ('<p style="color:red">' . $_SESSION["error"] . "</p>\n");
        unset($_SESSION["error"]);
      }
      ?>
      <form method="post">
        <input type="text" name="name" required class="placeicon" placeholder="&#xf007; Name"><br />
        <input type="password" name="pass" required class="placeicon" placeholder="&#xf023; Password"><br />
        <button type="submit">Login</button></br></br>
      </form>
    </div>
  </div>

</body>

</html>
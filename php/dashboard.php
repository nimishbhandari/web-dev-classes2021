<?php

session_start();
require_once "./config.php";
$name=0;
$email=$_SESSION["email"];
if (!isset($_SESSION["email"]) & empty($_SESSION["email"])) {
  header("location: login.php");
}

$sql = "SELECT * FROM users WHERE `email` = '$email'";
$result1 = mysqli_query($connection, $sql);
while ($r1 = mysqli_fetch_assoc($result1)) {
 $name= $r1["name"];

}

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../css/main.css" />
    <title>Web-Dev-Class</title>
  </head>
  <body>
    <header class="showcase">
      <div class="showcase-top">
        <img src="https://i.ibb.co/r5krrdz/logo.png" alt="" />
        <a href="./logout.php" class="btn btn-rounded">Logout</a>
      </div>
      <div class="showcase-content">
        <h1>Welcome <?php echo $name;?></h1>
        <p>To the Robotics club MMMUT Family!</p>
        
      </div>
    </header> 
  </body>
</html>

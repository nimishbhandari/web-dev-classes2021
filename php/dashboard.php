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
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
</head>
<body>

<div style="
  display: flex;
  justify-content: center;
  align-items: center;
  min-height: 70vh;
  font-size:50px;
  "
  >Welcome <?php echo $name; ?>  </div>
  <br> <center><a href="./logout.php">Logout</a></center> 
    
</body>
</html>
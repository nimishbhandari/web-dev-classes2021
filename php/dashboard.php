<?php

session_start();
require_once "./config.php";
$name=0;
$email=$_SESSION["email"];
if (!isset($_SESSION["email"]) & empty($_SESSION["email"])) {
  header("location: login");
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

<div>Welcome <?php echo $name; ?></div>
    
</body>
</html>
<?php
session_start();
require_once "./config.php";

if (isset($_POST) & !empty($_POST)) {
    
  $email = mysqli_real_escape_string($connection, $_POST["email"]);
  $password = md5($_POST["password"]);
  $sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
  ($result = mysqli_query($connection, $sql)) or die(mysqli_error($connection));
  $count = mysqli_num_rows($result);
  if ($count == 1) {
    //echo "User exits, create session";
    $_SESSION["email"] = $email;
    header("location: dashboard.php");
  } else {
    echo "<center>Invalid Login Credentials</center>";
  }
  
  
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
  <style>
    * {
      box-sizing: border-box;
    }

    input[type=text], input[type=email],input[type=password], select, textarea {
      width: 100%;
      padding: 12px;
      border: 1px solid #ccc;
      border-radius: 4px;
      resize: vertical;
    }

    label {
      padding: 12px 12px 12px 0;
      display: inline-block;
    }

    input[type=submit] {
      background-color: #04AA6D;
      color: white;
      padding: 12px 20px;
      border: none;
      border-radius: 4px;
      cursor: pointer;
      float: right;
    }

    input[type=submit]:hover {
      background-color: #45a049;
    }

    .container {
      border-radius: 5px;
      background-color: rgba(0,0,0, 0.8);
      padding: 20px;
      min-width:50vw;
    }

    .col-25 {
      float: left;
      width: 25%;
      margin-top: 6px;
    }

    .col-75 {
      float: left;
      width: 75%;
      margin-top: 6px;
    }

    /* Clear floats after the columns */
    .row:after {
      content: "";
      display: table;
      clear: both;
    }

    /* Responsive layout - when the screen is less than 600px wide, make the two columns stack on top of each other instead of next to each other */
    @media screen and (max-width: 600px) {
      .col-25, .col-75, input[type=submit] {
        width: 100%;
        margin-top: 0;
      }
      .container{
        min-width: 80vw;
        
      }
    }
</style>
  <body>
    <header class="showcase">
      <div class="showcase-top">
        <img src="https://i.ibb.co/r5krrdz/logo.png" alt="" />
        <a href="./logout.php" class="btn btn-rounded">Logout</a>
      </div>
      <div class="showcase-content">
        <div class="container">
        <center style="">
            <h2>Log In</h2>
        </center>
          <form method="POST">
           
            <div class="row">
              <div class="col-25">
                <label for="name">Email</label>
              </div>
              <div class="col-75">
                <input type="email" id="fname" name="email" placeholder="Email..." required>
              </div>
            </div>
            <div class="row">
              <div class="col-25">
                <label for="name">Password</label>
              </div>
              <div class="col-75">
                <input type="password" id="fname" name="password" placeholder="Password....." required>
              </div>
            </div>

            <br>
            <center>
            <a href="./register.php">Register</a>
            </center>
            
            
            <div class="row" style="margin-top:25px">
              <input type="submit" value="Submit">
            </div>
          </form>
        </div>
      </div>
    </header> 
  </body>
</html>



<!DOCTYPE html>
<html lang="en">
<head>
  <link rel="stylesheet" href="game.css">
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Pick Key</title>
</head>
<body>
  <div id="container">
    <div id="container-game">
      <h1>Nivel <span id="level"></span></h1>
      
      <br>
      <p id="word"></p>
      <p id ="input"></p>
      <div id="buttons-container"></div>
      <p style="font-size: 30px;">Cronômetro: <span id="cron"></span></p>
    </div>
  </div>
  <script src="game.js"></script>
<?php
//require "login/db_functions.php";
//$resultTime = $_POST['resultTime'];
//$conn = new mysqli($host, $user, $password, $database);
//
////$sql = "INSERT INTO users
////              (tempo) VALUES
////          ($_GET['resultTime']) WHERE id = $_GET['id'];";
//
//  if(mysqli_query($conn, $sql)){
//    $success = true;
//  }
//  else {
//    $error_msg = mysqli_error($conn);
//    $error = true;
//  }
?>
</body>
</html>
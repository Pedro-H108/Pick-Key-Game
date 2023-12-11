<?php
  require "authenticate.php";
?>

<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="index.css">
  <meta charset="utf-8">
  <title>Pick Key</title>
</head>
<body>
  <div id="container">
    <div id="containerUser">
    <h1>Pic Key</h1>
     <h1>Bem-vindo
        <?php
          if ($login) {
            echo ", $user_name!";
          }
          else {
            echo "!";
          }
        ?>
      </h1>
      <div id="select">

        <p>Escolha uma das opções:</p>
        <ul>
          <?php if ($login): ?>
            <li><a href="logout.php">Logout</a></li>
            <li><a href="../game/game.php">Jogar</a></li>
            <?php else: ?>
            <li><a href="login.php">Login</a></li>
            <li><a href="register.php">Registrar-se</a></li>
          <?php endif; ?>
        </ul>
      </div>
    </div>
  </div>
</body>
</html>

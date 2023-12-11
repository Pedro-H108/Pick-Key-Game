<?php
require "db_functions.php";
require "authenticate.php";
$conn = new mysqli($host, $user, $password, $database);

$error = false;
$password = $email = "";


// Verifique se o usuário está logado
if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];

    // Agora você pode usar $user_id conforme necessário
} else {
    if (!$login && $_SERVER["REQUEST_METHOD"] == "POST") {
  if (isset($_POST["email"]) && isset($_POST["password"])) {


    $email = mysqli_real_escape_string($conn,$_POST["email"]);
    $password = mysqli_real_escape_string($conn,$_POST["password"]);
    $password = md5($password);

    $sql = "SELECT id,name,email,password FROM users
            WHERE email = '$email';";

    $result = mysqli_query($conn, $sql);
    if($result){
      if (mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);

        if ($user["password"] == $password) {

          $_SESSION["user_id"] = $user["id"];
          $_SESSION["user_name"] = $user["name"];
          $_SESSION["user_email"] = $user["email"];

          header("Location: " . dirname($_SERVER['SCRIPT_NAME']) . "/index.php");
          exit();
        }
        else {
          $error_msg = "Senha incorreta!";
          $error = true;
        }
      }
      else{
        $error_msg = "Usuário não encontrado!";
        $error = true;
      }
    }
    else {
      $error_msg = mysqli_error($conn);
      $error = true;
    }
  }
  else {
    $error_msg = "Por favor, preencha todos os dados.";
    $error = true;
  }
}
}




?>
<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="login.css">
  <meta charset="utf-8">
  <title>Pick Key Login</title>
</head>
<body>
<div id="container">
  <div id="containerUser">
  <h1>Login</h1>

    <?php if ($login): ?>
      <h3>Você já está logado!</h3>
      </body>
    </html>
    <?php exit(); ?>
    <?php endif; ?>

    <?php if ($error): ?>
      <h3 style="color:red;"><?php echo $error_msg; ?></h3>
    <?php endif; ?>

    <form action="login.php" method="post">
      <label for="email">Email: </label>
      <input type="text" name="email" value="<?php echo $email; ?>" required><br>

      <label for="password">Senha: </label>
      <input type="password" name="password" value="" required><br>

      <input type="submit" name="submit" value="Entrar" id="btn"> 
    </form>

    <ul>
      <li><a href="index.php">Voltar</a></li>
    </ul>
  </p>
  </div>
</div>
</body>
</html>

<?php
session_start();

require_once("./banco.php");

$erroToken = false;

$token     = '';

if (array_key_exists("token", $_POST)) 
{
  $token = $_POST["token"];

  $queryToken = mysqli_query($mysqli,
    "SELECT id FROM token WHERE token='$token' AND usada IS NULL"
  );

  if ($queryToken && ($result = mysqli_fetch_assoc($queryToken))) {
    $id = $result['id'];

    $_SESSION['id_token'] = $id;

    header('location: register.php');
  } else {
    $erroToken = true;
  }
}
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <title>Cadastrar - Token - ADS Carteiras</title>

    
    <link href="assets/dist/css/bootstrap.min.css" rel="stylesheet">    
    <!-- Custom styles for this template -->
    <link href="signin.css" rel="stylesheet">
  </head>
  <body class="text-center bg-light bodycss">
    
<main class="form-signin w-100 m-auto">
  <form action="register-token.php" method="post">
    <img class="mb-4" src="assets/ifrs.png" alt="" width="75" height="80">
    <div class="form-container">
      <h1 class="h3 mb-3 fw-normal">Insira seu token</h1>
      <?php if ($erroToken) { ?>
        <div class="p-3 text-white bg-danger bg-gradient rounded-3 mb-2">
          <span>Token inválido!</span>
        </div>
      <?php } ?>
      <div class="form-floating">        
        <input type="text" class="form-control" id="token" placeholder="token" name="token" >
        <label for="token">Token</label>
      </div>
    </div>

    <button class="w-100 btn btn-lg btn-success" type="submit">Cadastrar conta</button>
    <p class="mt-5 mb-3 text-muted">&copy; 2022</p>
  </form>
</main>


    
  </body>
</html>

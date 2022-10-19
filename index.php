<?php
  session_start();

  if (array_key_exists("id", $_SESSION) && $_SESSION['id'] != '') {
    header('location: home.php');
  }

  require_once("./banco.php");

  $erroNaoEncontrado = false;
  $email             = '';
  $password          = '';

  if ((array_key_exists("email", $_POST)) && (array_key_exists("password", $_POST))) {
    $email    = $_POST["email"];
    $password = $_POST["password"];
  }

  if ($email != '' && $password != '') {
    $query = mysqli_query($mysqli, 
      "SELECT id, tipo 
       FROM usuario
       WHERE email='$email' AND senha='$senha'"
    );
    
    if ($query && ($result = mysqli_fetch_assoc($query))) {
      $tipo = $result['tipo'];

      $_SESSION['id'] = $result['id'];
      $_SESSION['tipo_usuario'] = $tipo;
      
      // se for analista envia pra list-clientes
      if ($tipo = 2) {
        header('location: list-clientes.php');

      // se for cliente envia pra home
      } else {
        header('location: home.php');
      }
    } else {
      $erroNaoEncontrado = true;
    }
  }
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <title>Entrar - ADS - Carteiras</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.2/examples/sign-in/">
    <link href="assets/dist/css/bootstrap.min.css" rel="stylesheet">    
    <!-- Custom styles for this template -->
    <link href="signin.css" rel="stylesheet">
  </head>
  <body class="text-center bg-light bodycss">
    
<main class="form-signin w-100 m-auto">
  <form action="index.php" method="post">
    <img class="mb-4" src="assets/ifrs.png" alt="" width="75" height="80">
    <?php if ($erroNaoEncontrado) { ?>
      <div class="p-3 text-white bg-danger bg-gradient rounded-3 mb-2">
        <span>Credenciais incorretas!</span>
      </div>
    <?php } ?>

    <div class="form-container">
      <div class="form-floating">
        <input type="email" class="form-control" id="email" placeholder="name@example.com" name="email">
        <label for="email">Endereço de e-mail</label>
      </div>
      <div class="form-floating">
        <input type="password" class="form-control" id="senha" placeholder="Password" name="password">
        <label for="senha">Senha</label>
      </div>
    </div>

    <button class="w-100 btn btn-lg btn-success" type="submit">Entrar</button>
    <a class="w-100 btn btn-lg btn-link" href="register-token.php">Cadastrar-se</a>
    <p class="mt-5 mb-3 text-muted">&copy; 2022</p>
  </form>
</main>


    
  </body>
</html>

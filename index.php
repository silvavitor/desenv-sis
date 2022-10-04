<?php
  require_once("./banco.php");
  var_dump($mysqli);

  $email = $_POST["email"];
  $senha = $_POST["password"];

  $query = mysqli_query($mysqli, 
    "SELECT id 
     FROM clientes
     WHERE email='$email' AND senha='$senha'"
  );
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
    <a class="w-100 btn btn-lg btn-link" href="register-token.html">Cadastrar-se</a>
    <p class="mt-5 mb-3 text-muted">&copy; 2022</p>
  </form>
</main>


    
  </body>
</html>

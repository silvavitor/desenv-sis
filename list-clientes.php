<?php

require_once('session-analista.php');
require_once('banco.php');

$token = '';
$id_analista = $_SESSION['id'];

if (array_key_exists("token", $_POST)) {
  $token = "" . rand(100000, 999999);
  $query = mysqli_query($mysqli, 
      "INSERT INTO token (id_analista, token)
       VALUES ('$id_analista', '$token')"
    );
}

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <title>Listagem de Usuários - ADS Carteiras</title>

    <link href="assets/dist/css/bootstrap.min.css" rel="stylesheet">    
    <!-- Custom styles for this template -->
    <style>
      .form-signin {
        max-width: 700px;
      }
      .form-floating {
        padding-left: 0px;
        padding-right: 0px;
      }
    </style>
  </head>
<body class="bg-light">  
  <?php include_once('header.php'); ?>
  <main class="text-center form-signin w-100 m-auto">
      <div class="container mt-5">
        <div class="row mb-3">
          <div class="form-floating col">   
            <form action="list-clientes.php" method="post">
              <input type="hidden" name="token">    
              <button class="w-100 row mb-3 btn btn-lg btn-primary" type="submit">Gerar novo token</button>
              <?php if ($token <> '') { ?>
                <p><h6>Token: <?=$token?></h6></p>
              <?php } ?>
            </form> 
          </div>
        </div>
     </div>
      <h1 class="h3 mb-5 fw-normal">Clientes:</h1>
      
      <div class="container">
        <div class="row mb-3">
          <div class="form-floating  col"> 
            <?php 
            $queryClientes = mysqli_query($mysqli,
              "SELECT id, nome FROM usuario WHERE id_token in (SELECT id from token WHERE id_analista=$id_analista)"
            );
            
            if ($queryClientes && mysqli_num_rows($queryClientes) > 0) {
              while ($result = mysqli_fetch_assoc($queryClientes)) {
                $id = $result['id'];
                $nome = $result['nome'];
            ?>       
              <a href="carteiras-cliente.php?id=<?=$id?>"><button class="w-100 row mb-3 btn btn-lg btn-success"><?=$nome?></button></a>
            <?php } } else { ?>
              <p>Nenhum cliente encontrado!</p>
            <?php } ?>
          </div>
        </div>
     </div>
      <p class="mt-5 mb-3 text-muted">&copy; 2022</p>
  </main>
<script src="assets/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

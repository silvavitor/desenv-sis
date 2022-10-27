<?php

require_once('session-analista.php');
require_once('banco.php');

// Verifica se o parametro esta no get
if (!array_key_exists("id", $_GET)) {
  header('location: list-clientes.php');
}

$id_cliente = $_GET['id'];

// Pega o token do cliente
$queryToken = mysqli_query($mysqli,
    "SELECT id_token FROM usuario WHERE id='$id_cliente'"
  );

  if ($queryToken && ($result = mysqli_fetch_assoc($queryToken)) && (mysqli_num_rows($queryToken) > 0)) {
    $token = $result['id_token'];
    
    // Verifica se o token e do analista
    $queryAnalista = mysqli_query($mysqli,
      "SELECT id_analista FROM token WHERE id='$token'"
    );

    if ($queryAnalista && ($result = mysqli_fetch_assoc($queryAnalista))) {
      $analista = $result['id_analista'];
      
      if ($analista <> $_SESSION['id']) {
        header('location: list-clientes.php');
      }
    }
  } else {
    header('location: list-clientes.php');
  }

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <title>Home - ADS Carteiras</title>

    <link href="assets/dist/css/bootstrap.min.css" rel="stylesheet">    
    <link href="main.css" rel="stylesheet">    
    <!-- Custom styles for this template -->
    <!-- <link href="home.css" rel="stylesheet"> -->
  </head>
  <body class="bg-light">
    <?php include_once('header.php'); ?>

    <main class="mx-5">
    <div class="container mt-5">
        <div class="row mb-3">
          <div class="col-md-12">
            <div class="h-100 p-5 text-white bg-secondary bg-gradient rounded-3">
              <?php 
                $queryCliente = mysqli_query($mysqli,
                  "SELECT * FROM usuario WHERE id='$id_cliente'"
                );
            
                if ($queryCliente && ($result = mysqli_fetch_assoc($queryCliente))) {
              ?>
                <h2><?=$result['nome'] . ' ' . $result['sobrenome'];?></h2>
                <br>
                <p>Endereço: <?=$result['endereco'];?></p>
                <p>Email: <?=$result['email'];?></p>
                <p>RG: <?=$result['rg'];?></p>
              <?php } else {
                header('location: list-clientes.php');
              } ?>
            </div>
        </div>
    </div>
      <div class="row align-items-md-stretch">
        <div class="col-md-4">    
          <a href="carteira.php">
            <div class="h-100 p-5 text-white bg-success bg-gradient rounded-3">
              <h5>Carteira A</h5>
            </div>
          </a>
        </div>
        <div class="col-md-4">
          <a href="carteira.php">
          <div class="h-100 p-5 text-white bg-success bg-gradient rounded-3">
            <h5>Carteira A</h5>
            <p>Valor Total: R$ 1234.56</p>
          </div>
        </a>
        </div>
        <div class="col-md-4">
          <a href="carteira.php">
            <div class="h-100 p-5 text-white bg-success bg-gradient rounded-3">
              <h5>Carteira A</h5>
              <p>Valor Total: R$ 1234.56</p>
            </div>
          </a>
        </div>
        
      </div>
    </main>

    <script src="assets/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
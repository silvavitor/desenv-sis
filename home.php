<?php

require_once('session-cliente.php');
require_once('banco.php');

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
  </head>
  <body class="bg-light">
    <?php include_once('header.php'); ?>
    <main class="mx-5">
      <div class="container mt-5 w-75">
        <div class="row mb-3">
          <div class="form-floating col">        
            <a href="carteira-info-1.php">
              <button class="w-100 row mb-3 btn btn-lg btn-primary">Criar carteira</button>
            </a>  
          </div>
        </div>
      </div>

      <div class="text-center w-100 m-auto">
        <h1 class="h3 fw-normal">Carteiras:</h1>
      </div>
      
      <div class="row align-items-md-stretch">
        <?php 
          $id_cliente = $_SESSION['id'];
          $queryCarteiras = mysqli_query($mysqli, "SELECT * FROM carteira WHERE id_cliente='$id_cliente'");
          
          if ($queryCarteiras && mysqli_num_rows($queryCarteiras) > 0) {
            while ($result = mysqli_fetch_assoc($queryCarteiras)) {
              $id = $result['id'];
              $descricao = $result['descricao']; ?>     
              
              <div class="col-md-4 mt-5">
                <a href="carteira.php?id=<?=$id?>">
                  <div class="h-100 p-5 text-white bg-success bg-gradient rounded-3">
                    <h5><?=$descricao?></h5>
                  </div>
                </a>  
              </div>
              
        <?php } } else { ?>
          <div class="text-center w-100 m-auto">
            <p>Nenhuma carteira encontrada!</p>
          </div>
        <?php } ?>
      </div>
    </main>

    <script src="assets/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
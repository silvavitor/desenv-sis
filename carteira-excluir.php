<?php

require_once('session-cliente.php');
require_once('banco.php');

// Verifica se o parametro esta no get
if (!array_key_exists("id", $_GET)) {
  header('location: home.php');
}

$id_carteira = $_GET['id'];

$queryCarteira = mysqli_query($mysqli, "SELECT * FROM carteira WHERE id = $id_carteira");

if ($queryCarteira && ($result = mysqli_fetch_assoc($queryCarteira)) && (mysqli_num_rows($queryCarteira) > 0)) {
  $descricao = $result['descricao'];
} else {
  header('location: home.php');
}

if (array_key_exists("delete", $_POST)) {
  $queryOperacoes = mysqli_query($mysqli, "DELETE FROM operacoes WHERE id_carteira = $id_carteira");
  $queryCarteiraAcoes = mysqli_query($mysqli, "DELETE FROM carteira_acoes WHERE id_carteira = $id_carteira");
  $queryCarteira = mysqli_query($mysqli, "DELETE FROM carteira WHERE id = $id_carteira");
  header('location: home.php');
}

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <title>Excluir Carteira - ADS Carteiras</title>

    <link href="assets/dist/css/bootstrap.min.css" rel="stylesheet">    


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
<body class="text-center bg-light bodycss">  
  <?php include_once('header.php'); ?>     
  <main class="form-signin w-100 m-auto">  
    <form action="carteira-excluir.php?id=<?=$id_carteira?>" method="post">
      <h1 class="h3 mb-5 mt-5 fw-normal">Deseja mesmo excluir a carteira: <?=$descricao;?>?</h1>
        <div class="row mb-3">
          <a href="carteira.php?id=<?=$id_carteira?>" class="form-floating col-5 btn btn-lg btn-success">Voltar</a>
          <div class="col-2"></div>
          <button class="form-floating col-5 btn btn-lg btn-danger" type="submit">Excluir</button>        
        </div>
        <input type="hidden" name="delete" value="1">
        <p class="mt-5 mb-3 text-muted">&copy; 2022</p>
      </form>
  </main>
<script src="assets/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<?php

require_once('session-cliente.php');
require_once('banco.php');

// Verifica se o parametro esta no get
if (!array_key_exists("id", $_GET)) {
  header('location: home.php');
}

$id_carteira = $_GET['id'];

$operacoes = [];
$nome_carteira = '';

$queryOperacoes = mysqli_query($mysqli, 
  "SELECT 
    carteira.descricao, carteira_acoes.acao as nome_acao, operacoes.*
  FROM 
    operacoes, carteira, carteira_acoes 
  WHERE 
    carteira.id = operacoes.id_carteira AND carteira_acoes.id = operacoes.id_acao AND carteira.id = $id_carteira 
  ORDER BY 
    operacoes.id DESC;
");

if ($queryOperacoes && mysqli_num_rows($queryOperacoes) > 0) {
  while ($result = mysqli_fetch_assoc($queryOperacoes)) {
    $nome_carteira = $result['descricao'];
    if ($result['lado'] == 1) {
      $result['lado_nome'] = 'Compra';
    } else {
      $result['lado_nome'] = 'Venda';
    }
    $operacoes[] = $result;
  }
}

?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <title>Histórico de operações - ADS Carteiras</title>

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
    <h1 class="h3 mb-5 fw-normal">Histórico da carteira: <?=$nome_carteira?>:</h1>
    
    <div class="container fw-bold">  
      <div class="w-100 row mb-3 bg-info p-3 rounded">
        <div class="col-3"><span>Ação</span></div>
        <div class="col-3"><span>Lado</span></div>
        <div class="col-3"><span>Quantidade</span></div>
        <div class="col-3"><span>Data</span></div>
      </div> 
      <?php 
        
        if (sizeof($operacoes) > 0) {
          foreach ($operacoes as $operacao) {?>     
            
            <div class="w-100 row mb-3 <?=$operacao['lado']==1 ? "bg-success" : "bg-danger";?> p-3 rounded text-white">
              <div class="col-3"><span><?=$operacao['nome_acao']?></span></div>
              <div class="col-3"><span><?=$operacao['lado_nome']?></span></div>
              <div class="col-3"><span><?=$operacao['quantidade']?></span></div>
              <div class="col-3"><span><?=$operacao['data']?></span></div>
            </div>
            
      <?php } } else { ?>
        <div class="w-100 row mb-3 bg-danger p-3 rounded text-white">
          <div class="col-12"><span>Sem operações</span></div>
        </div>
      <?php } ?>    
    </div>
    <a href="carteira.php?id=<?=$id_carteira?>" class="form-floating col-5 btn btn-lg btn-success">Voltar</a>      
    <p class="mt-5 mb-3 text-muted">&copy; 2022</p>
  </main>
<script src="assets/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

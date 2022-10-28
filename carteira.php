<?php

require_once('session.php');
require_once('banco.php');


$tipo_usuario = $_SESSION["tipo_usuario"];

if (!array_key_exists("id", $_GET)) {
  if ($tipo_usuario == 1) {
    header('location: home.php');
  }
  
  if ($tipo_usuario == 2) {
    header('location: list-clientes.php');
  }
}

$id_carteira = $_GET["id"];

// Se for cliente, verifica se essa carteira percence a ele
if ($tipo_usuario == 1) {
  $id_cliente = $_SESSION['id'];

  $queryCarteira = mysqli_query($mysqli,
    "SELECT * FROM carteira WHERE id='$id_carteira'"
  );

  if ($queryCarteira && ($result = mysqli_fetch_assoc($queryCarteira)) && (mysqli_num_rows($queryCarteira) > 0)) {
    if ($result["id_cliente"] != $id_cliente) {
      header('location: home.php');
    }
  } else {
    header('location: home.php');
  }

}

// Se for analista, verifica se essa carteira é de algum cliente dele
if ($tipo_usuario == 2) {
  $id_analista = $_SESSION['id'];
  $queryAnalista = mysqli_query($mysqli,
    "SELECT 
      id 
    FROM 
      usuario 
    WHERE 
      id_token in (SELECT id from token WHERE id_analista=$id_analista) AND
      id in (SELECT id_cliente FROM carteira WHERE id=$id_carteira)"
  );

  if ($queryAnalista && ($result = mysqli_fetch_assoc($queryAnalista)) && (mysqli_num_rows($queryAnalista) > 0)) {
    $id_cliente = $result['id'];
  } else {
    header('location: list-clientes.php');
  }
}

$descricao = '';

$queryCarteira = mysqli_query($mysqli,
    "SELECT 
      * 
    FROM 
      carteira 
    WHERE 
      id = $id_carteira"
  );

  if ($queryCarteira && ($result = mysqli_fetch_assoc($queryCarteira)) && (mysqli_num_rows($queryCarteira) > 0)) {
    $descricao = $result['descricao'];
  } else {
    if ($tipo_usuario == 1) {
      header('location: home.php');
    }
    
    if ($tipo_usuario == 2) {
      header('location: list-clientes.php');
    }
  }
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <title>Carteira - ADS Carteiras</title>

    <link href="assets/dist/css/bootstrap.min.css" rel="stylesheet">    
    <!-- Custom styles for this template -->
    <!-- <link href="home.css" rel="stylesheet"> -->
  </head>
  <body class="bg-light">
    <?php include_once('header.php'); ?> 
    <main class="mx-5">
      <!-- Nome carteira, editar e excluir -->
      <div class="w-100">
        <div class="row mb-3">
          <div class="col-md-12">
            <div class="h-100 p-5 text-white bg-success bg-gradient rounded-3 row">
              <div class="col-10">
                <h2><?=$descricao?></h2>
              </div>
              <?php if ($tipo_usuario == 1) { ?>
                <div class="col-2 d-flex">
                  <a href="carteira-info-1.php?id=<?=$id_carteira?>" class="me-3"><button class="w-100 btn btn-lg btn-primary">Editar</button></a>
                  <a href="carteira-excluir.php?id=<?=$id_carteira?>"><button class="w-100 btn btn-lg btn-danger">Excluir</button></a>
                </div>
              <?php } ?>
            </div>
        </div>
      </div>

      <!-- Investimento, Add operação e histórico de operações -->
      <?php if ($tipo_usuario == 1) { ?>
      <div class="w-100 row">
        <div class="h-100 p-5 row">
          <div class="col">
            <a href="investimento.php?id=<?=$id_carteira?>" class="me-3"><button class="w-100 btn btn-lg btn-primary" type="submit">Adicionar investimento</button></a>
          </div>

          <div class="col">
            <a href="add-operacao.php?id=<?=$id_carteira?>" class="me-3"><button class="w-100 btn btn-lg btn-primary" type="submit">Adicionar operação</button></a>
          </div>

          <div class="col">
            <a href="historico-operacoes.php?id=<?=$id_carteira?>" class="me-3"><button class="w-100 btn btn-lg btn-primary" type="submit">Histórico de operações</button></a>
          </div>
        </div>
      </div>
      <?php } ?>

      <!-- Filtro -->
      <h4 class="mb-3 fw-normal">Filtro:</h4>
      <div class="w-100 row mb-5 mt-3">
        <div class="form-floating col">        
          <select id="lado" class="form-select pt-2" aria-label="Default select example">
            <option selected value="1">Segmento 1</option>
            <option value="2">Segmento 2</option>
            <option value="3">Segmento 3</option>
          </select>
        </div>
        <div class="form-floating col-2">        
          <button class="w-100 h-100 btn btn-lg btn-success" type="submit">Filtrar</button>
        </div>
      </div>

      <!-- Tabela -->
      <div class="fw-bold w-100">       
        <div class="row mb-3 bg-success bg-gradient p-3 rounded text-white">
          <div class="col"><span>Ativo</span></div>
          <div class="col"><span>Setor</span></div>
          <div class="col"><span>Quantidade</span></div>
          <div class="col"><span>Cotação atual</span></div>
          <div class="col"><span>Patrimônio atualizado</span></div>
          <div class="col"><span>Participação (%)</span></div>
          <div class="col"><span>Objetivo (%)</span></div>
          <div class="col"><span>Distância do objetivo</span></div>
        </div>

        <?php 
        $queryAcoes = mysqli_query($mysqli,
          "SELECT 
            * 
          FROM 
            carteira_acoes
          WHERE 
            id_carteira = $id_carteira"
        );
      
        while (($acao = mysqli_fetch_assoc($queryAcoes))) { ?>
          <div class="row mb-3 bg-secondary bg-gradient p-3 rounded text-white">
            <div class="col"><span><?=$acao['acao'];?></span></div>
            <div class="col"><span>XXXXXX</span></div>
            <div class="col"><span><?=$acao['quantidade'];?></span></div>
            <div class="col"><span>R$ XXXXXX</span></div>
            <div class="col"><span>R$ XXXXXX</span></div>
            <div class="col"><span>XX%</span></div>
            <div class="col"><span><?=$acao['porcentagem_objetivo'];?>%</span></div>
            <div class="col"><span>XX%</span></div>
          </div>
        <?php } ?>        
     </div>
    </main>

    <script src="assets/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
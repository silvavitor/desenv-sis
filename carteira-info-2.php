<?php

require_once('session-cliente.php');
require_once('banco.php');

if ((!array_key_exists("descricao", $_POST)) or (!array_key_exists("qtdacoes", $_POST)) or ($_POST["descricao"] == "") or ($_POST["qtdacoes"] == "")){
  header('location: carteira-info-1.php?erro=1');
}
$id_cliente = $_SESSION['id'];

$descricao = $_POST["descricao"];
$qtdacoes  = $_POST["qtdacoes"];

$acoes = [];
$id_carteira = 0;

$erroPorcentagem = false;
$erroPreenchimento = false;
$erroExistente = false;


// Se existe id é uma edição
if (array_key_exists("id", $_GET)) {
  $id_carteira = $_GET['id'];

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

// Se for uma inserção
if ($id_carteira == 0) {
  // Verificar se o nome de carteira nao existe
  $queryExistente = mysqli_query($mysqli, 
    "SELECT id FROM carteira WHERE descricao='$descricao' AND id_cliente=$id_cliente"
  );

  if (mysqli_num_rows($queryExistente) > 0) {
    header('location: carteira-info-1.php?erro=2');
  }
}

// Envio de info
if ((array_key_exists("porcentagem", $_POST)) and (array_key_exists("acoes", $_POST))) {
  for ($i=0; $i < $qtdacoes; $i++) { 
    if (($_POST["acoes"][$i] == "") or ($_POST["porcentagem"][$i] == "") or (!is_numeric($_POST["porcentagem"][$i]))) {
      $erroPreenchimento = true;
    }

    $acoes[$_POST["acoes"][$i]] = 1;
  }

  if (sizeof($acoes) <> $qtdacoes) {
    $erroPreenchimento = true;
  }
  
  $somatorio = 0;
  if (!$erroPreenchimento) {
    for ($i=0; $i < $qtdacoes; $i++) {   
      $somatorio += $_POST["porcentagem"][$i];
    }
    if ($somatorio <> 100) {
      $erroPorcentagem = true;
    }
  }

  // Se não houve erros
  if ((!$erroPorcentagem) and (!$erroPreenchimento)) {

    // Insere carteira
    if ($id_carteira == 0) {
      $query = mysqli_query($mysqli, 
        "INSERT INTO carteira (id_cliente, descricao)
          VALUES ('$id_cliente', '$descricao')"
      );

      // Insere acoes
      if ($query) {
        $id_carteira = mysqli_insert_id($mysqli);

        for ($i=0; $i < $qtdacoes; $i++) {
          $acao = $_POST["acoes"][$i];
          $porcentagem = $_POST["porcentagem"][$i];
          $query = mysqli_query($mysqli, 
            "INSERT INTO carteira_acoes (id_carteira, acao, quantidade, porcentagem_objetivo)
            VALUES ('$id_carteira', '$acao', 0, '$porcentagem')"
          );
        }

        header('location: home.php');
      }
    }
    // Edita carteira
    else {

      // Edita carteira
      $query = mysqli_query($mysqli, "UPDATE carteira SET descricao='$descricao' WHERE id=$id_carteira");

      // Edita acoes
      if ($query) {
        // Consulta as acoes existentes
        $acoesExistentes = [];
        $queryAcoesExistentes = mysqli_query($mysqli, "SELECT * FROM carteira_acoes WHERE id_carteira=$id_carteira");
        if ($queryAcoesExistentes && (mysqli_num_rows($queryAcoesExistentes) > 0)) {
          while ($acao = mysqli_fetch_assoc($queryAcoesExistentes)) {
            $acoesExistentes[$acao['acao']] = $acao['quantidade'];
          }
        } 
        
        // Remove as existentes
        $query = mysqli_query($mysqli, "DELETE FROM carteira_acoes WHERE id_carteira=$id_carteira");

        for ($i=0; $i < $qtdacoes; $i++) {
          if (array_key_exists($_POST["acoes"][$i], $acoesExistentes)) {
            $quantidade = $acoesExistentes[$_POST["acoes"][$i]];
          } else {
            $quantidade = 0;
          }
          $acao = $_POST["acoes"][$i];
          $porcentagem = $_POST["porcentagem"][$i];
          $query = mysqli_query($mysqli, 
            "INSERT INTO carteira_acoes (id_carteira, acao, quantidade, porcentagem_objetivo)
            VALUES ('$id_carteira', '$acao', '$quantidade', '$porcentagem')"
          );
        }

        header("location: carteira.php?id=$id_carteira");
      }
    }
  }
}

if (array_key_exists("id", $_GET)) {
  $id_carteira = $_GET['id'];
  // Query e consulta aos ativos
  $queryAcoes = mysqli_query($mysqli, "SELECT * FROM carteira_acoes WHERE id_carteira = $id_carteira;");

  if ($queryAcoes && (mysqli_num_rows($queryAcoes) > 0)) {
    while ($acao = mysqli_fetch_assoc($queryAcoes)) {
      $acoes[] = $acao['acao'];
      $porcentagem[] = $acao['porcentagem_objetivo'];
    }
  } else {
    header('location: home.php');
  }
}

?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <title>Carteiras - ADS Carteiras</title>

    <link href="assets/dist/css/bootstrap.min.css" rel="stylesheet">    
    <!-- Custom styles for this template -->
    <link href="signin.css" rel="stylesheet">
    <style>
      .form-signin {
        max-width: 500px;
      }
      .form-floating {
        padding-left: 0px;
        padding-right: 0px;
      }
    </style>
  </head>
  <body class="bg-light">
    <?php include_once('header.php'); ?>  
    <main class="form-signin w-100 m-auto">
      <form action="carteira-info-2.php<?= $id_carteira != 0 ? "?id=$id_carteira" : "" ?>" method="post">

      <?php if ($erroPreenchimento) { ?>
        <div class="p-3 text-white bg-danger bg-gradient rounded-3 mb-2">
          <span>Não foi preenchido corretamente todos os campos!</span>
        </div>
      <?php } ?>

      <?php if ($erroPorcentagem) { ?>
        <div class="p-3 text-white bg-danger bg-gradient rounded-3 mb-2">
          <span>Porcentagem total incorreta! (<?=$somatorio?>%)</span>
        </div>
      <?php } ?>

        <input type="hidden" name="descricao" value="<?=$descricao?>">
        <input type="hidden" name="qtdacoes" value="<?=$qtdacoes?>">
        <h1 class="h3 mb-3 fw-normal">Insira os dados da ações</h1>
        <div class="container">

          <?php 
          $queryAcoes = mysqli_query($mysqli, "SELECT * FROM acoes ORDER BY papel");
          $listAcoes = [];

          if ($queryAcoes && mysqli_num_rows($queryAcoes) > 0) {
            while ($result = mysqli_fetch_assoc($queryAcoes)) {
              $listAcoes[] = $result;
            }
          }

          for ($i=1; $i <= $qtdacoes; $i++) { 
          ?>
            <div class="row mb-3">
              <div class="form-floating col">        
                <select id="acao<?=$i?>" class="form-select pt-2" name="acoes[<?=$i-1?>]">
                  <?php foreach ($listAcoes as $acao) { ?>                  
                      
                    <option value="<?=$acao['papel'];?>" <?=(($id_carteira != 0) && (array_key_exists($i-1, $acoes)) && ($acao['papel'] == $acoes[$i-1])) ? "selected" : "";?> ><?=$acao['papel'];?></option>
                      
                  <?php } ?>
                    
                </select>
              </div>

              &nbsp&nbsp
              <div class="form-floating col">        
                <input type="text" class="form-control" id="porcentagem<?=$i?>" placeholder="porcentagem<?=$i?>" name="porcentagem[<?=$i-1?>]" value="<?=($id_carteira != 0  && (array_key_exists($i-1, $porcentagem))) ? $porcentagem[$i-1] : "";?>">
                <label for="porcentagem<?=$i?>">Porcentagem alvo</label>
              </div>
            </div>
          <?php } ?>

        <button class="w-100 btn btn-lg btn-success" type="submit">Finalizar cadastro de carteira</button>
        <p class="mt-5 mb-3 text-muted">&copy; 2022</p>
      </form>
    </main>


<script src="assets/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
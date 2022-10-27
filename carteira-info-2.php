<?php

require_once('session-cliente.php');
require_once('banco.php');

if ((!array_key_exists("descricao", $_POST)) or (!array_key_exists("qtdacoes", $_POST))) {
  header('location: carteira-info-1.php');
}

$descricao = $_POST["descricao"];
$qtdacoes  = $_POST["qtdacoes"];

$acoes = [];

$erroPorcentagem = false;
$erroPreenchimento = false;

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
    $id_cliente = $_SESSION['id'];
    // Insere carteira
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
      <form action="carteira-info-2.php" method="post">

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

          <?php for ($i=1; $i <= $qtdacoes; $i++) { ?>
            <div class="row mb-3">
              <div class="form-floating col">        
                <input type="text" class="form-control" id="acao<?=$i?>" placeholder="acao<?=$i?>" name="acoes[<?=$i-1?>]">
                <label for="acao<?=$i?>">Ação <?=$i?></label>
              </div>
              &nbsp&nbsp
              <div class="form-floating col">        
                <input type="text" class="form-control" id="porcentagem<?=$i?>" placeholder="porcentagem<?=$i?>" name="porcentagem[<?=$i-1?>]">
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

<?php

require_once('session-cliente.php');
require_once('banco.php');

$descricao = '';
$erroPreenchimento = false;

if (array_key_exists("id", $_GET)) {
  $id_carteira = $_GET['id'];
  
  $queryCarteira = mysqli_query($mysqli, "SELECT * FROM carteira WHERE carteira.id = $id_carteira;");
  
  if ($queryCarteira && ($result = mysqli_fetch_assoc($queryCarteira)) && (mysqli_num_rows($queryCarteira) > 0)) {
    $descricao = $result['descricao'];
  } else {
    header('location: home.php');
  }
} else {
  header("location: carteira.php?id=$id_carteira");
}

if (array_key_exists("descricao", $_POST)){
  $descricaoNova = $_POST["descricao"];

  if ($descricaoNova == "") {
    $erroPreenchimento = true;
  } 

  if (!$erroPreenchimento) {
    // Edita carteira
    $query = mysqli_query($mysqli, "UPDATE carteira SET descricao='$descricaoNova' WHERE id=$id_carteira");
    header("location: carteira.php?id=$id_carteira");
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
    </style>
  </head>
  <body class="bg-light">
  <?php include_once('header.php'); ?>  
<main class="form-signin w-100 m-auto">
  <form action="carteira-edit.php?id=<?=$id_carteira?>" method="post">
    <h1 class="h3 mb-3 fw-normal">Insira os dados da carteira</h1>
    <div class="form-container">

      <?php if ($erroPreenchimento) { ?>
        <div class="p-3 text-white bg-danger bg-gradient rounded-3 mb-2">
          <span>Campo não preenchido corretamente</span>
        </div>
      <?php } ?>

      <div class="form-floating mb-2">        
        <input type="text" class="form-control" id="descricao" placeholder="descricao" name="descricao" value="<?=$descricao;?>">
        <label for="descricao">Descrição da carteira</label>
      </div>
    </div>

    <button class="w-100 btn btn-lg btn-success" type="submit">Confirmar</button>
    <p class="mt-5 mb-3 text-muted">&copy; 2022</p>
  </form>
</main>


<script src="assets/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>

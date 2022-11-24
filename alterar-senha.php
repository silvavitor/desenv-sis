<?php

require_once('session-cliente.php');
require_once('banco.php');

$erroSenha = false;
$erroSenhaNovaDiferente = false;
$erroCamposObrigatorios = false;

$id_cliente = $_SESSION['id'];

if ((array_key_exists("senhaNova", $_POST)) && 
    (array_key_exists("antigaSenha", $_POST)) &&
    (array_key_exists("senhaNovaConfirma", $_POST))) {

  $senhaNova = $_POST["senhaNova"];
  $senhaAntiga = $_POST["antigaSenha"];
  $senhaConfirma = $_POST["senhaNovaConfirma"];
  
  if (($senhaNova      != '') &&
      ($senhaAntiga    != '') &&
      ($senhaConfirma  != '')) 
    {
    $querySenha = mysqli_query($mysqli,
      "SELECT COUNT(id) as qtd FROM usuario WHERE senha='$senhaAntiga' AND id=$id_cliente"
    );

    if ($querySenha && ($result = mysqli_fetch_assoc($querySenha)) && ($result['qtd'] == 0)) {
      $erroSenha = true;
    }

    if ($senhaNova != $senhaConfirma) {
      $erroSenhaNovaDiferente = true;
    }
    
    if ((!$erroSenha) && (!$erroSenhaNovaDiferente)) {
      $query = mysqli_query($mysqli, "UPDATE usuario 
      SET senha='$senhaNova'
      WHERE id=$id_cliente");
      header('location: home.php');
    } 
  } else {
    $erroCamposObrigatorios = true;
  }
}
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <title>Alteração de senha - ADS Carteiras</title>

    
    <link href="assets/dist/css/bootstrap.min.css" rel="stylesheet">    
    <!-- Custom styles for this template -->
    <!-- <link href="signin.css" rel="stylesheet"> -->
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
    <form action="alterar-senha.php" method="post">
      <h1 class="h3 mt-4 mb-3 fw-normal">Alterar senha</h1>
      &nbsp&nbsp
      <div class="container">

      <?php if ($erroSenha) { ?>
          <div class="p-3 text-white bg-danger bg-gradient rounded-3 mb-2">
            <span>Senha atual incorreta!</span>
          </div>
      <?php } ?>

      <?php if ($erroCamposObrigatorios) { ?>
          <div class="p-3 text-white bg-danger bg-gradient rounded-3 mb-2">
            <span>Preencha todos os campos!</span>
          </div>
      <?php } ?>
        
      <?php if ($erroSenhaNovaDiferente) { ?>
          <div class="p-3 text-white bg-danger bg-gradient rounded-3 mb-2">
            <span>Senha nova diferente da confirmação!</span>
          </div>
      <?php } ?>

        <div class="row mb-3">
          <div class="form-floating col">        
            <input type="password" name="antigaSenha" class="form-control" id="senhaAntiga" placeholder="senhaAntiga">
            <label for="senhaAntiga">Senha Antiga</label>
          </div>
          &nbsp&nbsp
        </div>
        <div class="row mb-3">
          <div class="form-floating col">        
            <input type="password" name="senhaNova" class="form-control" id="senhaNova" placeholder="senhaNova">
            <label for="senhaNova">Nova senha</label>
          </div>
          &nbsp&nbsp
        </div>
        <div class="row mb-3">
          <div class="form-floating col">        
            <input type="password" name="senhaNovaConfirma" class="form-control" id="senhaNovaConfirma" placeholder="senhaNovaConfirma">
            <label for="senhaNovaConfirma">Confirme a nova senha</label>
          </div>
          &nbsp&nbsp
        </div>
        </div>
      <button class="w-100 btn btn-lg btn-success" type="submit">Confirmar</button>
      <p class="mt-5 mb-3 text-muted">&copy; 2022</p>
    </form>
  </main>
<script src="assets/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

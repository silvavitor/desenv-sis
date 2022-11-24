<?php

require_once('session-cliente.php');
require_once('banco.php');

$erroCamposObrigatorios = false;
$erroEmailJaExiste = false;
$erroEmailSecJaExiste = false;
$erroEmailsIguais = false;

$nome = '';
$email = '';
$emailSec = '';

$nomeNovo = '';
$emailNovo = '';
$emailSecNovo = '';


$id_cliente = $_SESSION['id'];

$queryCliente = mysqli_query($mysqli, "SELECT usuario.* FROM usuario WHERE usuario.id = $id_cliente");

if ($queryCliente && ($result = mysqli_fetch_assoc($queryCliente))) {
  $nome = $result['nome'];
  $email = $result['email'];
  $emailSec = $result['emailSec'];
} else {
  header('location: home.php');
}

if ((array_key_exists("nome", $_POST)) && 
    (array_key_exists("emailSec", $_POST)) &&
    (array_key_exists("email", $_POST))) {
  $nomeNovo     = $_POST["nome"];
  $emailSecNovo = $_POST["emailSec"];
  $emailNovo    = $_POST["email"];

  if (($nomeNovo      != '') &&
      ($emailSecNovo != '') &&
      ($emailNovo     != '')) { 

    $queryEmail = mysqli_query($mysqli,
      "SELECT COUNT(id) as qtd FROM usuario WHERE email='$emailNovo' AND id!=$id_cliente"
    );

    if ($queryEmail && ($result = mysqli_fetch_assoc($queryEmail)) && ($result['qtd'] > 0)) {
      $erroEmailJaExiste = true;
    }

    $queryEmailSecEmail = mysqli_query($mysqli,
      "SELECT COUNT(id) as qtd FROM usuario WHERE email='$emailSecNovo' AND id!=$id_cliente"
    );

    if ($queryEmailSecEmail && ($result = mysqli_fetch_assoc($queryEmailSecEmail)) && ($result['qtd'] > 0)) {
    $erroEmailSecJaExiste = true;
    }

    $queryEmailEmailSec = mysqli_query($mysqli,
      "SELECT COUNT(id) as qtd FROM usuario WHERE emailSec='$emailNovo' AND id!=$id_cliente"
    );

    if ($queryEmailEmailSec && ($result = mysqli_fetch_assoc($queryEmailEmailSec)) && ($result['qtd'] > 0)) {
      $erroEmailJaExiste = true;
    }

    $queryEmailSecEmailSec = mysqli_query($mysqli,
    "SELECT COUNT(id) as qtd FROM usuario WHERE emailSec='$emailSecNovo' AND id!=$id_cliente"
    );

    if ($queryEmailSecEmailSec && ($result = mysqli_fetch_assoc($queryEmailSecEmailSec)) && ($result['qtd'] > 0)) {
    $erroEmailSecJaExiste = true;
    }

    if ($emailNovo == $emailSecNovo){
      $erroEmailsIguais = true;
    }

    if ((!$erroEmailJaExiste) && (!$erroEmailSecJaExiste) && (!$erroEmailsIguais)) {
      $query = mysqli_query($mysqli, "UPDATE usuario 
      SET nome='$nomeNovo', email='$emailNovo', emailSec='$emailSecNovo' 
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
    <title>Editar Usuário - ADS Carteiras</title>

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
<body class="text-center bg-light"> 
  <?php include_once('header.php'); ?>    
  <main class="form-signin w-100 m-auto">
    <form action="user-edit.php" method="post">
      <h1 class="h3 mt-3 mb-3 fw-normal">Alterar dados</h1>
      
      <div class="container">

      <?php if ($erroEmailsIguais) { ?>
          <div class="p-3 text-white bg-danger bg-gradient rounded-3 mb-2">
            <span>Email e email secundário são iguais!</span>
          </div>
      <?php } ?>

      <?php if ($erroCamposObrigatorios) { ?>
          <div class="p-3 text-white bg-danger bg-gradient rounded-3 mb-2">
            <span>Preencha todos os campos!</span>
          </div>
      <?php } ?>
        
      <?php if ($erroEmailJaExiste) { ?>
          <div class="p-3 text-white bg-danger bg-gradient rounded-3 mb-2">
            <span>E-mail já cadastrado!</span>
          </div>
      <?php } ?>
      <?php if ($erroEmailSecJaExiste) { ?>
          <div class="p-3 text-white bg-danger bg-gradient rounded-3 mb-2">
            <span>E-mail secundário já cadastrado!</span>
          </div>
      <?php } ?>
        
        &nbsp&nbsp
        <!-- 
          Nome
        -->
        <div class="row mb-3">
          <div class="form-floating col-12">        
            <input type="text" value="<?=$nome?>" class="form-control" id="nome" placeholder="Nome" name="nome">
            <label for="nome">Nome</label>
          </div>
          &nbsp&nbsp
        </div>
        <!-- 
          Email
        -->
        <div class="row mb-3">
          <div class="form-floating col-12">        
            <input type="email" value="<?=$email?>" class="form-control" id="email" placeholder="email" name="email">
            <label for="email">E-mail</label>
          </div>
          &nbsp&nbsp
        </div>
        <!-- 
          email alternativo
        -->
        <div class="row mb-3">
          <div class="form-floating col-12">        
            <input type="email" value="<?=$emailSec?>" class="form-control" id="emailSec" placeholder="emailSec" name="emailSec">
            <label for="emailSec">E-mail alternativo</label>
          </div>
        </div>
        &nbsp&nbsp
      </div>
      &nbsp&nbsp

      <button class="w-100 btn btn-lg btn-success" type="submit">Confirmar</button>
      <p class="mt-5 mb-3 text-muted">&copy; 2022</p>
    </form>
  </main>
<script src="assets/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

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
    <form>
      <h1 class="h3 mt-4 mb-3 fw-normal">Alterar senha</h1>
      &nbsp&nbsp
      <div class="container">
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

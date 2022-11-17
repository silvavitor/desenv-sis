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
    <form>
      <h1 class="h3 mt-3 mb-3 fw-normal">Alterar dados</h1>

      <div class="container">
        
        &nbsp&nbsp
        <!-- 
          Nome
        -->
        <div class="row mb-3">
          <div class="form-floating col-12">        
            <input type="text" class="form-control" id="nome" placeholder="Nome" name="nome">
            <label for="nome">Nome</label>
          </div>
          &nbsp&nbsp
        </div>
        <!-- 
          Email
        -->
        <div class="row mb-3">
          <div class="form-floating col-12">        
            <input type="text" class="form-control" id="email" placeholder="email" name="email">
            <label for="email">E-mail</label>
          </div>
          &nbsp&nbsp
        </div>
        <!-- 
          email alternativo
        -->
        <div class="row mb-3">
          <div class="form-floating col-12">        
            <input type="text" class="form-control" id="emailSec" placeholder="emailSec" name="emailSec">
            <label for="emailSec">E-mail alternativo</label>
          </div>
        </div>
        &nbsp&nbsp
        <!-- 
          senha
        -->
        <div class="row mb-3">
          <div class="form-floating col-12">        
            <input type="password" class="form-control" id="senha" placeholder="senha" name="senha">
            <label for="Senha">Senha</label>
          </div>
        </div>
      </div>
      &nbsp&nbsp

      <button class="w-100 btn btn-lg btn-success" type="submit">Confirmar</button>
      <p class="mt-5 mb-3 text-muted">&copy; 2022</p>
    </form>
  </main>
<script src="assets/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

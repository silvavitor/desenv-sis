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
        <!-- 
          Nome e sobrenome 
        -->
        <div class="row mb-3">
          <div class="form-floating  col">        
            <input type="text" class="form-control" id="nome" placeholder="Nome">
            <label for="nome">Nome</label>
          </div>
          &nbsp&nbsp
          <div class="form-floating col">        
            <input type="text" class="form-control" id="sobrenome" placeholder="Sobrenome">
            <label for="sobrenome">Sobrenome</label>
          </div>
        </div>
        <!-- 
          RG e CPF 
        -->
        <div class="row mb-3">
          <div class="form-floating col">        
            <input type="text" class="form-control" id="rg" placeholder="rg">
            <label for="rg">RG</label>
          </div>
          &nbsp&nbsp
          <div class="form-floating col">        
            <input type="text" class="form-control" id="cpf" placeholder="cpf">
            <label for="cpf">CPF</label>
          </div>
        </div>
        <!-- 
          Endere�o e Celular
        -->
        <div class="row mb-3">
          <div class="form-floating col">        
            <input type="text" class="form-control" id="endereco" placeholder="endereco">
            <label for="endereco">Endereco Completo</label>
          </div>
          &nbsp&nbsp
          <div class="form-floating col">        
            <input type="text" class="form-control" id="celular" placeholder="celular">
            <label for="celular">Celular</label>
          </div>
        </div>
        <!-- 
          Email e Senha
        -->
        <div class="row mb-3">
          <div class="form-floating col">        
            <input type="text" class="form-control" id="email" placeholder="email">
            <label for="email">E-mail</label>
          </div>
        </div>
      </div>
      <a class="w-100 mb-5 btn btn-lg btn-link" href="alterar-senha.html">Alterar senha</a>
      <button class="w-100 btn btn-lg btn-success" type="submit">Confirmar</button>
      <p class="mt-5 mb-3 text-muted">&copy; 2022</p>
    </form>
  </main>
<script src="assets/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

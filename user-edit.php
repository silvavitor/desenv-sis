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
  <nav class="navbar navbar-expand-lg navbar-light bg-light px-5">
      
    <div class="container-fluid">
      <a class="navbar-brand" href="home.html">
        <img class="mb-4" src="assets/ifrs.png" alt="" width="45" height="50">ADS Carteiras
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="d-flex">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item dropdown btn btn-md btn-success">
              <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Perfil
              </a>
              <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="user-edit.html">Alterar perfil</a></li>
                <li><a class="dropdown-item" href="alterar-senha.html">Alterar senha</a></li>
              </ul>
          </ul>
        </div>
      </div>
    </div>
  </nav>    
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

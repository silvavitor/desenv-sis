<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <title>Listagem de Usuários - ADS Carteiras</title>

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
<body class="bg-light">  
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
  <main class="text-center form-signin w-100 m-auto">
      <div class="container mt-5">
        <div class="row mb-3">
          <div class="form-floating  col">        
            <button class="w-100 row mb-3 btn btn-lg btn-primary">Gerar novo token</button>
            <p><h6>Token: h7q8grh</h6></p>
          </div>
        </div>
     </div>
      <h1 class="h3 mb-5 fw-normal">Clientes:</h1>
      
      <div class="container">
        <div class="row mb-3">
          <div class="form-floating  col">        
            <a href="carteiras-cliente.html" target="_blank"><button class="w-100 row mb-3 btn btn-lg btn-success">1 - Giovani</button></a>
            <a href="carteiras-cliente.html" target="_blank"><button class="w-100 row mb-3 btn btn-lg btn-success">2 - Vitor </button></a>
            <a href="carteiras-cliente.html" target="_blank"><button class="w-100 row mb-3 btn btn-lg btn-success">3 - Marisa</button></a>
            <a href="carteiras-cliente.html" target="_blank"><button class="w-100 row mb-3 btn btn-lg btn-success">4 - Tiago </button></a>
            <a href="carteiras-cliente.html" target="_blank"><button class="w-100 row mb-3 btn btn-lg btn-success">5 - IF</button></a>
            <a href="carteiras-cliente.html" target="_blank"><button class="w-100 row mb-3 btn btn-lg btn-success">6 - Cléber</button></a>
          </div>
        </div>
     </div>
      <p class="mt-5 mb-3 text-muted">&copy; 2022</p>
  </main>
<script src="assets/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

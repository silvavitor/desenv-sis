<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <title>Carteiras - ADS Carteiras</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.2/examples/sign-in/">
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
  <form>
    <h1 class="h3 mb-3 fw-normal">Insira os dados da carteira</h1>
    <div class="form-container">
      <div class="form-floating mb-2">        
        <input type="text" class="form-control" id="descricao" placeholder="descricao">
        <label for="descricao">Descrição da nova carteira</label>
      </div>
      <div class="form-floating">        
        <input type="text" class="form-control" id="qtdacoes" placeholder="qtdacoes">
        <label for="qtdacoes">Quantidade de ações dessa carteira</label>
      </div>
    </div>

    <a href="carteira-info-2.html"><button class="w-100 btn btn-lg btn-success">Próximo</button></a>
    <p class="mt-5 mb-3 text-muted">&copy; 2022</p>
  </form>
</main>


<script src="assets/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>

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
      .form-floating {
        padding-left: 0px;
        padding-right: 0px;
      }
    </style>
  </head>
  <body class="bg-light">
    <?php include_once('header.php'); ?>  
    <main class="form-signin w-100 m-auto">
      <form>
        <h1 class="h3 mb-3 fw-normal">Insira os dados da ações</h1>
        
        <div class="container">
          <!-- 
            Ação 1
          -->
          <div class="row mb-3">
            <div class="form-floating  col">        
              <input type="text" class="form-control" id="acao1" placeholder="acao1">
              <label for="acao1">Ação 1</label>
            </div>
            &nbsp&nbsp
            <div class="form-floating col">        
              <input type="text" class="form-control" id="porcentagem1" placeholder="porcentagem1">
              <label for="porcentagem1">Porcentagem alvo</label>
            </div>
          </div>
          <!-- 
            Ação 2
          -->
          <div class="row mb-3">
            <div class="form-floating  col">        
              <input type="text" class="form-control" id="acao2" placeholder="acao2">
              <label for="acao2">Ação 2</label>
            </div>
            &nbsp&nbsp
            <div class="form-floating col">        
              <input type="text" class="form-control" id="porcentagem2" placeholder="porcentagem2">
              <label for="porcentagem2">Porcentagem alvo</label>
            </div>
          </div>
          <!-- 
            Ação 3
          -->
          <div class="row mb-3">
            <div class="form-floating  col">        
              <input type="text" class="form-control" id="acao3" placeholder="acao3">
              <label for="acao3">Ação 3</label>
            </div>
            &nbsp&nbsp
            <div class="form-floating col">        
              <input type="text" class="form-control" id="porcentagem3" placeholder="porcentagem3">
              <label for="porcentagem3">Porcentagem alvo</label>
            </div>
          </div>
        <button class="w-100 btn btn-lg btn-success" type="submit">Finalizar cadastro de carteira</button>
        <p class="mt-5 mb-3 text-muted">&copy; 2022</p>
      </form>
    </main>


<script src="assets/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>

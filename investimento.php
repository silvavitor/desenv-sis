<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <title>Informar Investimento - ADS Carteiras</title>

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
<body class="text-center bg-light bodycss">
  <?php include_once('header.php'); ?>  
    
<main class="form-signin w-100 m-auto">
  <form>
    <div class="container">
      <div class="row mb-5 mt-3">
        <div class="form-floating col-8">        
          <input type="text" class="form-control" id="valor" placeholder="Valor">
          <label for="valor">Valor</label>
        </div>
        <div class="col-1"></div>
        <div class="form-floating col-3">        
          <button class="w-100 h-100 btn btn-lg btn-success" type="submit">Calcular</button>
        </div>
      </div>

      <!-- 
        Ação 1
      -->
      <div class="row mb-3">
        <div class="form-floating  col">        
          <input type="text" class="form-control" id="acao1" value="petr4" placeholder="acao1" readonly>
          <label for="acao1">Ação 1</label>
        </div>
        <div class="col-2"></div>
        <div class="form-floating col">        
          <input type="text" class="form-control" id="porcentagem1" value="20%" placeholder="porcentagem1" readonly>
          <label for="porcentagem1">Porcentagem alvo</label>
        </div>
      </div>
      <!-- 
        Ação 2
      -->
      <div class="row mb-3">
        <div class="form-floating  col">        
          <input type="text" class="form-control" id="acao2" value="petr4" placeholder="acao2" readonly>
          <label for="acao2">Ação 2</label>
        </div>
        <div class="col-2"></div>
        <div class="form-floating col">        
          <input type="text" class="form-control" id="porcentagem2" value="30%" placeholder="porcentagem2" readonly>
          <label for="porcentagem2">Porcentagem alvo</label>
        </div>
      </div>
      <!-- 
        Ação 3
      -->
      <div class="row mb-3">
        <div class="form-floating  col-5">        
          <input type="text" class="form-control" id="acao3" value="petr4" placeholder="acao3" readonly>
          <label for="acao3">Ação 3</label>
        </div>
        <div class="col-2"></div>
        <div class="form-floating col-5">        
          <input type="text" class="form-control" id="porcentagem3" value="50%" placeholder="porcentagem3" readonly>
          <label for="porcentagem3">Porcentagem alvo</label>
        </div>
      </div>

    <p class="mt-5 mb-3 text-muted">&copy; 2022</p>
  </form>
</main>


    
  </body>
</html>

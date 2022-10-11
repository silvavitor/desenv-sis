<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <title>Nova operação - ADS Carteiras</title>

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
      <h1 class="h3 mt-3 mb-3 fw-normal">Inserir operação</h1>
      
      <div class="container"> 
        <div class="row mb-3">
          <div class="form-floating col">        
            <select id="lado" class="form-select pt-2" aria-label="Default select example">
              <option selected value="1">Compra</option>
              <option value="2">Venda</option>
            </select>
          </div>
        </div>        
        <div class="row mb-3">
          <div class="form-floating col">        
            <select id="acao" class="form-select pt-2" aria-label="Default select example">
              <option selected value="1">PETR4</option>
              <option value="2">VALE3</option>
            </select>
          </div>
        </div>        
        <div class="row mb-3">
          <div class="form-floating col">        
            <input type="number" class="form-control" id="quantidade" placeholder="Quantidade">
            <label for="quantidade">Quantidade</label>
          </div>
          &nbsp&nbsp
        </div>
        <div class="row mb-3">
        </div>
      </div>
      <button class="w-100 btn btn-lg btn-success" type="submit">Confirmar</button>
      <p class="mt-5 mb-3 text-muted">&copy; 2022</p>
    </form>
  </main>
<script src="assets/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

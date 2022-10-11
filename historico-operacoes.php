<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <title>Histórico de operações - ADS Carteiras</title>

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
  <?php include_once('header.php'); ?>

  <main class="text-center form-signin w-100 m-auto">
      <h1 class="h3 mb-5 fw-normal">Histórico da carteira "nome da carteira":</h1>
      
      <div class="container fw-bold">       
        <div class="w-100 row mb-3 bg-info p-3 rounded">
          <div class="col-4"><span>Ação</span></div>
          <div class="col-4"><span>Lado</span></div>
          <div class="col-4"><span>Quantidade</span></div>
        </div>
        <div class="w-100 row mb-3 bg-success p-3 rounded text-white">
          <div class="col-4"><span>PETR4</span></div>
          <div class="col-4"><span>Compra</span></div>
          <div class="col-4"><span>100</span></div>
        </div>
        <div class="w-100 row mb-3 bg-danger p-3 rounded text-white">
          <div class="col-4"><span>PETR4</span></div>
          <div class="col-4"><span>Venda</span></div>
          <div class="col-4"><span>100</span></div>
        </div>
        <div class="w-100 row mb-3 bg-danger p-3 rounded text-white">
          <div class="col-4"><span>PETR4</span></div>
          <div class="col-4"><span>Venda</span></div>
          <div class="col-4"><span>100</span></div>
        </div>
        <div class="w-100 row mb-3 bg-success p-3 rounded text-white">
          <div class="col-4"><span>PETR4</span></div>
          <div class="col-4"><span>Compra</span></div>
          <div class="col-4"><span>200</span></div>
        </div>
        <div class="w-100 row mb-3 bg-success p-3 rounded text-white">
          <div class="col-4"><span>PETR4</span></div>
          <div class="col-4"><span>Compra</span></div>
          <div class="col-4"><span>300</span></div>
        </div>
     </div>
      <p class="mt-5 mb-3 text-muted">&copy; 2022</p>
  </main>
<script src="assets/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

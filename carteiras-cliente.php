<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <title>Home - ADS Carteiras</title>

    <link href="assets/dist/css/bootstrap.min.css" rel="stylesheet">    
    <link href="main.css" rel="stylesheet">    
    <!-- Custom styles for this template -->
    <!-- <link href="home.css" rel="stylesheet"> -->
  </head>
  <body class="bg-light">
    <?php include_once('header.php'); ?>

    <main class="mx-5">
    <div class="container mt-5">
        <div class="row mb-3">
          <div class="col-md-12">
            <div class="h-100 p-5 text-white bg-secondary bg-gradient rounded-3">
              <h2>Nome e sobrenome</h2>
              <br>
              <p>Endereço: Endereço</p>
              <p>Email: Email</p>
              <p>CPF: RG</p>
              <p>RG: RG</p>
            </div>
        </div>
    </div>
      <div class="row align-items-md-stretch">
        <div class="col-md-4">    
          <a href="carteira.php">
            <div class="h-100 p-5 text-white bg-success bg-gradient rounded-3">
              <h5>Carteira A</h5>
              <p>Valor Total: R$ 1234.56</p>
            </div>
          </a>
        </div>
        <div class="col-md-4">
          <a href="carteira.php">
          <div class="h-100 p-5 text-white bg-success bg-gradient rounded-3">
            <h5>Carteira A</h5>
            <p>Valor Total: R$ 1234.56</p>
          </div>
        </a>
        </div>
        <div class="col-md-4">
          <a href="carteira.php">
            <div class="h-100 p-5 text-white bg-success bg-gradient rounded-3">
              <h5>Carteira A</h5>
              <p>Valor Total: R$ 1234.56</p>
            </div>
          </a>
        </div>
        
      </div>
    </main>

    <script src="assets/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
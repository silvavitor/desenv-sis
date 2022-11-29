<?php
require_once('session-cliente.php');
require_once('banco.php');

$id_cliente = $_SESSION['id'];

if (array_key_exists("id", $_GET)) {
  $id_carteira = $_GET['id'];

  $queryCarteira = mysqli_query($mysqli,
    "SELECT * FROM carteira WHERE id='$id_carteira'"
  );

  if ($queryCarteira && ($result = mysqli_fetch_assoc($queryCarteira)) && (mysqli_num_rows($queryCarteira) > 0)) {
    if ($result["id_cliente"] != $id_cliente) {
      header('location: home.php');
    }
  } else {
    header('location: home.php');
  }
}


if (array_key_exists("valor", $_POST)) {
  $valor = $_POST["valor"];

  $queryAcoes = mysqli_query($mysqli,
    "SELECT 
      ca.*, a.segmento
    FROM 
      carteira_acoes ca, acoes a
    WHERE 
      id_carteira = $id_carteira AND a.papel = ca.acao
    ORDER BY
      ca.acao"
  );

  while (($acao = mysqli_fetch_assoc($queryAcoes))) {
    ////////////////////////////////////////////////////////////////////
    // Consulta a API
    ////////////////////////////////////////////////////////////////////
    $ativo = $acao["acao"];
    $url  = 'https://api.hgbrasil.com/finance/stock_price?key=4cff688a&symbol='.$ativo;
    $ch   = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $result = curl_exec($ch);
    curl_close($ch);

    $preco = json_decode($result)->results->$ativo->price;

    if (($filtro == '') or ($filtro == $acao["segmento"])) {
      $tabela[$acao['acao']] = [
        "qtd"                => $acao["quantidade"],
        "cotacao_atual"      => $preco,
        "patrimonio"         => $acao["quantidade"] * $preco,
        "participacao"       => 0,
        "objetivo"           => $acao["porcentagem_objetivo"],
        "distancia_objetivo" => 0,
      ];
    }

    $patrimonio_total += $acao["quantidade"] * $preco;
  } 

  foreach ($tabela as $acao => $dados) {
    if ($patrimonio_total > 0) {
      $participacao = (100 * $dados["patrimonio"]) / $patrimonio_total;
    } else {
      $participacao = 0;
    }
  
    $distancia = $participacao - $dados["objetivo"];
  
    $tabela[$acao]["participacao"] = $participacao;
    $tabela[$acao]["distancia_objetivo"] = $distancia;
  } 
}

?>

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
  <form action="investimento.php" method="post">
    <div class="container">
      <div class="row mb-5 mt-3">
        <div class="form-floating col-8">        
          <input type="text" class="form-control" id="valor" placeholder="Valor" name="valor">
          <label for="valor">Valor</label>
        </div>
        <div class="col-1"></div>
        <div class="form-floating col-3">        
          <button class="w-100 h-100 btn btn-lg btn-success" type="submit">Calcular</button>
        </div>
      </div>
  </form>

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

    <p class="mt-5 mb-3 text-muted">&copy; 2022</p>
  
</main>


    
  </body>
</html>

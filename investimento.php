<?php
require_once('session.php');
require_once('banco.php');

$tipo_usuario = $_SESSION["tipo_usuario"];

if (!array_key_exists("id", $_GET)) {
  if ($tipo_usuario == 1) {
    header('location: home.php');
  }
  
  if ($tipo_usuario == 2) {
    header('location: list-clientes.php');
  }
}

$id_carteira = $_GET["id"];
$erroApi = false;
$erroApiText = 'teste';


// Se for cliente, verifica se essa carteira percence a ele
if ($tipo_usuario == 1) {
  $id_cliente = $_SESSION['id'];

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

// Se for analista, verifica se essa carteira é de algum cliente dele
if ($tipo_usuario == 2) {
  $id_analista = $_SESSION['id'];
  $queryAnalista = mysqli_query($mysqli,
    "SELECT 
      id 
    FROM 
      usuario 
    WHERE 
      id_token in (SELECT id from token WHERE id_analista=$id_analista) AND
      id in (SELECT id_cliente FROM carteira WHERE id=$id_carteira)"
  );

  if ($queryAnalista && ($result = mysqli_fetch_assoc($queryAnalista)) && (mysqli_num_rows($queryAnalista) > 0)) {
    $id_cliente = $result['id'];
  } else {
    header('location: list-clientes.php');
  }
}

$patrimonio_total = 0;
$investimentos = [];
$valor = 0;
$valor_cheio = '';

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
} else {
  header('location: home.php');
}

if (array_key_exists("valor", $_POST)) {
  $valor = (float)str_replace(",", ".", $_POST["valor"]) ;
  $valor_cheio = $valor;

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
    $url  = 'https://brapi.dev/api/quote/'.$ativo;
    $ch   = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $exec = curl_exec($ch);
    curl_close($ch);
    $result = json_decode($exec);

    if (property_exists($result, 'error')) {
      $preco = 1;
      $erroApi = true;
      $erroApiText = $result->error;
    } else {
      $preco = $result->results[0]->regularMarketPrice;
    }
    
    $patrimonio = $acao["quantidade"] * $preco;

    $tabela[$acao['acao']] = [
      "id_acao"            => $acao['id'],
      "acao"               => $ativo,
      "qtd"                => $acao["quantidade"],
      "cotacao_atual"      => $preco,
      "patrimonio"         => $patrimonio,
      "participacao"       => 0,
      "objetivo"           => $acao["porcentagem_objetivo"],
      "distancia_objetivo" => 0,
      "distancia_qtd"      => 0,
    ];

    $patrimonio_total += $patrimonio;
  } 

  $patrimonio_total += $valor;

  foreach ($tabela as $acao => $dados) {
    if ($patrimonio_total > 0) {
      $participacao = (100 * $dados["patrimonio"]) / $patrimonio_total;
    } else {
      $participacao = 0;
    }
  
    $distancia = $participacao - $dados["objetivo"];

    $distancia_qtd = (($patrimonio_total * ($dados['objetivo'] / 100)) - $dados['patrimonio']) / $dados['cotacao_atual'];
    if ($distancia_qtd >= 0) {
      $distancia_qtd = floor($distancia_qtd);
    } else {
      $distancia_qtd = ceil($distancia_qtd);
    }
  
    $tabela[$acao]["participacao"] = $participacao;
    $tabela[$acao]["distancia_objetivo"] = $distancia;
    $tabela[$acao]["distancia_qtd"] = (int)$distancia_qtd;
  }
  // echo "<pre>";

  $referencia_ordem = [];
  foreach ($tabela as $acao => $dados) {
    $referencia_ordem[$dados["distancia_objetivo"]][] = [
      "acao" => $acao,
      "distancia_objetivo" => $dados["distancia_objetivo"]
    ];
  }
  ksort($referencia_ordem);

  // print_r($tabela);
  // print_r($referencia_ordem);
  // die;

  foreach ($referencia_ordem as $distancia => $ativos) {
    if ($distancia <= 0) {
      foreach ($ativos as $info_ativo) {
        if ($info_ativo['distancia_objetivo'] < 0) {
          $ativo = $info_ativo['acao'];
          $qtdIndicada = $tabela[$ativo]["distancia_qtd"];
          $cotacao     = $tabela[$ativo]["cotacao_atual"];
          if (($qtdIndicada * $cotacao) > $valor) {
            $qtdIndicada = floor($valor/$cotacao);
          }
          $valor -= ($qtdIndicada * $cotacao);
          $investimentos[$ativo] = [
            "id_acao" => $tabela[$ativo]["id_acao"],
            "ativo"   => $ativo,
            "qtd"     => $qtdIndicada
          ];
        }
      }
    }
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
    <form action="investimento.php?id=<?=$id_carteira?>" method="post">
      <div class="container">
        <div class="row mb-5 mt-3">
          <div class="form-floating col-8">        
            <input type="text" class="form-control" id="valor" placeholder="Valor" name="valor" value="<?=$valor_cheio?>">
            <label for="valor">Valor</label>
          </div>
          <div class="col-1"></div>
          <div class="form-floating col-3">        
            <button class="w-100 h-100 btn btn-lg btn-success" type="submit">Calcular</button>
          </div>
        </div>
    </form>

    <?php if ($erroApi) { ?>
      <div class="p-3 text-white bg-danger bg-gradient rounded-3 mb-2">
        <span>Erro na API: <?=$erroApiText?></span>
      </div>
    <?php } ?>

    <?php if ($valor_cheio <> '') { ?>
      <form action="aplicar-investimento.php?id=<?=$id_carteira?>" method="post">
        <?php foreach ($investimentos as $investimento) { ?>
          <div class="row mb-3">
            <div class="form-floating col">        
              <input type="text" class="form-control" value="<?=$investimento['ativo']?>" name="ativos[]" readonly>
              <label>Ação</label>
              <input type="hidden" value="<?=$investimento['id_acao']?>" name="acoes[]">
            </div>
            <div class="col-2"></div>
            <div class="form-floating col">        
              <input type="text" class="form-control" value="<?=$investimento['qtd']?>" name="qtds[]" readonly>
              <label>Quantidade</label>
            </div>
          </div>
        <?php } 
          if ($tipo_usuario == 1) { ?>
            <div class="form-floating">        
              <button class="w-100 h-100 btn btn-lg btn-success" type="submit">Aplicar Investimento</button>
            </div>
        <?php } ?>
      </form>
      <?php } ?>
      <div class="form-floating">        
        <a href="carteira.php?id=<?=$id_carteira?>"class="mt-3 w-100 h-100 btn btn-lg btn-success">Voltar</a>
      </div>

    <p class="mt-5 mb-3 text-muted">&copy; 2022</p>
    
  </main>
</body>
</html>

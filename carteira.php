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

$descricao = '';

$queryCarteira = mysqli_query($mysqli,
    "SELECT 
      * 
    FROM 
      carteira 
    WHERE 
      id = $id_carteira"
  );

  if ($queryCarteira && ($result = mysqli_fetch_assoc($queryCarteira)) && (mysqli_num_rows($queryCarteira) > 0)) {
    $descricao = $result['descricao'];
  } else {
    if ($tipo_usuario == 1) {
      header('location: home.php');
    }
    
    if ($tipo_usuario == 2) {
      header('location: list-clientes.php');
    }
  }


//////////////////////////////////////////////////////////////////////////////
// API
//////////////////////////////////////////////////////////////////////////////

// Estrutura da $tabela
// - qtd (banco)
// - segmento
// - cotacao_atual (api)
// - patrimonio (qtd * cotacao_atual)
// - participacao 
// - objetivo (banco)
// - distancia_objetivo (objetivo - participacao)'
$tabela = [];
$segmento = [];
$patrimonio_total = 0;
$filtro = '';

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

if (array_key_exists("segmento", $_GET)) {
  $filtro = urldecode($_GET["segmento"]);
}

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
      "segmento"           => $acao["segmento"],
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

$querySegmentos = mysqli_query($mysqli,
  "SELECT 
    DISTINCT a.segmento
  FROM 
    carteira_acoes ca, acoes a
  WHERE 
    id_carteira = $id_carteira AND a.papel = ca.acao"
);

while (($consulta = mysqli_fetch_assoc($querySegmentos))) {
  $segmentos[] = $consulta['segmento'];
}


?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <title>Carteira - ADS Carteiras</title>

    <link href="assets/dist/css/bootstrap.min.css" rel="stylesheet">    
    <!-- Custom styles for this template -->
    <link href="carteira.css" rel="stylesheet">
  </head>
  <body class="bg-light">
    <?php include_once('header.php'); ?> 
    <main class="mx-5">
      <!-- Nome carteira, editar e excluir -->
      <div class="w-100">
        <div class="row mb-3">
          <div class="col-md-12">
            <div class="h-100 p-5 text-white bg-success bg-gradient rounded-3 row">
              <div class="col-7">
                <h2><?=$descricao?></h2>
              </div>
              <?php if ($tipo_usuario == 1) { ?>
                <div class="col-5 d-flex">
                  <a href="carteira-ativos.php?id=<?=$id_carteira?>" class="me-3"><button class="w-100 btn btn-lg btn-primary">Editar Ativos</button></a>
                  <a href="carteira-edit.php?id=<?=$id_carteira?>" class="me-3"><button class="w-100 btn btn-lg btn-primary">Editar Carteira</button></a>
                  <a href="carteira-excluir.php?id=<?=$id_carteira?>"><button class="w-100 btn btn-lg btn-danger">Excluir</button></a>
                </div>
              <?php } ?>
            </div>
        </div>
      </div>

      <div class="w-100 row">
        <div class="h-100 p-5 row">
          <!-- Gráfico -->
          <div class="col graficoContainer">
            <canvas id="graficoAtivos"></canvas>
          </div>
          <!-- Investimento, Add operação e histórico de operações -->
          <?php if ($tipo_usuario == 1) { ?>
            <div class="col interacoesContainer">
              <div class="interacoes mt-4">
                <div class="mb-4">
                  <a href="investimento.php?id=<?=$id_carteira?>" class="me-3"><button class="w-100 btn btn-lg btn-primary" type="submit">Adicionar investimento</button></a>
                </div>
                <div class="mb-4">
                  <a href="add-operacao.php?id=<?=$id_carteira?>" class="me-3"><button class="w-100 btn btn-lg btn-primary" type="submit">Adicionar operação</button></a>
                </div>
                <div class="mb-4">
                  <a href="historico-operacoes.php?id=<?=$id_carteira?>" class="me-3"><button class="w-100 btn btn-lg btn-primary" type="submit">Histórico de operações</button></a>
                </div>
              </div>
            </div>
          <?php } ?>
        </div>
      </div>

      <!-- Filtro -->
      <h4 class="mb-3 fw-normal">Filtro:</h4>
      <div class="w-100 row mb-5 mt-3">
        <div class="form-floating col">        
          <select id="filtro" class="form-select pt-2">
            <option value="0" <?=($filtro == "" ? "selected" : "")?>>Todos os segmentos</option>
            <?php foreach ($segmentos as $segmento) { ?>
              <option value="<?=$segmento?>" <?=($segmento == $filtro ? "selected" : "")?>><?=$segmento?></option>
            <?php } ?> 
          </select>
        </div>
        <div class="form-floating col-2">        
          <button onclick="filtrarSegmento()" class="w-100 h-100 btn btn-lg btn-success">Filtrar</button>
        </div>
      </div>

      <!-- Tabela -->
      <div class="fw-bold w-100">       
        <div class="row mb-3 bg-success bg-gradient p-3 rounded text-white">
          <div class="col"><span>Ativo</span></div>
          <div class="col"><span>Setor</span></div>
          <div class="col"><span>Quantidade</span></div>
          <div class="col"><span>Cotação atual</span></div>
          <div class="col"><span>Patrimônio atualizado</span></div>
          <div class="col"><span>Participação (%)</span></div>
          <div class="col"><span>Objetivo (%)</span></div>
          <div class="col"><span>Distância do objetivo</span></div>
        </div>

        <?php foreach ($tabela as $ativo => $dados) { ?>
          <div class="row mb-3 bg-secondary bg-gradient p-3 rounded text-white">
            <div class="col"><span class="ativos"><?=$ativo;?></span></div>
            <div class="col"><span><?=$dados["segmento"];?></span></div>
            <div class="col"><span><?=$dados['qtd'];?></span></div>
            <div class="col"><span>R$ <?=number_format((float)$dados['cotacao_atual'], 2, ',', '');?></span></div>
            <div class="col"><span>R$ <?=number_format((float)$dados['patrimonio'], 2, ',', '');?></span></div>
            <div class="col"><span class="participacao"><?=number_format((float)$dados['participacao'], 2, ',', '');?>%</span></div>
            <div class="col"><span><?=number_format((float)$dados['objetivo'], 2, ',', '');;?>%</span></div>
            <div class="col"><span><?=$dados['distancia_objetivo'] > 0 
              ? "+".number_format((float)$dados['distancia_objetivo'], 2, ',', '')
              : number_format((float)$dados['distancia_objetivo'], 2, ',', '');?>%</span></div>
          </div>
        <?php } ?>        
     </div>
    </main>

    <script src="assets/dist/js/bootstrap.bundle.min.js"></script>
    <script src="assets/dist/js/chart.min.js"></script>
    <!-- <script src="https://cdn.jsdelivr.net/npm/chart.js"></script> -->
    <script>
      function filtrarSegmento() {
        let filtro = document.getElementById("filtro");
        let selected = filtro.options[filtro.selectedIndex].value;
        if (selected == 0) {
          window.location.href = "carteira.php?id="+<?=$id_carteira?>;
        } else {
          window.location.href = "carteira.php?id="+<?=$id_carteira?>+"&segmento=" + selected;
        }
      }

      const ctx = document.getElementById('graficoAtivos');

      ativos = [];
      participacoes = [];

      const ativosHTML = document.getElementsByClassName('ativos');
      for (let ativo of ativosHTML) {
        ativos.push(ativo.innerHTML);
      }
      const participacaoHTML = document.getElementsByClassName('participacao');
      for (let participacao of participacaoHTML) {
        participacoes.push(parseFloat(participacao.innerHTML.replace("%", "")));
      }

      const data = {
        labels: ativos,
        datasets: [{
          label: 'Ativos',
          data: participacoes,
          hoverOffset: 4
        }]
      };

      console.log(data);
      new Chart(ctx, {
        type: 'pie',
        data: data,
      });
    </script>
  </body>
</html>
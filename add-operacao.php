<?php 

require_once('session-cliente.php');
require_once('banco.php');

// Verifica se o parametro esta no get
if (!array_key_exists("id", $_GET)) {
  header('location: home.php');
}

$id_carteira = $_GET['id'];
$erroSemAcao = false;
$erroQuantidade = false;

// Verifica se é uma carteira do cliente
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

if ((array_key_exists("lado", $_POST)) && 
    (array_key_exists("acao", $_POST)) &&
    (array_key_exists("quantidade", $_POST))) 
{
  $lado       = $_POST["lado"];
  $acao       = $_POST["acao"];
  $quantidade = $_POST["quantidade"];

  if ($lado == 2) {
   
    $queryQtd = mysqli_query($mysqli, "SELECT * FROM carteira_acoes WHERE id_carteira = $id_carteira and id=$acao");  
    
    if ($queryQtd && (mysqli_num_rows($queryQtd) > 0) && ($result = mysqli_fetch_assoc($queryQtd))) {
      if ($result['quantidade'] < $quantidade) {
          $erroQuantidade = true;
        }
      }
    $quantidade = -$quantidade;
  } 

  if (!$erroQuantidade) {

    $query = mysqli_query($mysqli, 
        "INSERT INTO operacoes (id_carteira, id_acao, lado, quantidade, data)
         VALUES ('$id_carteira', '$acao', '$lado', '$quantidade', NOW())"
      );
  
    
  
    $queryQuantidade = mysqli_query($mysqli, 
      "UPDATE carteira_acoes 
       SET quantidade=(quantidade + $quantidade)
       WHERE id=$acao"
    );
  
    if (($query) and ($queryQuantidade)) {
      header("location: carteira.php?id=" . $id_carteira);
    } else {
      header('location: home.php');
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
    <form action="add-operacao.php?id=<?=$id_carteira?>" method="post">
      <h1 class="h3 mt-3 mb-3 fw-normal">Inserir operação</h1>
      
      <?php if ($erroQuantidade) { ?>
        <div class="p-3 text-white bg-danger bg-gradient rounded-3 mb-2">
          <span>Quantidade de ações inválida!</span>
        </div>
      <?php } ?>
      
      <div class="container"> 
        <div class="row mb-3">
          <div class="form-floating col">        
            <select id="lado" class="form-select pt-2" name="lado">
              <option selected value="1">Compra</option>
              <option value="2">Venda</option>
            </select>
          </div>
        </div>        
        <div class="row mb-3">
          <div class="form-floating col">        
            <select id="acao" class="form-select pt-2" name="acao">
            <?php 
              $queryAcoes = mysqli_query($mysqli, "SELECT * FROM carteira_acoes WHERE id_carteira='$id_carteira'");
              
              if ($queryAcoes && mysqli_num_rows($queryAcoes) > 0) {
                while ($result = mysqli_fetch_assoc($queryAcoes)) {
                  $id = $result['id'];
                  $acao = $result['acao']; ?>     
                  
                  <option value="<?=$id?>"><?=$acao;?></option>
                  
            <?php } } else { 
              $erroSemAcao = true;
            ?>
              <option value="0">Não há nenhuma ação mapeada para a escolha</option>
            <?php } ?>
                
            </select>
          </div>
        </div>        
        <div class="row mb-3">
          <div class="form-floating col">        
            <input type="number" class="form-control" id="quantidade" placeholder="Quantidade" name="quantidade">
            <label for="quantidade">Quantidade</label>
          </div>
          &nbsp&nbsp
        </div>
        <div class="row mb-3">
        </div>
      </div>
      <?php if (!$erroSemAcao) { ?>
        <button class="w-100 btn btn-lg btn-success" type="submit">Confirmar</button>
      <?php } ?>
      <p class="mt-5 mb-3 text-muted">&copy; 2022</p>
    </form>
  </main>
<script src="assets/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

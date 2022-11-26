<?php 
  require_once('banco.php');
  $resposta = [
    'ativos' => [],
    'escolhidos' => []
  ];

  $listAcoes = [];
  $listEscolhidos = [];

  $queryAcoes = mysqli_query($mysqli, "SELECT * FROM acoes ORDER BY papel");

  if ($queryAcoes && mysqli_num_rows($queryAcoes) > 0) {
    while ($result = mysqli_fetch_assoc($queryAcoes)) {
      $listAcoes[] = $result;
    }
  }

  if (array_key_exists("id", $_GET)) {
    $id_carteira = $_GET['id'];
    // Query e consulta aos ativos
    $queryEscolhidos = mysqli_query($mysqli, "SELECT * FROM carteira_acoes WHERE id_carteira = $id_carteira;");
  
    if ($queryEscolhidos && (mysqli_num_rows($queryEscolhidos) > 0)) {
      while ($escolhido = mysqli_fetch_assoc($queryEscolhidos)) {
        $listEscolhidos[] = $escolhido;
      }
    } else {
      header('location: home.php');
    }
  }

  $resposta['ativos'] = $listAcoes;
  $resposta['escolhidos'] = $listEscolhidos;

  echo json_encode($resposta);
?>
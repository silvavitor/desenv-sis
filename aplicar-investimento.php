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
} else {
  header('location: home.php');
}

if ((array_key_exists("acoes", $_POST)) && (array_key_exists("qtds", $_POST)) && (array_key_exists("ativos", $_POST))) {
  $acoes = $_POST["acoes"];
  $qtds = $_POST["qtds"];
  $ativos = $_POST["ativos"];

  for ($i=0; $i < sizeof($acoes); $i++) { 
    $id_acao = $acoes[$i];
    $acao = $ativos[$i];
    $qtd = $qtds[$i];

    $query = mysqli_query($mysqli, 
        "INSERT INTO operacoes (id_carteira, id_acao, lado, quantidade, data)
         VALUES ('$id_carteira', '$id_acao', '1', '$qtd', NOW())"
      );
  
    $queryQuantidade = mysqli_query($mysqli, 
      "UPDATE carteira_acoes 
       SET quantidade=(quantidade + $qtd)
       WHERE acao='$acao'"
    );
  
    if (($query) and ($queryQuantidade)) {
      header("location: carteira.php?id=" . $id_carteira);
    } else {
      header('location: home.php');
    }
  }
} else {
  header("location: investimento.php?id=$id_carteira");
}
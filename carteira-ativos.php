<?php

require_once('session-cliente.php');
require_once('banco.php');

$id_cliente = $_SESSION['id'];

$id_carteira = 0;

$erroPorcentagem = false;
$erroPreenchimento = false;
$erroExistente = false;

if (array_key_exists("id", $_GET)) {
  $id_carteira = $_GET['id'];
} else {
  header('location: home.php');
}

if ((array_key_exists("porcentagem", $_POST)) and (array_key_exists("acoes", $_POST))) {

  $qtdacoes = sizeof($_POST["acoes"]);

  for ($i=0; $i < $qtdacoes; $i++) { 
    if (($_POST["acoes"][$i] == "") or ($_POST["porcentagem"][$i] == "") or (!is_numeric($_POST["porcentagem"][$i]))) {
      $erroPreenchimento = true;
    }

    $acoes[$_POST["acoes"][$i]] = 1;
  }

  if (sizeof($acoes) <> $qtdacoes) {
    $erroPreenchimento = true;
  }
  
  $somatorio = 0;
  if (!$erroPreenchimento) {
    for ($i=0; $i < $qtdacoes; $i++) {   
      $somatorio += $_POST["porcentagem"][$i];
    }
    if ($somatorio <> 100) {
      $erroPorcentagem = true;
    }
  }

  // Se não houve erros
  if ((!$erroPorcentagem) and (!$erroPreenchimento)) {
    // Consulta as acoes existentes
    $acoesExistentes = [];
    $queryAcoesExistentes = mysqli_query($mysqli, "SELECT * FROM carteira_acoes WHERE id_carteira=$id_carteira");
    if ($queryAcoesExistentes && (mysqli_num_rows($queryAcoesExistentes) > 0)) {
      while ($acao = mysqli_fetch_assoc($queryAcoesExistentes)) {
        $acoesExistentes[$acao['acao']] = $acao['quantidade'];
      }
    } 
    
    // Remove as existentes
    $query = mysqli_query($mysqli, "DELETE FROM carteira_acoes WHERE id_carteira=$id_carteira");

    for ($i=0; $i < $qtdacoes; $i++) {
      if (array_key_exists($_POST["acoes"][$i], $acoesExistentes)) {
        $quantidade = $acoesExistentes[$_POST["acoes"][$i]];
      } else {
        $quantidade = 0;
      }
      $acao = $_POST["acoes"][$i];
      $porcentagem = $_POST["porcentagem"][$i];
      $query = mysqli_query($mysqli, 
        "INSERT INTO carteira_acoes (id_carteira, acao, quantidade, porcentagem_objetivo)
        VALUES ('$id_carteira', '$acao', '$quantidade', '$porcentagem')"
      );
    }

    header("location: carteira.php?id=$id_carteira");
  }
}


?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <title>Carteiras - ADS Carteiras</title>

    <link href="assets/dist/css/bootstrap.min.css" rel="stylesheet">    
    <!-- Custom styles for this template -->
    <link href="signin.css" rel="stylesheet">
    <style>
      .form-signin {
        max-width: 500px;
      }
      .form-floating {
        padding-left: 0px;
        padding-right: 0px;
      }
    </style>
  </head>
  <body class="bg-light">
    <?php include_once('header.php'); ?>  
    <main class="form-signin w-100 m-auto">
      <form action="carteira-ativos.php?id=<?=$id_carteira?>" method="post">

      <?php if ($erroPreenchimento) { ?>
        <div class="p-3 text-white bg-danger bg-gradient rounded-3 mb-2">
          <span>Não foi preenchido corretamente todos os campos!</span>
        </div>
      <?php } ?>

      <?php if ($erroPorcentagem) { ?>
        <div class="p-3 text-white bg-danger bg-gradient rounded-3 mb-2">
          <span>Porcentagem total incorreta! (<?=$somatorio?>%)</span>
        </div>
      <?php } ?>

      <div class="row mb-4">
          <h1 class="col-7 h3 mb-3 fw-normal">Editar ativos</h1>
          <button type="button" class="col-5 btn btn-success" onClick="adicionarAtivo()">Adicionar novo ativo</button>
        </div>

        <div class="container">

          <h3 class="h5 mb-3 fw-normal">Ativos</h3>

          <div id="listagem"></div>

          <button class="w-100 btn btn-lg btn-success" type="submit">Finalizar edição de ativos</button>
          <p class="mt-5 mb-3 text-muted">&copy; 2022</p>
        </div>
      </form>
    </main>


    <script src="assets/dist/js/bootstrap.bundle.min.js"></script>
    <script>   
      listaAtivos = [];   
      listaEscolhidos = [];   
      fetch('consulta-ativos.php?id=<?=$id_carteira?>', {
        method: 'GET'
      })
      .then(response => response.json())
      .then(data => {
        listaAtivos = data.ativos;
        listaEscolhidos = data.escolhidos;

        listaEscolhidos.forEach(escolhido => {
          adicionarAtivo(escolhido.acao, escolhido.porcentagem_objetivo);
        });
        console.log(data);
      })
      .catch((error) => {
        console.error(error);
      });

      function adicionarAtivo(ativoSelecionado = '', porcentagemEscolhida = '') {
        const listagem = document.getElementById("listagem");

        const linha = document.createElement("div");
        linha.classList.add("row", "mb-3");

        const divSelect = document.createElement("div");
        divSelect.classList.add("form-floating", "col-5", "mx-1");

        const select = document.createElement("select");
        select.classList.add("form-select", "pt-2");
        select.setAttribute("name", "acoes[]");

        listaAtivos.forEach(ativo => {
          let optionAtivo = document.createElement("option");
          optionAtivo.setAttribute("value", ativo.papel);
          optionAtivo.textContent = ativo.papel;
          if ((ativoSelecionado != '') && (ativo.papel == ativoSelecionado)) {
            optionAtivo.setAttribute("selected", "");
          }
          select.appendChild(optionAtivo);
        });
        
        const divPorcentagem = document.createElement("div");
        divPorcentagem.classList.add("form-floating", "col-5", "mx-1");

        const inputPorcentagem = document.createElement("input");
        inputPorcentagem.classList.add("form-control");
        inputPorcentagem.setAttribute("type", "text");
        inputPorcentagem.setAttribute("name", "porcentagem[]");
        if ((porcentagemEscolhida != '')) {
          inputPorcentagem.setAttribute("value", porcentagemEscolhida);
        }

        const labelPorcentagem = document.createElement("label");
        labelPorcentagem.setAttribute("for", "porcentagem");
        labelPorcentagem.textContent = 'Porcentagem alvo';

        const divExcluir = document.createElement("div");
        divExcluir.classList.add("form-floating", "col-1", "mx-1");

        const buttonExcluir = document.createElement("button");
        buttonExcluir.setAttribute("type", "button");
        buttonExcluir.setAttribute("onClick", "excluirAtivo(this)");
        buttonExcluir.classList.add("btn", "btn-danger", "h-100");
        buttonExcluir.textContent = 'Excluir';

        divSelect.appendChild(select);

        divPorcentagem.appendChild(inputPorcentagem);
        divPorcentagem.appendChild(labelPorcentagem);

        divExcluir.appendChild(buttonExcluir);

        linha.appendChild(divSelect);
        linha.appendChild(divPorcentagem);
        linha.appendChild(divExcluir);

        listagem.appendChild(linha);
      }

      function excluirAtivo(botao) {
        const linha = botao.parentElement.parentElement;
        linha.remove();
      }
    </script>
  </body>
</html>
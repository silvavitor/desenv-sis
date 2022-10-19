<?php

require_once("./banco.php");
$erroEmailJaExiste = false;
$erroRGJaExiste = false;
$erroCamposObrigatorios = false;
$validarCampos = false;

$nome      = '';
$sobrenome = '';
$rg        = '';
$endereco  = '';
$celular   = '';
$email     = '';
$senha     = '';

if ((array_key_exists("nome", $_POST)) && 
    (array_key_exists("sobrenome", $_POST)) &&
    (array_key_exists("rg", $_POST)) &&
    (array_key_exists("endereco", $_POST)) &&
    (array_key_exists("celular", $_POST)) &&
    (array_key_exists("email", $_POST)) &&
    (array_key_exists("senha", $_POST))) 
{
  $nome      = $_POST["nome"];
  $sobrenome = $_POST["sobrenome"];
  $rg        = $_POST["rg"];
  $endereco  = $_POST["endereco"];
  $celular   = $_POST["celular"];
  $email     = $_POST["email"];
  $senha     = $_POST["senha"];
  $validarCampos = true;
}

if (($nome      != '') &&
    ($sobrenome != '') &&
    ($rg        != '') &&
    ($endereco  != '') &&
    ($celular   != '') &&
    ($email     != '') &&
    ($senha     != '')) 
{ 
  $queryEmail = mysqli_query($mysqli,
    "SELECT COUNT(id) as qtd FROM usuario WHERE email='$email'"
  );

  if ($queryEmail && ($result = mysqli_fetch_assoc($queryEmail)) && ($result['qtd'] > 0)) {
    $erroEmailJaExiste = true;
  }

  $queryRG = mysqli_query($mysqli,
    "SELECT COUNT(id) as qtd FROM usuario WHERE rg='$rg'"
  );

  if ($queryRG && ($result = mysqli_fetch_assoc($queryRG)) && ($result['qtd'] > 0)) {
    $erroRGJaExiste = true;
  }

  if (!$erroEmailJaExiste && !$erroRGJaExiste) {
    $query = mysqli_query($mysqli, 
      "INSERT INTO usuario (tipo, nome, sobrenome, rg, endereco, celular, email, senha)
       VALUES ('1', '$nome', '$sobrenome', '$rg', '$endereco', '$celular', '$email', '$senha')"
    );
  }

} else {
  if ($validarCampos) {
    $erroCamposObrigatorios = true;
  }
}

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <title>Registrar-se - ADS Carteiras</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.2/examples/sign-in/">
    <link href="assets/dist/css/bootstrap.min.css" rel="stylesheet">    
    <!-- Custom styles for this template -->
    <link href="signin.css" rel="stylesheet">
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
  <main class="form-signin w-100 m-auto">
    <form action="register.php" method="post">
      <img class="mb-4" src="assets/ifrs.png" alt="" width="75" height="80">
      <h1 class="h3 mb-3 fw-normal">Insira seus dados</h1>
      
      <div class="container">
        <?php if ($erroCamposObrigatorios) { ?>
          <div class="p-3 text-white bg-danger bg-gradient rounded-3 mb-2">
            <span>Preencha todos os campos!</span>
          </div>
        <?php } ?>
        
        <?php if ($erroEmailJaExiste) { ?>
          <div class="p-3 text-white bg-danger bg-gradient rounded-3 mb-2">
            <span>E-mail já cadastrado!</span>
          </div>
        <?php } ?>

        <?php if ($erroRGJaExiste) { ?>
          <div class="p-3 text-white bg-danger bg-gradient rounded-3 mb-2">
            <span>RG já cadastrado!</span>
          </div>
        <?php } ?>
        
        <!-- 
          Nome e sobrenome 
        -->
        <div class="row mb-3">
          <div class="form-floating  col">        
            <input type="text" class="form-control" id="nome" placeholder="Nome" name="nome">
            <label for="nome">Nome</label>
          </div>
          &nbsp&nbsp
          <div class="form-floating col">        
            <input type="text" class="form-control" id="sobrenome" placeholder="Sobrenome" name="sobrenome">
            <label for="sobrenome">Sobrenome</label>
          </div>
        </div>
        <!-- 
          RG e CPF 
        -->
        <div class="row mb-3">
          <div class="form-floating col">        
            <input type="text" class="form-control" id="rg" placeholder="rg" name="rg">
            <label for="rg">RG</label>
          </div>
        </div>
        <!-- 
          Endereço e Celular
        -->
        <div class="row mb-3">
          <div class="form-floating col">        
            <input type="text" class="form-control" id="endereco" placeholder="endereco" name="endereco">
            <label for="endereco">Endereco Completo</label>
          </div>
          &nbsp&nbsp
          <div class="form-floating col">        
            <input type="text" class="form-control" id="celular" placeholder="celular" name="celular">
            <label for="celular">Celular</label>
          </div>
        </div>
        <!-- 
          Email e Senha
        -->
        <div class="row mb-3">
          <div class="form-floating col">        
            <input type="text" class="form-control" id="email" placeholder="email" name="email">
            <label for="email">E-mail</label>
          </div>
          &nbsp&nbsp
          <div class="form-floating col">        
            <input type="password" class="form-control" id="senha" placeholder="senha" name="senha">
            <label for="Senha">Senha</label>
          </div>
        </div>
      </div>

      <button class="w-100 btn btn-lg btn-success" type="submit">Cadastrar conta</button>
      <p class="mt-5 mb-3 text-muted">&copy; 2022</p>
    </form>
  </main>
</body>
</html>

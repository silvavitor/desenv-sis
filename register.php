<?php
session_start();

if (!(array_key_exists("id_token", $_SESSION) and $_SESSION['id_token'] <> '')) {
  header('location: register-token.php');
}

require_once("./banco.php");
$erroEmailJaExiste = false;
$erroCamposObrigatorios = false;
$erroDesconhecido = false;
$validarCampos = false;
$erroEmailSecJaExiste = false;
$erroEmailsIguais = false;


$nome      = '';
$emailSec  = '';
$email     = '';
$senha     = '';
$id_token  = $_SESSION['id_token'];

if ((array_key_exists("nome", $_POST)) && 
    (array_key_exists("emailSec", $_POST)) &&
    (array_key_exists("email", $_POST)) &&
    (array_key_exists("senha", $_POST))) 
{
  $nome      = $_POST["nome"];
  $emailSec = $_POST["emailSec"];
  $email     = $_POST["email"];
  $senha     = $_POST["senha"];
  $validarCampos = true;
}

if (($nome      != '') &&
    ($emailSec != '') &&
    ($email     != '') &&
    ($senha     != '')) 
{ 
  $queryEmail = mysqli_query($mysqli,
  "SELECT COUNT(id) as qtd FROM usuario WHERE email='$email'"
);

if ($queryEmail && ($result = mysqli_fetch_assoc($queryEmail)) && ($result['qtd'] > 0)) {
  $erroEmailJaExiste = true;
}

$queryEmailSecEmail = mysqli_query($mysqli,
  "SELECT COUNT(id) as qtd FROM usuario WHERE email='$emailSec'"
);

if ($queryEmailSecEmail && ($result = mysqli_fetch_assoc($queryEmailSecEmail)) && ($result['qtd'] > 0)) {
$erroEmailSecJaExiste = true;
}

$queryEmailEmailSec = mysqli_query($mysqli,
  "SELECT COUNT(id) as qtd FROM usuario WHERE emailSec='$email'"
);

if ($queryEmailEmailSec && ($result = mysqli_fetch_assoc($queryEmailEmailSec)) && ($result['qtd'] > 0)) {
  $erroEmailJaExiste = true;
}

$queryEmailSecEmailSec = mysqli_query($mysqli,
"SELECT COUNT(id) as qtd FROM usuario WHERE emailSec='$emailSec'"
);

if ($queryEmailSecEmailSec && ($result = mysqli_fetch_assoc($queryEmailSecEmailSec)) && ($result['qtd'] > 0)) {
$erroEmailSecJaExiste = true;
}

if ($email == $emailSec){
  $erroEmailsIguais = true;
}



  if ((!$erroEmailJaExiste) && (!$erroEmailSecJaExiste) && (!$erroEmailsIguais)) {
    $query = mysqli_query($mysqli, 
      "INSERT INTO usuario (tipo, nome, emailSec, email, senha, id_token)
       VALUES ('1', '$nome', '$emailSec', '$email', '$senha', $id_token)"
    );

    if ($query) {
      $id = mysqli_insert_id($mysqli);
      
      $queryUpdate = mysqli_query($mysqli,
        "UPDATE token SET usada=NOW() WHERE id=$id_token");
      
      $_SESSION['id'] = $id;
      $_SESSION['tipo_usuario'] = '1';
      
      // limpa a sessao
      $_SESSION['id_token'] = '';

      header('location: home.php');
    } else {
      $erroDesconhecido = true;
    }
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
        <?php if ($erroDesconhecido) { ?>
          <div class="p-3 text-white bg-danger bg-gradient rounded-3 mb-2">
            <span>Erro desconhecido!</span>
          </div>
        <?php } ?>

        <?php if ($erroEmailSecJaExiste) { ?>
          <div class="p-3 text-white bg-danger bg-gradient rounded-3 mb-2">
            <span>Email secundário já existe!</span>
          </div>
        <?php } ?>

        <?php if ($erroEmailsIguais) { ?>
          <div class="p-3 text-white bg-danger bg-gradient rounded-3 mb-2">
            <span>Email e email secundário são iguais!</span>
          </div>
        <?php } ?>

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

        
        &nbsp&nbsp
        <!-- 
          Nome
        -->
        <div class="row mb-3">
          <div class="form-floating col-12">        
            <input type="text" class="form-control" id="nome" placeholder="Nome" name="nome">
            <label for="nome">Nome</label>
          </div>
          &nbsp&nbsp
        </div>
        <!-- 
          Email
        -->
        <div class="row mb-3">
          <div class="form-floating col-12">        
            <input type="email" class="form-control" id="email" placeholder="email" name="email">
            <label for="email">E-mail</label>
          </div>
          &nbsp&nbsp
        </div>
        <!-- 
          email alternativo
        -->
        <div class="row mb-3">
          <div class="form-floating col-12">        
            <input type="email" class="form-control" id="emailSec" placeholder="emailSec" name="emailSec">
            <label for="emailSec">E-mail alternativo</label>
          </div>
        </div>
        &nbsp&nbsp
        <!-- 
          senha
        -->
        <div class="row mb-3">
          <div class="form-floating col-12">        
            <input type="password" class="form-control" id="senha" placeholder="senha" name="senha">
            <label for="Senha">Senha</label>
          </div>
        </div>
      </div>
      &nbsp&nbsp

      <button class="w-100 btn btn-lg btn-success" type="submit">Cadastrar conta</button>
      <p class="mt-5 mb-3 text-muted">&copy; 2022</p>
    </form>
  </main>
</body>
</html>

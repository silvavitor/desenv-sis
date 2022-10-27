<?php
session_start();

if (!array_key_exists("id", $_SESSION)) {
  session_destroy();
  header('location: index.php');
}

if (!array_key_exists("tipo_usuario", $_SESSION)) {
  session_destroy();
  header('location: index.php');
} else if ($_SESSION['tipo_usuario'] <> '2') {
  header('location: home.php');
}

?>
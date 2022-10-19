<?php
session_start();

if (!array_key_exists("id", $_SESSION)) {
  session_abort();
  header('location: index.php');
}

if (array_key_exists("logout", $_POST)) {
  session_abort();
}

?>
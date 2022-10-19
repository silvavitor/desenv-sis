<?php
session_start();



if (array_key_exists("logout", $_POST)) {
  session_abort();
}

?>
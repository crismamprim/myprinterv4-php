<?php

session_start();
session_unset(); // ou unset($_SESSION['nomeDaVariavelDeSessao']);
session_destroy();

header("Location: login.php");

?>
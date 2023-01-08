<?php

if(!isset($_SESSION)) {
    session_start();
}

session_destroy();
unset($_SESSION['idcliente']);
unset($_SESSION['nomecliente']);
unset($_SESSION['logincliente']);
unset($_SESSION['senhacliente']);
header("Location: index.php");
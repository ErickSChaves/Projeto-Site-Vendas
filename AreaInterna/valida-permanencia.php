<?php
    if( ($_SESSION['login-session'] != 'adm') || ($_SESSION['senha-session'] != '1212') ){
        header("Location: ../areaExterna/index.php");
    }
?>



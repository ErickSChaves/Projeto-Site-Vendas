<?php
    $login = $_POST['txtLogin'];
    $senha = $_POST['txtSenha'];


    if( ($login == 'adm') && ($senha == '1212') ){
        //criar a sessão, guardar os dados e redirecionar para a index-restrita.php
        header("Location: area-adm.php");
        session_start(); //tem precedência de cabeçalho, deve ser a 1ª linha do seu bloco
        $_SESSION['login-session'] = $login;
        $_SESSION['senha-session'] = $senha;
    }
    else{
        header("Location: ../areaExterna/index.php");
    }

?>

<?php

    require_once '../model/Categoria.php';
    require_once '../dao/CategoriaDAO.php';

    $categoria = new Categoria();
    $categoria->setidCategoria($_GET['idCategoria']);
    $categoria->setnomeCategoria($_POST['nomeCategoria']);

    $nomeCategoria = $categoria->getnomeCategoria();

    if($nomeCategoria){
        
        echo(CategoriaDao::atualizar($categoria));

        header("location: ../AreaInterna/form_Categoria.php");
        $_SESSION['aviso'] = 'Categoria Editada com sucesso';
        $_SESSION['tipo'] = 'sucesso';
        
    }else{

        header("location: ../AreaInterna/form_Categoria.php");
        $_SESSION['aviso'] = 'Digite um nome para um novo nome para a categoria';
        $_SESSION['tipo'] = 'error';
    }
?>
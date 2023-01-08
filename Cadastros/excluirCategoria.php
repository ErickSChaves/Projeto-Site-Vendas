<?php

    require_once '../model/Categoria.php';
    require_once '../dao/CategoriaDAO.php';

    $categoria = new Categoria();
    $categoria->setidCategoria($_GET['idCategoria']);

   
        
        CategoriaDao::Excluir($categoria);

        header("location: ../AreaInterna/form_Categoria.php");
      
        
   
?>
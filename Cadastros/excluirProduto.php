<?php

    require_once '../model/Produto.php';
    require_once '../dao/ProdutoDao.php';

    $produto = new Produto();
    $produto->setIdProduto($_GET['idProduto']);

   
        
        echo(ProdutoDao::Excluir($produto));

        header("location: ../AreaInterna/form_Produto.php");
      
        
   
?>
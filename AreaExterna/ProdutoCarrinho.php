<?php

   
require_once("../model/ItemVenda.php");
require_once("../model/Produto.php");
require_once("../dao/ProdutoDAO.php");
require_once("../model/conexao.php");

    header("location: index.php");

    $produto = new Produto();
    $produto->setIdProduto($_GET['idProduto']);
    $produto = ProdutoDao::consultarDados($produto);

    $item = new ItemVenda();
    
  
     $item->setQtde(1);
    

    $item->setProduto($produto);
    $item->setSubtotal($item->getQtde() * $item->getProduto()->getPrecoProduto());

    if (isset($_COOKIE["carrinho"])){
        $carrinhorecebido =  $_COOKIE["carrinho"]; 
        $carrinhoAtual = unserialize($carrinhorecebido);

        $carrinhoAtual[] = $item;
        $carrinhocookie = serialize($carrinhoAtual);
        setcookie('carrinho', $carrinhocookie);
    }

    else{
        $carrinho = array();

        $carrinho[] = $item;
        
        $carrinhocookie = serialize($carrinho);
        setcookie('carrinho', $carrinhocookie);

        // echo '<pre>';
        //     print_r($carrinho);
        // echo '</pre>';
    }


?>
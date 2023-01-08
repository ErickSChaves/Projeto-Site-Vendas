<?php

    require_once("../model/Cliente.php");
    require_once("../model/conexao.php");
    require_once("../model/Venda.php");
    require_once("../model/ItemVenda.php");
    require_once("../dao/VendaDAO.php");
    require_once("../dao/ItemVendaDAO.php");


    header("Location: index.php");
    session_start();

    
    if (isset($_COOKIE["carrinho"])){
        $carrinhorecebido =  $_COOKIE["carrinho"]; 
        $carrinhoAtual = unserialize($carrinhorecebido);

        $cliente = new Cliente();
        $cliente->setIdCliente($_SESSION['idCliente']);        
        $venda = new Venda();
        $venda->setCliente($cliente);
        $venda->setData(date('Y-m-d'));
        $venda->setListaItem($carrinhoAtual);
        $venda->setStatus(1);
        $venda->setValorTotal($_GET['valorTotalVenda']);

        VendaDao::cadastrar($venda);


        $venda->setId(VendaDao::consultarId($venda));


        foreach($venda->getListaItem() as $itemvenda){
            ItemVendaDao::cadastrar($itemvenda, $venda->getId());
        }

        unset($_COOKIE['carrinho']);
        setcookie('carrinho');

    }
    else{
        header("Location: carrinho.php");
    }
    
?>
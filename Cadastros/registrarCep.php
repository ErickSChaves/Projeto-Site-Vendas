<?php
session_start();
    require_once('../model/Cliente.php');
    require_once('../controller/clienteController.php');
    require_once("../dao/ClienteDAO.php");
    require_once("../model/conexao.php");
    require_once("../model/config.php");

    $cliente = new Cliente;
    $clienteController = new clienteController();
    $conexao = new Conexao;

        $cliente->setBairroCliente($_POST['bairro']);
        $cliente->setLogradouroCliente($_POST['Logradouro']);
        $cliente->setCepCliente($_POST['cep']);
        $cliente->setCidadeCliente($_POST['cidade']);
        $cliente->setUfCliente($_POST['uf']);
        $cliente->setNumlogCliente($_POST['numero']); 

        $cliente->setIdCliente($_SESSION['idCliente']);
      
            ClienteDao::CadastrarCep($cliente);
             header("location:  ../AreaExterna/carrinho.php");

           
            
?>
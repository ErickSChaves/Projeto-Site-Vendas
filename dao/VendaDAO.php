<?php
    
    require_once("../model/Venda.php");
    require_once("../model/Venda.php");
    require_once("../model/Cliente.php");
    require_once("../model/conexao.php");
    
    class VendaDao{

        public static function cadastrar($venda){
            $conexao = Conexao::conectar();

            $queryInsert = "INSERT INTO tbvenda(dataVenda, valorTotalVenda, statusVenda, idCliente)
                             VALUES(?,?,?,?)";
            
            $prepareStatement = $conexao->prepare($queryInsert);
            
            $prepareStatement->bindValue(1, $venda->getData());
            $prepareStatement->bindValue(2, $venda->getValorTotal());
            $prepareStatement->bindValue(3, $venda->getStatus());
            $prepareStatement->bindValue(4, $venda->getCliente()->getIdCliente());

            $prepareStatement->execute();
            return 'Cadastrou';
        }

        public static function consultarId($venda){
            $conexao = Conexao::conectar();
            $querySelect = "SELECT MAX(idVenda) AS maior FROM tbvenda";
            $resultado = $conexao->query($querySelect);
            $lista = $resultado->fetchAll();
            foreach ($lista as $venda)
            return $venda['maior'];   
        }

        public static function listar(){
            $conexao = Conexao::conectar();
            $querySelect = "SELECT idvenda, DATE_FORMAT(dataVenda, '%d/%m/%Y') AS dataVenda, 
                            valorTotalVenda, statusVenda, v.idCliente, nomeCliente 
                            FROM tbvenda v INNER JOIN tbcliente c 
                            ON v.idCliente = c.idCliente 
                            ORDER BY dataVenda DESC";
            $resultado = $conexao->query($querySelect);
            $lista = $resultado->fetchAll();
            return $lista;   
        }

        public static function contar(){
            $conexao = Conexao::conectar();
            $querySelect = "SELECT COUNT(idVenda) AS qtde FROM tbvenda";
            $resultado = $conexao->query($querySelect);
            $num = $resultado->fetchAll();
            foreach ($num as $n)
                return $n['qtde'];   
        }

        public static function contarClienteVenda(){
            $conexao = Conexao::conectar();
            $querySelect = "SELECT idCliente, COUNT(idVenda) AS qtde FROM tbvenda GROUP BY idCliente ORDER BY qtde DESC";
            $resultado = $conexao->query($querySelect);
            $lista = $resultado->fetchAll();
            foreach ($lista as $cliente)
                return $cliente['idCliente'];   
        }

        public static function atualizarStatus($venda){
            $conexao = Conexao::conectar();

            $queryInsert = "UPDATE tbvenda 
                            SET statusVenda = ?
                            WHERE idVenda = ?";
            
            $prepareStatement = $conexao->prepare($queryInsert);
            
            $prepareStatement->bindValue(1, $venda->getStatus());
            $prepareStatement->bindValue(2, $venda->getId());

            $prepareStatement->execute();
            return 'Atualizou';
        }

        public static function contarPedido(){
            $conexao = Conexao::conectar();
            $querySelect = "SELECT COUNT(idVenda) AS qtde FROM tbvenda WHERE statusVenda = 1";
            $resultado = $conexao->query($querySelect);
            $num = $resultado->fetchAll();
            foreach ($num as $n)
                return $n['qtde'];   
        }

        public static function listarPorCliente($cliente){
            $conexao = Conexao::conectar();
            $querySelect = "SELECT idVenda, DATE_FORMAT(dataVenda, '%d/%m/%Y') AS dataVenda, 
                            valorTotalVenda, statusVenda, v.idCliente, nomeCliente 
                            FROM tbvenda v INNER JOIN tbcliente c 
                            ON v.idCliente = c.idCliente 
                            WHERE v.idCliente = ".$cliente->getIdCliente()."
                            ORDER BY dataVenda DESC";
            $resultado = $conexao->query($querySelect);
            $lista = $resultado->fetchAll();
            return $lista;   
        }

    }
?>
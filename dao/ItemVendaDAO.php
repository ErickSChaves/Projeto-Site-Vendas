<?php
    
    require_once("../model/ItemVenda.php");
    require_once("../model/conexao.php");
    
    class ItemVendaDao{

        public static function cadastrar($item, $idvenda){
            $conexao = Conexao::conectar();

            $queryInsert = "INSERT INTO tbitemvenda(idVenda, idProduto, quantItemVenda, subTotalItemVenda)
                             VALUES(?,?,?,?)";
            
            $prepareStatement = $conexao->prepare($queryInsert);
            
            $prepareStatement->bindValue(1, $idvenda);
            $prepareStatement->bindValue(2, $item->getProduto()->getIdProduto());
            $prepareStatement->bindValue(3, $item->getQtde());
            $prepareStatement->bindValue(4, $item->getSubTotal());

            $prepareStatement->execute();
            return 'Cadastrou';
        }

        public static function listar(){
            $conexao = Conexao::conectar();
            $querySelect = "SELECT idVenda, idProduto, quantItemVenda, subTotalItemVenda FROM tbitemvenda";
            $resultado = $conexao->query($querySelect);
            $lista = $resultado->fetchAll();
            return $lista;   
        }

        public static function contar(){
            // $conexao = Conexao::conectar();
            // $querySelect = "SELECT COUNT(idcliente) AS qtde FROM tbcliente";
            // $resultado = $conexao->query($querySelect);
            // $num = $resultado->fetchAll();
            // foreach ($num as $n)
            //     return $n['qtde'];   
        }

        public static function contarProdutoVenda(){
            $conexao = Conexao::conectar();
            $querySelect = "SELECT idProduto, COUNT(idItemVenda) AS qtde FROM tbitemvenda GROUP BY idProduto ORDER BY qtde DESC";
            $resultado = $conexao->query($querySelect);
            $lista = $resultado->fetchAll();
            foreach ($lista as $cliente)
                return $cliente['idProduto'];   
        }
    }
?>
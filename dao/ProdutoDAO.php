
<?php
    require_once("../model/Produto.php");
    require_once("../model/conexao.php");

    class ProdutoDao{

        public static function cadastrar($produto){
            $conexao = Conexao::conectar();

            $queryInsert = "INSERT INTO tbproduto(nomeProduto, precoProduto, idCategoria)
                            VALUES(?,?,?)";
            
            $prepareStatement = $conexao->prepare($queryInsert);
            
            $prepareStatement->bindValue(1,$produto->getNomeProduto());
            $prepareStatement->bindValue(2,$produto->getPrecoProduto());
            $prepareStatement->bindValue(3,$produto->getCategoria()->getidCategoria());    

            $prepareStatement->execute();
            return 'Cadastrou';

        }
    
        public static function consultarId($produto){
            $conexao = Conexao::conectar();
            $querySelect = "SELECT idProduto FROM tbproduto WHERE nomeProduto LIKE '".$produto->getNomeProduto()."'";
            $resultado = $conexao->query($querySelect);
            $lista = $resultado->fetchAll();
            foreach ($lista as $produto)
                $id = $produto['idProduto'];
            return $id;   
        }

        public static function atualizarFoto($produto){ 
          $conexao = Conexao::conectar();

            $queryInsert = "UPDATE tbproduto
                            SET fotoProduto = ?
                            WHERE idProduto = ?";
            
            $prepareStatement = $conexao->prepare($queryInsert);
            
            $prepareStatement->bindValue(1, $produto->getFotoProduto());
            $prepareStatement->bindValue(2, $produto->getIdProduto());

            $prepareStatement->execute();
            return 'Atualizou';
        }

        public static function listar(){
            $conexao = Conexao::conectar();
            $querySelect = "SELECT idProduto, nomeProduto, precoProduto, fotoProduto, nomeCategoria 
                            FROM tbproduto INNER JOIN tbcategoria ON tbproduto.idCategoria = tbcategoria.idCategoria";
            $resultado = $conexao->query($querySelect);
            $lista = $resultado->fetchAll();
            return $lista;  
        }

        public static function listar2($produto){
            $conexao = Conexao::conectar();
            $querySelect = "SELECT idProduto, nomeProduto, fotoProduto, precoProduto, nomeCategoria
            FROM tbproduto INNER JOIN tbcategoria ON tbproduto.idCategoria = tbcategoria.idCategoria WHERE idProduto = ?";

            $prepare = $conexao->prepare($querySelect);
            $prepare->bindValue(1, $produto->getIdProduto());
            $prepare->execute();
            $lista = $prepare->fetch(PDO::FETCH_ASSOC);
            return $lista;
        }

        public static function atualizar($produto) {
            $conexao = Conexao::conectar();
            $queryUpdate = "UPDATE tbproduto SET NomeProduto = ?, PrecoProduto = ?, nomeCategoria WHERE idProduto = ?";
            $queryUpdate = $conexao->prepare($queryUpdate);
            $queryUpdate->bindValue(4, $produto->getIdProduto());
            $queryUpdate->bindValue(1, $produto->getNomeProduto());
            $queryUpdate->bindValue(2, $produto->getFotoProduto());
            $queryUpdate->bindValue(3, $produto->getPrecoProduto());
            $queryUpdate->execute();
        }

        public static function Excluir($produto) {
            $conexao = Conexao::conectar();
            $querySelect = "DELETE  from tbproduto WHERE idProduto = ?";
            $querySelect = $conexao->prepare($querySelect);
            $querySelect->bindValue(1, $produto->getIdProduto());
            $querySelect->execute();
        }

        public static function consultarDados($produto){
            $conexao = Conexao::conectar();
            $querySelect = "SELECT NomeProduto, PrecoProduto, fotoProduto
                             FROM tbproduto WHERE idProduto = ".$produto->getIdProduto();
            $resultado = $conexao->query($querySelect);
            $lista = $resultado->fetchAll();
            foreach ($lista as $p){
                $produto->setNomeProduto($p['NomeProduto']);
                $produto->setPrecoProduto($p['PrecoProduto']);
                $produto->setFotoProduto($p['fotoProduto']);
            }
            return $produto;   
        }

        public static function contar(){
            $conexao = Conexao::conectar();
            $querySelect = "SELECT COUNT(idProduto) AS qtde FROM tbproduto";
            $resultado = $conexao->query($querySelect);
            $num = $resultado->fetchAll();
            foreach ($num as $n)
                return $n['qtde'];   
        }

        public static function listarIndex(){
            $conexao = Conexao::conectar();
            $querySelect = "SELECT idProduto, NomeProduto, PrecoProduto, fotoProduto, nomeCategoria 
                            FROM tbproduto INNER JOIN tbcategoria ON tbproduto.idCategoria = tbcategoria.idCategoria";
            $resultado = $conexao->query($querySelect);
            $lista = $resultado->fetchAll();
            return $lista;   
        }

    }
    ?>
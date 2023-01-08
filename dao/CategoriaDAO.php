
<?php
    require_once("../model/Categoria.php");
    require_once("../model/conexao.php");

    class CategoriaDao{

        public static function cadastrar($categoria){
            $conexao = Conexao::conectar();

            $queryInsert = "INSERT INTO tbcategoria(nomeCategoria)
                            VALUES(?)";
            
            $prepareStatement = $conexao->prepare($queryInsert);
            
            $prepareStatement->bindValue(1, $categoria->getnomeCategoria());

            $prepareStatement->execute();
            return 'Cadastrou';

        }

        public static function listar(){
            $conexao = Conexao::conectar();
            $querySelect = "SELECT idCategoria, nomeCategoria FROM tbcategoria";
            $resultado = $conexao->query($querySelect);
            $lista = $resultado->fetchAll();
            return $lista;   
        }

        public static function listar2($categoria){
            $conexao = Conexao::conectar();
            $querySelect = "SELECT idCategoria, nomeCategoria FROM tbcategoria WHERE  idCategoria = ?";
            $prepare = $conexao->prepare($querySelect);

            $prepare->bindValue(1, $categoria->getidCategoria());
            $prepare->execute();
            $lista = $prepare->fetch(PDO::FETCH_ASSOC);
            return $lista;
        }

        public static function atualizar($categoria) {
            $conexao = Conexao::conectar();
            $queryUpdate = "UPDATE tbcategoria SET nomeCategoria = ? WHERE idCategoria = ?";
            $queryUpdate = $conexao->prepare($queryUpdate);
            $queryUpdate->bindValue(1, $categoria->getnomeCategoria());
            $queryUpdate->bindValue(2, $categoria->getidCategoria());
            $queryUpdate->execute();
        }

        public static function Excluir($categoria) {
            $conexao = Conexao::conectar();
            $querySelect = "DELETE from tbcategoria WHERE idCategoria = ?";
            $querySelect = $conexao->prepare($querySelect);
            $querySelect->bindValue(1, $categoria->getidCategoria());
            $querySelect->execute();
        }
    }
    ?>
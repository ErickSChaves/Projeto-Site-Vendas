<?php
    
    require_once("../model/Cliente.php");
    require_once("../model/conexao.php");

    class ClienteDao{

        public static function cadastrar($cliente){
            $conexao = Conexao::conectar();

            $queryInsert = "INSERT INTO tbcliente(nomeCliente, cpfCliente, emailCliente, senhaCliente)
                            VALUES(?,?,?,?)";
            
            $prepareStatement = $conexao->prepare($queryInsert);
            
            $prepareStatement->bindValue(1, $cliente->getNomeCliente());
            $prepareStatement->bindValue(2, $cliente->getCpfCliente());
            $prepareStatement->bindValue(3, $cliente->getEmailCliente());
            $prepareStatement->bindValue(4, $cliente->getSenhaCliente());        

            $prepareStatement->execute();

        }

        public static function listar(){
            $conexao = Conexao::conectar();
            $querySelect = "SELECT idCliente, nomeCliente, cpfCliente, emailCliente FROM tbcliente";
            $resultado = $conexao->query($querySelect);
            $lista = $resultado->fetchAll();
            return $lista;   
        }

        public static function ConsultarLogin($cliente){
            $conexao = Conexao::conectar();
            $querySelect = "SELECT idCliente, nomeCliente, emailCliente, senhaCliente  FROM tbcliente WHERE emailCliente LIKE '".$cliente->getEmailCliente()."'";
            $resultado = $conexao->query($querySelect);
            $consultarLogin = $resultado->fetchAll();
            foreach ($consultarLogin as $c)
                $cliente->setIdCliente($c['idCliente']);
                $cliente->setNomeCliente($c['nomeCliente']);
                $cliente->setEmailCliente($c['emailCliente']);
                $cliente->setSenhaCliente($c['senhaCliente']);
            return $consultarLogin; 
        }  


        public static function atualizar($cliente) {
            $conexao = Conexao::conectar();
            $queryUpdate = "UPDATE tbcliente SET nomeCliente = ?, emailCliente = ?, senhaCliente = ? WHERE idCliente = ?";
            $queryUpdate = $conexao->prepare($queryUpdate);
            $queryUpdate->bindValue(1, $cliente->getNomeCliente());
            $queryUpdate->bindValue(2, $cliente->getEmailCliente());
            $queryUpdate->bindValue(3, $cliente->getSenhaCliente());
            $queryUpdate->execute();
        }

        public static function CadastrarCep($cliente) {
            $conexao = Conexao::conectar();
            $queryUpdate = "UPDATE tbcliente SET cepCliente = ?, bairroCliente = ?, logradouroCliente = ?, numLogCliente = ?,
             cidadeCliente = ?, ufCliente = ?   WHERE idCliente = ?";
            $queryUpdate = $conexao->prepare($queryUpdate);
            $queryUpdate->bindValue(7, $cliente->getIdCliente());
            $queryUpdate->bindValue(1, $cliente->getCepCliente());
            $queryUpdate->bindValue(2, $cliente->getBairroCliente());
            $queryUpdate->bindValue(3, $cliente->getLogradouroCliente());
            $queryUpdate->bindValue(4, $cliente->getNumlogCliente());
            $queryUpdate->bindValue(5, $cliente->getCidadeCliente());
            $queryUpdate->bindValue(6, $cliente->getUfCliente());
            $queryUpdate->execute();
        }

        public static function consultarCep($cliente){
            $conexao = Conexao::conectar();
            $querySelect = "SELECT cepCliente FROM tbcliente WHERE idCliente = '".$cliente->getIdCliente()."'";
            $resultado = $conexao->query($querySelect);
            $lista = $resultado->fetchAll();
            foreach ($lista as $cliente)
                $cep = $cliente['cepCliente'];
            return $cep;   
        }

    }
 

        
?>
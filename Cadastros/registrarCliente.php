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

        $cliente->setNomeCliente($_POST['nome']);
        $cliente->setEmailCliente($_POST['email']);
        $cliente->setCpfCliente($_POST['cpf']);
        $cliente->setSenhaCliente($_POST['password']); 
        $confirmaSenha  = filter_input(INPUT_POST, "confirmaPassword");

        //confirma que esta tudo sendo escrito
        if($cliente->getNomeCliente() && $cliente->getEmailCliente() && $cliente->getCpfCliente() && $cliente->getSenhaCliente()){

            //confirma que as 2 senhas sao iguais
            if($cliente->getSenhaCliente() == $confirmaSenha){

                $email = $cliente->getEmailCliente();
                
                $sql = "SELECT * FROM tbcliente WHERE emailCliente = '$email'";
                $r = $cone->query($sql); 
                
                    //verifica se o email do usuario ja esta cadastrado
                    if(mysqli_num_rows($r) < 1){

                        $cpf = $cliente->getCpfCliente();
                        //verifica se o cpf do usuario e valido
                        if($clienteController->validaCpf($cpf)==true){

                        $sqt = "SELECT * FROM tbcliente WHERE cpfCliente = '$cpf'";
                        $re = $cone->query($sqt); 
                        
                        //verifica se o cpf do usuario ja esta cadastrado
                            if(mysqli_num_rows($re) < 1){
                                
                                header("location: ../AreaExterna/login.php");
                                $_SESSION['aviso'] = 'Usuario cadastrado com sucesso';
                                $_SESSION['tipo'] = 'sucesso';
                                echo(ClienteDao::cadastrar($cliente));

                            }else{
    
                            header("location: ../AreaExterna/registrar.php");
                            $_SESSION['aviso'] = 'CPF ja cadastrado';
                            $_SESSION['tipo'] = 'error';
                            
                            }  
    
                    }else{
                        
                        header("location: ../AreaExterna/registrar.php");
                        $_SESSION['aviso'] = 'CPF digitado nao e valido';
                        $_SESSION['tipo'] = 'error';
                    }         
    
                }else{
                    
                    header("location: ../AreaExterna/registrar.php");
                    $_SESSION['aviso'] = 'E-mail ja cadastrado ';
                    $_SESSION['tipo'] = 'error';
                }

             }else{
                header("location: ../AreaExterna/registrar.php");
                $_SESSION['aviso'] = 'As duas senhas tem que ser iguais';
                $_SESSION['tipo'] = 'error';
             }
                
        }else{
            header("location: ../AreaExterna/registrar.php");
            $_SESSION['aviso'] = 'Preencha os campos corretamente';
            $_SESSION['tipo'] = 'error';
        }

?>
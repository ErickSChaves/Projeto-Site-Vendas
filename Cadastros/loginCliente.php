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


        $cliente->setEmailCliente($_POST['email']);
        $cliente->setSenhaCliente($_POST['password']);
        $email = $cliente->getEmailCliente();
        $senha = $cliente->getSenhaCliente();
        $nome = $cliente->getNomeCliente();


            //confirma que esta tudo sendo escrito
            if($cliente->getEmailCliente() && $cliente->getSenhaCliente()){


                $sql = "SELECT * FROM tbcliente WHERE emailCliente = '$email' and senhaCliente = '$senha'";
                $r = $cone->query($sql); 

                if(mysqli_num_rows($r) < 1){

                    header("location: ../AreaExterna/login.php");
                    $_SESSION['aviso'] = 'Voce digitou alguma informação incorretamente';
                    $_SESSION['tipo'] = 'error';

                }else{

                     try {

                         $consultacliente = ClienteDao::ConsultarLogin($cliente);


                         if($consultacliente == 0){
                                header("location: ../AreaExterna/login.php");
                        }

                        else{

                            foreach($consultacliente as $c){
                                header("location: ../AreaExterna/index.php");
                                session_start();
                                $_SESSION['idCliente']    =   $c['idCliente'];
                                $_SESSION['nomecliente']  =   $c['nomeCliente'];
                                $_SESSION['logincliente'] =   $c['emailCliente'];
                                $_SESSION['senhacliente'] =   $c['senhaCliente'];
                            }
                        }
                               

                                  
                                       

                    } catch(Exception $e) {
                        echo '<pre>';
                            print_r($e);
                        echo '</pre>';
                        echo $e->getMessage();
                    }

                   
                }
                
            }else{

                header("location: ../AreaExterna/login.php");
                $_SESSION['aviso'] = 'Preencha os campos corretamente';
                $_SESSION['tipo'] = 'error';
            }

?>
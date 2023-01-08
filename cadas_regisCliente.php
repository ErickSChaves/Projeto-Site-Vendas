<?php
session_start();
    require_once('model/Cliente.php');
    require_once('controller/clienteController.php');
    require_once('model/Produto.php');
    require_once('globals.php');
    require_once('model/Categoria.php');
    require_once("dao/ClienteDAO.php");
    require_once("dao/CategoriaDAO.php");
    require_once("dao/ProdutoDAO.php");
    require_once("model/conexao.php");
    require_once("config.php");

    $type = filter_input(INPUT_POST, "type");
    $cliente = new Cliente;
    $produto = new Produto;
    $clienteController = new clienteController();
    $categoria = new Categoria;
    $conexao = new Conexao;
    
    if($type === "registro"){

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
                                
                                header("location: login.php");
                                $_SESSION['aviso'] = 'Usuario cadastrado com sucesso';
                                $_SESSION['tipo'] = 'sucesso';
                                echo(ClienteDao::cadastrar($cliente));

                            }else{
    
                            header("location: registrar.php");
                            $_SESSION['aviso'] = 'CPF ja cadastrado';
                            $_SESSION['tipo'] = 'error';
                            
                            }  
    
                    }else{
                        
                        header("location: registrar.php");
                        $_SESSION['aviso'] = 'CPF digitado nao e valido';
                        $_SESSION['tipo'] = 'error';
                    }         
    
                }else{
                    
                    header("location: registrar.php");
                    $_SESSION['aviso'] = 'E-mail ja cadastrado ';
                    $_SESSION['tipo'] = 'error';
                }

             }else{
                header("location: registrar.php");
                $_SESSION['aviso'] = 'As duas senhas tem que ser iguais';
                $_SESSION['tipo'] = 'error';
             }
                
        }else{
            header("location: registrar.php");
            $_SESSION['aviso'] = 'Preencha os campos corretamente';
            $_SESSION['tipo'] = 'error';
        }


    }else if($type === "login"){

        $cliente->setEmailCliente($_POST['email']);
        $cliente->setNomeCliente($_POST['nome']);
        $cliente->setSenhaCliente($_POST['password']);
        $email = $cliente->getEmailCliente();
        $senha = $cliente->getSenhaCliente();
        $nome = $cliente->getNomeCliente();

            //confirma que esta tudo sendo escrito
            if($cliente->getEmailCliente() && $cliente->getSenhaCliente() && $nome = $cliente->getNomeCliente()){


                $sql = "SELECT * FROM tbcliente WHERE emailCliente = '$email' and senhaCliente = '$senha' and nomeCliente = '$nome'";
                $r = $cone->query($sql); 

                if(mysqli_num_rows($r) < 1){

                    header("location: login.php");
                    $_SESSION['aviso'] = 'Voce digitou alguma informação incorretamente';
                    $_SESSION['tipo'] = 'error';

                }else{

                    if(!isset($_SESSION)) {
                        session_start();
                    }
                    
                    $_SESSION['aviso'] = 'logado com sucesso';
                    $_SESSION['tipo'] = 'sucesso';

                    $_SESSION['password'] = $cliente->getSenhaCliente();
                    $_SESSION['email'] = $cliente->getEmailCliente();
                    $_SESSION['nome'] = $cliente->getNomeCliente();
                    header("location: index.php");

                   
                }
                
            }else{

                header("location: login.php");
                $_SESSION['aviso'] = 'Preencha os campos corretamente';
                $_SESSION['tipo'] = 'error';
            }

    }else if($type === "cadas_produto"){

        $idCategori = $_POST['categoria'];
        $produto->setNomeProduto($_POST['nomeProduto']);
        $produto->setPrecoProduto($_POST['PrecoProduto']);

       
    
        
        
        //confirma que esta tudo sendo escrito
        if($produto->getNomeProduto() && $_POST['categoria'] && $produto->getPrecoProduto()){    

            echo(ProdutoDao::cadastrar($produto)); 

              
        
        }else{
        
            header("location: cadastrarProduto.php");
            $_SESSION['aviso'] = 'Preencha os campos corretamente';
            $_SESSION['tipo'] = 'error';
        }

    }else if($type === "cadas_categoria"){

        $nomeCategoria = $_POST['nomeCategoria'];

        //confirma que esta tudo sendo escrito
        if($nomeCategoria){
            

            $categoria->setNomeCategoria($nomeCategoria);
            $sqp = "SELECT * FROM tbcategoria WHERE nomeCategoria = '$nomeCategoria' ";
            $res = $cone->query($sqp);
            if(mysqli_num_rows($res) >= 1) {

                header("location: cadastrarCategoria.php");
                $_SESSION['aviso'] = 'Nome de categoria ja cadastrado';
                $_SESSION['tipo'] = 'error';

            }else{

                 header("location: cadastrarCategoria.php");
                 $_SESSION['aviso'] = 'Categoria cadastrada com sucesso';
                 $_SESSION['tipo'] = 'sucesso';

                 echo(CategoriaDao::cadastrar($categoria));
            }
            
        }else{

            header("location: cadastrarCategoria.php");
            $_SESSION['aviso'] = 'Preencha os campos corretamente';
            $_SESSION['tipo'] = 'error';
        }
    }
?>

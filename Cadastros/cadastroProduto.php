<?php
session_start();

    require_once('../model/Produto2.php');
    require_once('../model/Categoria.php');
    require_once("../dao/CategoriaDAO.php");
    require_once("../dao/ProdutoDAO2.php");
    require_once("../model/conexao.php");
    require_once("../model/config.php");

    $produto = new Produto2;
    $categoria = new Categoria;
    $conexao = new Conexao;

        $produto->setNomeProduto($_POST['nomeProduto']);
        $produto->setPrecoProduto($_POST['precoProduto']);
        $idCategoria = $produto->getCategoria()->setidCategoria($_POST['categoria']);


        $nome = $_FILES['foto']['name'];
        $tipo = $_FILES['foto']['type'];
        $tamanho = $_FILES['foto']['size']; 
    
        $arquivo = $_FILES['foto']['tmp_name'];
    
        $diretorio = "../Assets/imagem/produtos_cadas";
 
        //confirma que esta tudo sendo escrito
        if($produto->getNomeProduto() && $produto->getPrecoProduto()){    

                if($tamanho > 2097152){

                    header("location:  ../AreaInterna/form_Produto.php");
                    $_SESSION['aviso'] = 'A imagem que vc tentou cadastrar e uma pesada (MAX 2MB) ';
                    $_SESSION['tipo'] = 'error';

                }else{

                    echo(ProdutoDao2::cadastrar($produto)); 
                    $produto->setIdProduto(ProdutoDao2::consultarId($produto));
        
                    $extensao = substr($nome, -4);
                    $nomenovo = $produto->getIdProduto().$extensao;
        
                    $nomecompleto =  $diretorio.$nomenovo;
        
                    move_uploaded_file($arquivo, "./".$nomecompleto);
        
                    $produto->setFotoProduto($nomecompleto);
        
                    ProdutoDao2::atualizarFoto($produto);
        
                    header("location:  ../AreaInterna/form_Produto.php");
                    $_SESSION['aviso'] = 'Produto cadastrado com sucesso';
                    $_SESSION['tipo'] = 'sucesso';
                }

        }else{
        
            header("location:  ../AreaInterna/form_Produto.php");
            $_SESSION['aviso'] = 'Preencha os campos corretamente';
            $_SESSION['tipo'] = 'error';
        }

    
?>

<?php
session_start();

    require_once("../model/Categoria.php");
    require_once("../dao/CategoriaDAO.php");
    require_once("../model/conexao.php");
    require_once("../model/config.php");

    $categoria = new Categoria;
    $conexao = new Conexao;

        $nomeCategoria = $_POST['nomeCategoria'];

        //confirma que esta tudo sendo escrito
        if($nomeCategoria){
            

            $categoria->setNomeCategoria($nomeCategoria);
            $sqp = "SELECT * FROM tbcategoria WHERE nomeCategoria = '$nomeCategoria' ";
            $res = $cone->query($sqp);
            if(mysqli_num_rows($res) >= 1) {

                header("location: ../AreaInterna/form_Categoria.php");
                $_SESSION['aviso'] = 'Nome de categoria ja cadastrado';
                $_SESSION['tipo'] = 'error';

            }else{

                 header("location: ../AreaInterna/form_Categoria.php");
                 $_SESSION['aviso'] = 'Categoria cadastrada com sucesso';
                 $_SESSION['tipo'] = 'sucesso';

                 echo(CategoriaDao::cadastrar($categoria));
            }
            
        }else{

            header("location: ../AreaInterna/form_Categoria.php");
            $_SESSION['aviso'] = 'Preencha os campos corretamente';
            $_SESSION['tipo'] = 'error';
        }
    
?>

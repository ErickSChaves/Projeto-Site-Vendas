<?php 
    session_start();
    require_once("../model/conexao.php");
    // include("valida-permanencia.php");
    include_once("valida-permanencia.php");
    // require("valida-permanencia.php");
    // require_once("valida-permanencia.php");
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>E Store - eCommerce HTML Template</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta content="eCommerce HTML Template Free Download" name="keywords">
        <meta content="eCommerce HTML Template Free Download" name="description">

        <!-- Favicon -->
        <link href="img/favicon.ico" rel="icon">

        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400|Source+Code+Pro:700,900&display=swap" rel="stylesheet">

        <!-- CSS Libraries -->
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
        <link href="lib/slick/slick.css" rel="stylesheet">
        <link href="lib/slick/slick-theme.css" rel="stylesheet">

        <!-- Template Stylesheet -->
        <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
        <link href="../Assets/cssss/styleMensseger.css" rel="stylesheet">
        <link href="../Assets/cssss/styleForm.css" rel="stylesheet">
        <link href="../Assets/cssss/styleTabela.css" rel="stylesheet">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link href="../Assets/cssss/styleSideBar.css" rel="stylesheet">
    </head>

    <body> 

    
    <div class="wrapper d-flex align-items-stretch">
			<nav id="sidebar">
				<div class="custom-menu">
	        </button>
            </div>
				<div class="p-4">
		  		<h1><a href="area-adm.php" class="logo">Area ADM <span>Loja Trajadao</span></a></h1>
	        <ul class="list-unstyled components mb-5">
             <li>
	            <a href="area-adm.php"><span class="fa fa-home mr-3"></span> Home</a>
	          </li>
	          <li>
	              <a href="tela_Cliente.php"><span class="fa fa-user mr-3"></span> Cliente</a>
	          </li>
	          <li  class="active">
              <a href="form_Categoria.php"><span class="fa fa-briefcase mr-3"></span> Categoria</a>
	          </li>
	          <li>
              <a href="form_Produto.php"><span class="fa fa-sticky-note mr-3"></span> Produto</a>
	          </li>
              <li>
              <a href="form_Venda.php"><span class="fa fa-sticky-note mr-3"></span> Venda</a>
	          </li>
              <li>
              <a href="logout.php"><span class="fa fa-briefcase mr-3"></span> Sair</a>
	          </li>
	         
	        </ul>

            
	       

	      </div>
    	</nav>
        
      <div id="content" class="p-4 p-md-5 pt-5">

      <?php

        require_once '../dao/CategoriaDAO.php';
        require_once '../model/Categoria.php';

        $categoria = new Categoria();
        try {
            $categoria->setidCategoria($_GET['idCategoria']);
            $lista = CategoriaDAO::listar2($categoria);
        } catch(PDOException $e){
            echo $e->getMessage();
        }

    ?>

      <?php

      
      if(!empty($_SESSION['aviso'])){

        if($_SESSION['tipo'] === 'error') {
            ?>
    
            <div class="msg-container">
                <p class="msg <?= $_SESSION['tipo'] ?>"><?= $_SESSION['aviso'] ?> </p>
            </div>
    
            <?php       
        }else{
            ?>
            
            <div class="msg-container">
                <p class="msg <?= $_SESSION['tipo'] ?>"><?= $_SESSION['aviso'] ?> </p>
            </div>
    
            <?php
        }
    
        $_SESSION['aviso'] = '';
        $_SESSION['tipo'] = '';
       
    
     }
    
    ?>
            <!-- Page Content  -->
        
    
        
       
      

            <div class="box">
       <div class="form-box" style=" margin-left: 50% ">
            
        <form method = "post" action="../Cadastros/editarCategoria.php?idCategoria=<?php echo $lista['idCategoria'] ?>" div class="register-form">

       
                
              
        <br/>
        <br/>
       
        <h2> Editar categoria </h2>
        <div class="input-group">
                    <label for="password"> Categoria que vai ser editada: </label>
                    <input readonly placeholder="<?php echo $lista['nomeCategoria'] ?>"  >
                </div>
                <div class="input-group">
                    <label for="password"> Nome Categoria: </label>
                    <input type="text" name="nomeCategoria" id="nomeCategoria" placeholder="Digitar novo nome da categoria" >
                </div>

                
                 
                <br/>
                <br/>

                <div class="input-group">
                    <button>Editar</button>
                </div>
            </div>
            </div>
            

        

          <?php
                  require_once '../dao/CategoriaDao.php';
                   try {
                         $listacategoria = CategoriaDao::listar();
                   } catch(Exception $e) {
                       echo '<pre>';
                             print_r($e);
                        echo '</pre>';
                        echo $e->getMessage();
                 }
        ?>





    </div>
                       
                       

        
        <!-- My Account End -->
        
        <!-- Footer Start -->
        
        <!-- Footer End -->
        
        <!-- Back to Top -->
        <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
        
        <!-- JavaScript Libraries -->
        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
        <script src="lib/easing/easing.min.js"></script>
        <script src="lib/slick/slick.min.js"></script>
        
        <!-- Template Javascript -->
        <script src="js/main.js"></script>
    </body>
</html>

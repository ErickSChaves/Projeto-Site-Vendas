<?php 
    session_start();
    
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
	          <li  class="active">
	              <a href="tela_Cliente.php"><span class="fa fa-user mr-3"></span> Cliente</a>
	          </li>
	          <li>
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
                                require_once '../dao/ClienteDAO.php';
                                try {
                                $listacliente = ClienteDao::listar();
                                } catch(Exception $e) {
                                     echo '<pre>';
                                        print_r($e);
                                    echo '</pre>';
                                    echo $e->getMessage();
                                }
                            ?>
          <section class="ftco-section">
		<div class="container">
        <div class="nomeTabela">
                <h2> Clientes cadastrados</h2>
          </div>
			
			<div class="row">
				<div class="col-md-12">
					<div class="table-wrap">
						<table class="table">
					    <thead class="thead-primary">
                        <tr>
                               <th>Id</th>
                               <th>Nome</th>
                               <th>CPF</th>
                               <th>Email</th>
                              
                         </tr>
					    </thead>
                        <tbody>
                        <tbody>
                                    <?php foreach($listacliente as $cliente){ ?>
                                    <tr>
                                        <th scope="row"><?php echo $cliente['idCliente']; ?></th>
                                        <td><?php echo $cliente['nomeCliente']; ?></td>
                                        <td><?php echo $cliente['cpfCliente']; ?></td>
                                        <td><?php echo $cliente['emailCliente']; ?> </td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                    </tbody>
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

					  </table>
					</div>
				</div>
			</div>
		</div>
	</section>



    </div>
      </div>
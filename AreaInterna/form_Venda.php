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
	          <li>
              <a href="form_Categoria.php"><span class="fa fa-briefcase mr-3"></span> Categoria</a>
	          </li>
	          <li>
              <a href="form_Produto.php"><span class="fa fa-sticky-note mr-3"></span> Produto</a>
	          </li>
              <li  class="active">
              <a href="form_Venda.php"><span class="fa fa-sticky-note mr-3"></span> Venda</a>
	          </li>
              <li>
              <a href="logout.php"><span class="fa fa-briefcase mr-3"></span> Sair</a>
	          </li>
	         
	        </ul>

            
	      </div>
    	</nav>
        
      <div id="content" class="p-4 p-md-5 pt-5">


            </div>
                <?php
                    require_once '../dao/VendaDAO.php';
                    require_once '../model/Venda.php';
                    require_once '../dao/ItemVendaDAO.php';

                    try {
                        $listavenda = VendaDao::listar();
                        $qtdePedido = VendaDao::contarPedido();
                        $listaitens = ItemVendaDao::listar();
                    } catch(Exception $e) {
                        echo '<pre>';
                            print_r($e);
                        echo '</pre>';
                        echo $e->getMessage();
                    }
                ?>
            <div class="col" style=" margin-right: 40% ">
                <div class="row">
                    <div class="col">
                        <div class="alert alert-info" role="alert">
                            <h4 class="alert-heading">Vendas ainda não liberadas</h4>
                            <p>Total de vendas com status PEDIDO PELO CLIENTE: <b> <?php echo $qtdePedido; ?> </b></p>
                            <hr>                  
                        </div>  
                    </div>
                    <div class="col">
                        <div class="alert alert-info" role="alert">
                            <h4 class="alert-heading">XXXXXXXXXXXXXX</h4>
                            <p>XXXXXXXXXXXXXXXXXXXXXXX</p>
                            <hr>                  
                        </div>  
                    </div>
                </div>
                <div class="alert alert-warning" role="alert">
                    <h3>Status da Venda </h3>
                    <div class="row">
                        <div class="col">
                            1 - Pedido pelo cliente <br>
                            2 - Confirmado pela loja
                        </div>
                        <div class="col">
                            3 - Cancelado pelo cliente <br>
                            4 - Cancelado pela loja – falta de estoque
                        </div>
                        <div class="col">
                            5 - Venda finalizada – produtos enviados
                        </div>
                    </div>
                </div>

                <div class="row">
				<div class="col-md-12">
					<div class="table-wrap">
						<table class="table">
					    <thead class="thead-primary">
                        <tr>
                            <th>ID</th>
                            <th>DATA</th>
                            <th>Valor total</th>
                            <th>Nome Cliente</th>
                            <th>Ver itens</th>
                            <th>Status</th>
                            <th>Mudar Staus</th>
                        </tr>
					    </thead>
                    <tbody>
                </br>
                </br>
                </br>
                </br>
                </br>
                </br>
                </br>
             
                        <?php 
                            foreach($listavenda as $venda){ 
                                switch($venda['statusVenda']){
                                    case 1: $status = 'Pedido pelo cliente'; break;
                                    case 2: $status = 'Confirmado pela loja'; break;
                                    case 3: $status = 'Cancelado pelo cliente'; break;
                                    case 4: $status = 'Cancelado pela loja – falta de estoque'; break;
                                    case 5: $status = 'Venda finalizada – produtos enviados'; break;                                    
                                }
                        ?>
                        <tr>
                            <th scope="row"><?php echo $venda['idvenda']; ?></th>
                            <td><?php echo $venda['dataVenda']; ?></td>
                            <td><?php echo number_format($venda['valorTotalVenda'], 2, '.',','); ?></td>
                            <td><?php echo $venda['idCliente']."-".$venda['nomeCliente']; ?></td>
                            <td><a data-toggle="modal" data-target="#modalItensVenda" class="btn btn-primary" onclick="verItemVenda('<?php echo $venda['idvenda'];?>')">Ver </a></td>
                            <td><?php echo $status; ?></td>
                            <?php
                                switch($venda['statusVenda']){
                                    case 1: case 2: 
                            ?>
                                        <td><a data-toggle="modal" data-target="#modalStatusVenda" class="btn btn-primary" onclick="enviarIdVenda('<?php echo $venda['idvenda'];?>')">Mudar</a></td>
                            <?php
                                        break;
                                    case 3: case 4: case 5: echo("<td></td>"); break;                                    
                                }
                            ?>
                            
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
                

            </div>
        </div>
    </div>

    <!-- MODAL MUDANÇA DE STATUS DA VENDA -->
    <div class="modal fade" id="modalStatusVenda" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Atualizar Status da Venda</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="MudarStatusVenda.php" method="post">
                    <div class="modal-body">
                        <div class="form-group">
                            IdVenda: 
                            <input type="text" id="idvendaModal" name="idvendaModal" readonly>
                            <br>
                            Status da venda:
                            <select id="status" name="status" class="form-control">
                                <option value="1">Pedido pelo cliente</option> 
                                <option value="2">Confirmado pela loja</option>
                                <option value="3">Cancelado pelo cliente</option>
                                <option value="4">Cancelado pela loja – falta de estoque</option>
                                <option value="5">Venda finalizada – produtos enviados</option>
                            </select>
                        </div>
                    </div>
                    
            </div>
            <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <input type="submit" class="btn btn-primary" value="Alterar">
                </form>
            </div>
            </div>
        </div>
    </div>

    <!-- MODAL VER ITENS DA VENDA -->
    <div class="modal fade" id="modalItensVenda" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ver itens da Venda: <div id="idvenda"></div></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Produto</th>
                            <th scope="col">Qtde.</th>
                            <th scope="col">Subtotal</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            foreach($listaitens as $item){ 
                                if ($item['idVenda'] == 12){
                                    ?>
                                    <tr>
                                        <th scope="row"><?php echo $item['idVenda']; ?></th>
                                        <td><?php echo $item['idProduto']; ?></td>
                                        <td><?php echo $item['quantItemVenda']; ?></td>
                                        <td><?php echo $item['subTotalItemVenda']; ?></td>
                                    </tr>
                        <?php   } 
                             }
                        ?>
                    </tbody>
                </table>
                    
            </div>
            <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
            </div>
            </div>
        </div>
    </div>


    <!-- JavaScript (Opcional) -->
    <!-- jQuery primeiro, depois Popper.js, depois Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

    <script>
        function monetario(){
            atual = document.getElementById('inputPreco');
            var f = atual.toLocaleString('pt-br',{style: 'currency', currency: 'BRL'});
            document.getElementById('inputPreco').value(f);
        }

        function readImage() {
            if (this.files && this.files[0]) {
                var file = new FileReader();
                file.onload = function(e) {
                    document.getElementById("preview").src = e.target.result;
                };       
                file.readAsDataURL(this.files[0]);
            }
        }
        document.getElementById("foto").addEventListener("change", readImage, false);
        
        function enviarIdVenda(valor) {
            document.getElementById('idvendaModal').value = valor;
        }

        function verItemVenda(valor){
            document.getElementById('idvenda').innerHTML = valor;
            
        }
    </script>
  </body>
</html>
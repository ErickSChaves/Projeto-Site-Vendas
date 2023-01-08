<?php

    session_start();

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
        <link href="../lib/slick/slick.css" rel="stylesheet">
        <link href="../lib/slick/slick-theme.css" rel="stylesheet">

        <!-- Template Stylesheet -->
        <link href="../Assets/cssss/style.css" rel="stylesheet">
        <link href="../Assets/cssss/style2.css" rel="stylesheet">

    </head>

    <body>   
       <!-- Nav Bar Start -->
       <?php



if(!empty($_SESSION['logincliente'])){

    $_SESSION['senhacliente'] ;
    $_SESSION['logincliente'];
    $_SESSION['nomecliente'];
    $_SESSION['idCliente'];
    ?>   
        <!-- Nav Bar Start -->
        <div class="nav">
            <div class="container-fluid">
                <nav class="navbar navbar-expand-md bg-dark navbar-dark">
                    <a href="#" class="navbar-brand">MENU</a>
                    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                        <div class="navbar-nav mr-auto">
                            <a href="index.php" class="nav-item nav-link">Home</a>
                            <a href="produtos.php" class="nav-item nav-link">Produtos</a>
                            <a href="contato.php" class="nav-item nav-link">Contato</a>
                            </div>
                        </div>
                                    <a class="nav-item nav-link"> <?= $_SESSION['nomecliente'] ?> </a>
                                    <a href="logoutLogin.php" class="nav-item nav-link">Sair</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
        <!-- Nav Bar End -->  
    <?php    
}else{
    ?>

    <!-- Nav Bar Start -->
    <div class="nav">
        <div class="container-fluid">
            <nav class="navbar navbar-expand-md bg-dark navbar-dark">
                <a href="#" class="navbar-brand">MENU</a>
                <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                    <div class="navbar-nav mr-auto">
                        <a href="index.php" class="nav-item nav-link active">Home</a>
                        <a href="produtos.php" class="nav-item nav-link">Produtos</a>
                        <a href="contato.php" class="nav-item nav-link">Contato</a>
                        </div>
                    </div>
                                <a href="login.php" class="nav-item nav-link">Login</a>
                                <a href="registrar.php" class="nav-item nav-link">Registrar</a>
                            </div>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
    </div>

    <?php
}


?>
        <!-- Nav Bar End -->      
        
        <?php
          require_once("../model/ItemVenda.php");
          require_once("../model/Produto.php");
          require_once("../dao/ProdutoDAO.php");
          require_once("../model/conexao.php");

             if (isset($_COOKIE["carrinho"])){
                   $carrinhorecebido =  $_COOKIE["carrinho"]; 
                   $carrinhoAtual = unserialize($carrinhorecebido);
                   $qtdecarrinho = count($carrinhoAtual);
                 }
            else{

                header("Location: index.php");
                $qtdecarrinho = 0;
         }
        ?>

       <!-- Bottom Bar Start -->
       <div class="bottom-bar">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <div class="col-md-3">
                        <div class="logo">
                            <a href="index.php">
                                <img src="../Assets/imagem/logo.jpg" alt="Logo">
                            </a>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="search">
                            <input type="text" placeholder="Search">
                            <button><i class="fa fa-search"></i></button>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="user">
                            <a href="carrinho.php" class="btn cart">
                                <i class="fa fa-shopping-cart"></i>
                                <span>(<?php echo $qtdecarrinho;?>)</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Breadcrumb End -->
        
        <!-- Cart Start -->
        <div class="cart-page">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="cart-page-inner">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th>ID</th>
                                            <th>Produto</th>
                                            <th>Nome</th>
                                            <th>Quantidade</th>
                                            <th>Preço</th>
                                            <th>Total</th>
                                            <th>Remover</th>
                                        </tr>
                                    </thead>
                                   <tbody>
                                    
                <?php
                   require_once("../model/ItemVenda.php");
                   require_once("../model/Produto.php");
                   require_once("../dao/ProdutoDAO.php");
                   require_once("../model/conexao.php");

                    $valortotal = 0;
                    foreach($carrinhoAtual as $idvetorcarrinho => $itemcarrinho){ 
                        $valortotal += $itemcarrinho->getSubtotal();
                ?>
                <tr>
                <th scope="row"><?php echo $itemcarrinho->getProduto()->getIdProduto(); ?></th>
                    <td> <img src="<?php echo $itemcarrinho->getProduto()->getFotoProduto(); ?>" class="rounded" width="50%"></td>
                    <td><?php echo $itemcarrinho->getProduto()->getNomeProduto(); ?></td>
                    <td><?php echo $itemcarrinho->getQtde(); ?> </td>
                    <td><?php echo number_format($itemcarrinho->getProduto()->getPrecoProduto(), 2, ',', '.'); ?></td>
                    <td><?php echo number_format($itemcarrinho->getSubtotal(), 2, ',', '.'); ?></td>
                    <td><a class="btn btn-outline-danger" href="RemoveProdutoCarrinho.php?idProduto=<?php echo $idvetorcarrinho;?>">Remover</a></td>
                </tr>
                <?php } ?>
            </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <?php

    require_once('../model/Cliente.php');
    require_once('../controller/clienteController.php');
    require_once("../dao/ClienteDAO.php");
    require_once("../model/conexao.php");
    require_once("../model/config.php");

    $cliente = new Cliente;
    $clienteController = new clienteController();
    $conexao = new Conexao;

    $id = $_SESSION['idCliente'];

    $cliente->setIdCliente($id);
  
    $consultaCep  = ClienteDao::consultarCep($cliente);

    if($consultaCep == 0){
    ?>
                    <div class="col-lg-4">
                        <div class="cart-page-inner">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="cart-summary">
                                        <div class="cart-content">
                                            <h1>Sumario do carrinho</h1>
                                            <h2>Total da compra<span><?php echo number_format($valortotal, 2, ',', '.') ; ?></span></h2>
                                        </div>
                                        <div class="cart-btn">
                                            <a href="registrarCep.php"><button >Avançar</button></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Cart End -->
        <?php
       } else{
        ?>
         <div class="col-lg-4">
                        <div class="cart-page-inner">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="cart-summary">
                                        <div class="cart-content">
                                            <h1>Sumario do carrinho</h1>
                                            <h2>Total da compra<span><?php echo number_format($valortotal, 2, ',', '.') ; ?></span></h2>
                                        </div>
                                        <div class="cart-btn">
                                            <a href="FinalizarVenda.php?valorTotalVenda=<?php echo $valortotal; ?>"><button >Avançar</button></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
        }
        ?>
</br>
</br>
</br>
</br>
</br>
</br>
</br>

</br>

        <!-- Footer Start -->
        <div class="footer">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="footer-widget">
                            <h2>Entrar em contato</h2>
                            <div class="contact-info">
                                <p><i class="fa fa-map-marker"></i>123 TRAJADOS, São Paulo SP</p>
                                <p><i class="fa fa-envelope"></i>email@example.com</p>
                                <p><i class="fa fa-phone"></i>+123-456-7890</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-lg-3 col-md-6">
                        <div class="footer-widget">
                            <h2>Siga-nos</h2>
                            <div class="contact-info">
                                <div class="social">
                                    <a href=""><i class="fab fa-twitter"></i></a>
                                    <a href=""><i class="fab fa-facebook-f"></i></a>
                                    <a href=""><i class="fab fa-linkedin-in"></i></a>
                                    <a href=""><i class="fab fa-instagram"></i></a>
                                    <a href=""><i class="fab fa-youtube"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>


<?php


if(!empty($_SESSION['logincliente'])){

    $_SESSION['senhacliente'] ;
    $_SESSION['logincliente'];
    $_SESSION['nomecliente'];
    $_SESSION['idCliente'];
    ?>
                    
                    <div class="col-lg-3 col-md-6">
                        <div class="footer-widget">
                            <h2>Informaçoes</h2>
                            <ul>
                                <li><a href="#">Política de Privacidade</a></li>
                                <li><a href="#">Termos e Condições</a></li>
                            </ul>
                        </div>
                    </div>

<?php

    }else{
        ?>

                    <div class="col-lg-3 col-md-6">
                        <div class="footer-widget">
                            <h2>Informaçoes</h2>
                            <ul>
                                <li><a href="loginAdm.php">Login Adm</a></li>
                                <li><a href="#">Política de Privacidade</a></li>
                                <li><a href="#">Termos e Condições</a></li>
                            </ul>
                        </div>
                    </div>

     <?php
    }
 ?>



                    <div class="col-lg-3 col-md-6">
                        <div class="footer-widget">
                            <h2>Informações de compra</h2>
                            <ul>
                                <li><a href="#">Política de pagamento </a></li>
                                <li><a href="#">Política de envio</a></li>
                                <li><a href="#">Política de devolução</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                
                <div class="row payment align-items-center">
                    <div class="col-md-6">
                        <div class="payment-method">
                            <h2>Nós aceitamos:</h2>
                            <img src="../Assets/imagem/payment-method.png" alt="Payment Method" />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="payment-security">
                            <h2>Assegurado por:</h2>
                            <img src="../Assets/imagem/godaddy.svg" alt="Payment Security" />
                            <img src="../Assets/imagem/norton.svg" alt="Payment Security" />
                            <img src="../Assets/imagem/ssl.svg" alt="Payment Security" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer End -->
        
        
        <!-- Back to Top -->
        <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
        
        <!-- JavaScript Libraries -->
        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
        <script src="../lib/easing/easing.min.js"></script>
        <script src="../lib/slick/slick.min.js"></script>
        
        <!-- Template Javascript -->
        <script src="../js/main.js"></script>
    </body>
</html>

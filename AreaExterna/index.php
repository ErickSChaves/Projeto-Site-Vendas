<?php
    session_start();
    require_once("../model/conexao.php");
    require_once("../model/cliente.php");


?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Loja trajadão</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta content="eCommerce HTML Template Free Download" name="keywords">
        <meta content="eCommerce HTML Template Free Download" name="description">

        <!-- Favicon -->
        <link href="../Assets/imagem/favicon.ico" rel="icon">

        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400|Source+Code+Pro:700,900&display=swap" rel="stylesheet">

        <!-- CSS Libraries -->
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
        <link href="../lib/slick/slick.css" rel="stylesheet">
        <link href="../lib/slick/slick-theme.css" rel="stylesheet">

        <!-- Template Stylesheet -->
        <link href="../Assets/cssss/style.css" rel="stylesheet">
        <link href="../Assets/cssss/styleMenssege.css" rel="stylesheet">
    </head>

    <body>
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
                            <a href="index.php" class="nav-item nav-link active">Home</a>
                            <a href="produtos.php" class="nav-item nav-link">Produtos</a>
                            <a href="contato.php" class="nav-item nav-link">Contato</a>
                            </div>
                        </div>
                                    <a class="nav-item nav-link"><?php echo $_SESSION['nomecliente']; ?> </a>
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
        <?php

            if(!empty($_SESSION['aviso'])){

            if($_SESSION['tipo'] === 'error') {
            ?>

            <div class="msg-container" style=" margin-left: 30% "  >
            <p class="msg  <?= $_SESSION['tipo'] ?>" ><?= $_SESSION['aviso'] ?> </p>
            </div>

            <?php       
            }else{
            ?>

            <div class="msg-container" style=" margin-left: 30% "  >
            <p class="msg <?= $_SESSION['tipo'] ?>"><?= $_SESSION['aviso'] ?> </p>
            </div>

            <?php
            }

            $_SESSION['aviso'] = '';
            $_SESSION['tipo'] = '';


            }



?>
        <?php
             if (isset($_COOKIE["carrinho"])){
                   $carrinhorecebido =  $_COOKIE["carrinho"]; 
                   $carrinhoAtual = unserialize($carrinhorecebido);
                   $qtdecarrinho = count($carrinhoAtual);
                 }
            else{
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
                    <?php
                       if(!empty($_SESSION['logincliente'])){
                    ?>
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
        <?php
                       }else{
          ?>
           <div class="col-md-3">
                        <div class="user">
                            <a href="login.php" class="btn cart">
                                <i class="fa fa-shopping-cart"></i>
                                <span>(0)</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php
                      }
          ?>
                       
       
        <!-- Bottom Bar End -->       
        
        <!-- Main Slider Start -->
        <div class="header">
            <div class="container-fluid">
                <div class="row">
                <div class="col-md-3">
                        <div class="header-img">
                            <div class="img-item">
                                <img src="../Assets/imagem/categoria4.jpg" />
                                <a class="img-text" href="">
                                    <p>Temos moletons pelo melhor preço!</p>
                                </a>
                            </div>
                            <div class="img-item">
                                <img src="../Assets/imagem/categoria3.jpg" />
                                <a class="img-text" href="">
                                    <p>Boots de marca para arrasar nos rolês!</p>
                                </a>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-6">
                        <div class="header-slider normal-slider">
                            <div class="header-slider-item" >
                                <img src="../Assets/imagem/maracas.png"  alt="Slider Image">
                                <div class="header-slider-caption">
                                    <p>Descricão</p>
                                    <a class="btn" href=""><i class="fa fa-shopping-cart"></i>Compre agora</a>
                                </div>
                            </div>
                            <div class="header-slider-item">
                                <img src="../Assets/imagem/bola.jpg" alt="Slider Image" />
                                <div class="header-slider-caption">
                                    <p>Descricão</p>
                                    <a class="btn" href=""><i class="fa fa-shopping-cart"></i>Compre agora</a>
                                </div>
                            </div>
                            <div class="header-slider-item">
                                <img src="../Assets/imagem/cguteira.jpg" alt="Slider Image" />
                                <div class="header-slider-caption">
                                    <p>Descricão</p>
                                    <a class="btn" href=""><i class="fa fa-shopping-cart"></i>Compre agora</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="header-img">
                            <div class="img-item">
                                <img src="../Assets/imagem/categoria1.jpg" />
                                <a class="img-text" href="">
                                    <p>Descricão</p>
                                </a>
                            </div>
                            <div class="img-item">
                                <img src="../Assets/imagem/categoria2.jpg" />
                                <a class="img-text" href="">
                                    <p>Descricão</p>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Main Slider End -->      
        

  
        
        <!-- Feature Start-->
        <div class="feature">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <div class="col-lg-3 col-md-6 feature-col">
                        <div class="feature-content">
                            <i class="fab fa-cc-mastercard"></i>
                            <h2>Pagamento Seguro</h2>
                            <p>
                               Aqui o pagamento e totalmente seguro e sem taxas
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 feature-col">
                        <div class="feature-content">
                            <i class="fa fa-truck"></i>
                            <h2>Entrega em todo o pais</h2>
                            <p>
                                Fazemos entrega em todo o distrito brasileiro
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 feature-col">
                        <div class="feature-content">
                            <i class="fa fa-sync-alt"></i>
                            <h2>30 Dias de reembolso</h2>
                            <p>
                                Voçê tem ate 30 dias para pedir o reembolso apos a compra
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 feature-col">
                        <div class="feature-content">
                            <i class="fa fa-comments"></i>
                            <h2>Temos suporte 24 Horas</h2>
                            <p>
                                 Temos um suporte a qualquer hora sempre que você tiver uma duvida
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Feature End-->      
        
        <!-- Category Start-->
        <div class="category">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-3">
                        <div class="category-item ch-400">
                            <img src="../Assets/imagem/category-7.jpeg" />
                            <a class="category-calca" href="">
                                <p>Temos diversos tipos de Calças de muita qualidade</p>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="category-item ch-250">
                            <img src="../Assets/imagem/category-6.jpeg" />
                            <a class="category-camisa" href="">
                                <p>Temos diversos tipos de Camisa de muita qualidade</p>
                            </a>
                        </div>
                        <div class="category-item ch-150">
                            <img src="../Assets/imagem/category-4.jpeg" />
                            <a class="category-bone" href="">
                                <p>Temos diversos tipos de bones de muita qualidade</p>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="category-item ch-150">
                            <img src="../Assets/imagem/category-8.jpeg" />
                            <a class="category-copa" href="">
                                <p>Temos diversos tipos camisa de seleçoes que vão participar da copa do mundo</p>
                            </a>
                        </div>
                        <div class="category-item ch-250">
                            <img src="../Assets/imagem/category-3.jpeg" />
                            <a class="category-bermuda" href="">
                                <p>Temos diversos tipos de bermudas de muita qualidade</p>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="category-item ch-400">
                            <img src="../Assets/imagem/category-5.jpeg" />
                            <a class="category-moletom" href="">
                                <p>Temos diversos tipos de moletom de muita qualidade</p>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Category End-->           

        <?php
            require_once '../dao/ProdutoDAO.php';
            try {
                $listaproduto = ProdutoDao::listarIndex();
            } catch(Exception $e) {
                echo '<pre>';
                    print_r($e);
                echo '</pre>';
                echo $e->getMessage();
            }
        ?>
        
        <!-- Featured Product Start -->
        <div class="featured-product product">
            <div class="container-fluid">
                <div class="section-header">
                    <h1> Produtos em destaque </h1>
                </div>

                <div class="row align-items-center product-slider product-slider-4">

                <?php foreach($listaproduto as $produto){ ?>

                    <div class="col-lg-3">
                        <div class="product-item">
                            <div class="product-title">
                                <a href=""><?php echo $produto['NomeProduto']; ?></a>
                                <div class="ratting">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                            </div>
                            <div class="product-image">
                                <a href="product-detail.html">
                                    <img src="<?php echo $produto['fotoProduto']; ?>" alt="Product Image">
                                </a>
                                <div class="product-action">
                                    <a href="#"><i class="fa fa-cart-plus"></i></a>
                                    <a href="#"><i class="fa fa-heart"></i></a>
                                    <a href="#"><i class="fa fa-search"></i></a>
                                </div>
                            </div>
                            <?php
                       if(!empty($_SESSION['logincliente'])){
                                ?>
                            <div class="product-price">
                                <h3><span>R$</span><?php echo $produto['PrecoProduto']; ?></h3>
                                <a class="btn" href="ProdutoCarrinho.php?idProduto=<?php echo $produto['idProduto']; ?>" class="fa fa-shopping-cart">Compre agora</a>
                            </div>
                            <?php
                       }else{
                            ?>
                             <div class="product-price">
                                <h3><span>R$</span><?php echo $produto['PrecoProduto']; ?></h3>
                                <a class="btn" href="login.php" class="fa fa-shopping-cart">Compre agora</a>
                            </div>
                            <?php
                       }
                       ?>
                        </div>
                    </div>
                    <?php } ?>

                            </div>

                    </div>

            </div>
        </div>
        <!-- Featured Product End -->       
          
        
        <!-- Recent Product Start -->
        <div class="recent-product product">
            <div class="container-fluid">
                <div class="section-header">
                    <h1>Produtos Mais Recentes</h1>
                </div>
                <div class="row align-items-center product-slider product-slider-4">
                <?php foreach($listaproduto as $produto){ ?>

<div class="col-lg-3">
    <div class="product-item">
        <div class="product-title">
            <a href=""><?php echo $produto['NomeProduto']; ?></a>
            <div class="ratting">
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
            </div>
        </div>
        <div class="product-image">
            <a href="product-detail.html">
                <img src="<?php echo $produto['fotoProduto']; ?>" alt="Product Image">
            </a>
            <div class="product-action">
                <a href="#"><i class="fa fa-cart-plus"></i></a>
                <a href="#"><i class="fa fa-heart"></i></a>
                <a href="#"><i class="fa fa-search"></i></a>
            </div>
        </div>
        <?php
                       if(!empty($_SESSION['logincliente'])){
                                ?>
                            <div class="product-price">
                                <h3><span>R$</span><?php echo $produto['PrecoProduto']; ?></h3>
                                <a class="btn" href="ProdutoCarrinho.php?idProduto=<?php echo $produto['idProduto']; ?>" class="fa fa-shopping-cart">Compre agora</a>
                            </div>
                            <?php
                       }else{
                            ?>
                             <div class="product-price">
                                <h3><span>R$</span><?php echo $produto['PrecoProduto']; ?></h3>
                                <a class="btn" href="login.php" class="fa fa-shopping-cart">Compre agora</a>
                            </div>
                            <?php
                       }
                       ?>
    </div>
</div>
<?php } ?>
                </div>
            </div>
        </div>
        <!-- Recent Product End -->
        
        <!-- Review Start -->
        <div class="review">
            <div class="container-fluid">
                <div class="row align-items-center review-slider normal-slider">
                    <div class="col-md-6">
                        <div class="review-slider-item">
                            <div class="review-img">
                                <img src="../Assets/imagem/aaron.png">
                            </div>
                            <div class="review-text">
                                <h2>Aaron Soncini Estevam</h2>
                                <h3>Desenvolvedor</h3>
                                <div class="ratting">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                                <p>
                                   
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="review-slider-item">
                            <div class="review-img">
                                <img src="../Assets/imagem/daniel.png" alt="Image">
                            </div>
                            <div class="review-text">
                                <h2>Daniel de Mendonça Freitas</h2>
                                <h3>Desenvolvedor Front-End</h3>
                                <div class="ratting">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                                <p>
                                   
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="review-slider-item">
                            <div class="review-img">
                                <img src="../Assets/imagem/erick1.png" alt="Image">
                            </div>
                            <div class="review-text">
                                <h2>Erick da Silva Chaves</h2>
                                <h3>Desenvolvedor</h3>
                                <div class="ratting">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                                <p>
                                   
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="review-slider-item">
                            <div class="review-img">
                                <img src="../Assets/imagem/nicolly1.png" alt="Image">
                            </div>
                            <div class="review-text">
                                <h2>Nicolly da Silva Chaves</h2>
                                <h3>Desenvolvedor</h3>
                                <div class="ratting">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                                <p>
                                   
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="review-slider-item">
                            <div class="review-img">
                                <img src="../Assets/imagem/kennedy.png" alt="Image">
                            </div>
                            <div class="review-text">
                                <h2>Kennedy Gomes Nunes</h2>
                                <h3>Desenvolvedor</h3>
                                <div class="ratting">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                                <p>
                                    
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="review-slider-item">
                            <div class="review-img">
                                <img src="../Assets/imagem/yolanda.png" alt="Image">
                            </div>
                            <div class="review-text">
                                <h2>Yolanda Aparecida Silva Santos</h2>
                                <h3>Desenvolvedor</h3>
                                <div class="ratting">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                                <p>
                                  
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Review End -->        
        
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

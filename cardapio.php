<?php
include("controles/config.php");

$query_lanchonete = "SELECT * FROM lanchonete";
$query_cardapio = "SELECT * FROM cardapio";
$result = mysqli_query($db, $query_lanchonete);
$result2 = mysqli_query($db, $query_lanchonete);
$result3 = mysqli_query($db, $query_cardapio);


//var_dump($result3);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Snack Bar - Cardápio</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Work+Sans:100,200,300,400,500,600,700,800,900" rel="stylesheet">

    <link rel="stylesheet" href="css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="css/animate.css">

    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">

    <link rel="stylesheet" href="css/aos.css">

    <link rel="stylesheet" href="css/ionicons.min.css">

    <link rel="stylesheet" href="css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="css/jquery.timepicker.css">


    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/icomoon.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
    <div class="container">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav"
                aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="oi oi-menu"></span> Menu
        </button>

        <div class="collapse navbar-collapse" id="ftco-nav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item"><a href="index.php" class="nav-link">Inicio</a></li>
                <li class="nav-item active"><a href="cardapio.php" class="nav-link">Cardápio</a></li>
                <li class="nav-item"><a href="contato.php" class="nav-link">Contato</a></li>
                <li class="nav-item"><a href="controles/logout.php" class="nav-link">Sair</a></li>
                <li class="nav-item cta mr-md-2"><a href="cadastro_cardapio.php" class="nav-link">Área restrita</a></li>

            </ul>
        </div>
    </div>
</nav>
<!-- END nav -->

<section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url('images/lanchonete.jpg'); background-position: center"
         data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-start">
            <div class="col-md-9 ftco-animate pb-5">
                <h1 class="mb-3 bread">Cardápio</h1>
            </div>
        </div>
    </div>
</section>

<section class="ftco-section bg-light">
    <div class="container">
        <div class="row justify-content-center mb-5 pb-3">
            <div class="col-md-7 heading-section ftco-animate text-center">
                <h2 class="mb-1"><span>Tabela de preços</h2>
            </div>
        </div>
        <div class="row">

        <?php while ($cardapio_res = mysqli_fetch_array($result3)) {?>
            <div class="col-md-4 ftco-animate">
                <div class="block-7">
                    <div class="text-center">
                        <h1 class="heading-2 my-4"><?php echo $cardapio_res['nome_produto']; ?></h1>
                        <span class="price"><span class="number">R$<?php echo $cardapio_res['valor_prod']; ?></span></span>
                        <input type="submit" class="btn btn-primary py-3 px-5" value="Pedir este item"></input>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
</section>

<footer class="ftco-footer ftco-bg-dark ftco-section">
    <div class="container">
        <div class="row mb-5">
            <div class="col-md">
                <div class="ftco-footer-widget mb-4">
                    <h2 class="ftco-heading-2">Sobre o restaurante</h2>
                    <p>
                        -----
                    </p>
                    <ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-5">
                        <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
                        <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
                        <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md">
                <div class="ftco-footer-widget mb-4 ml-md-5">
                    <h2 class="ftco-heading-2">Links Comuns</h2>
                    <ul class="list-unstyled">
                        <li><a href="#" class="py-2 d-block">Cardápio</a></li>
                        <li><a href="#" class="py-2 d-block">Contato</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md">
                <div class="ftco-footer-widget mb-4">
                    <h2 class="ftco-heading-2">Contato e localização</h2>
                    <div class="block-23 mb-3">
                        <ul>
                            <li><span class="icon icon-map-marker"></span><span class="text">
                                <?php
                                while ($row1 = mysqli_fetch_array($result2)) {
                                echo '' . $row1['endereco'] . ' - ' . $row1['cep'] . '';
                                ?>
                            </span>
                            </li>
                            <li><a href="#"><span class="icon icon-phone"></span><span
                                            class="text"><?php echo $row1['telefone'] ?></span></a></li>
                            <li><a href="#"><span class="icon icon-envelope"></span><span class="text">contato@snackbar.com</span></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>
        <div class="row">
            <div class="col-md-12 text-center">

                <p>Snack Bar &copy;
                    <script>document.write(new Date().getFullYear());</script>
                    - Todos os direitos reservados.
                </p>
            </div>
        </div>
    </div>
</footer>


<!-- loader -->
<div id="ftco-loader" class="show fullscreen">
    <svg class="circular" width="48px" height="48px">
        <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/>
        <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10"
                stroke="#F96D00"/>
    </svg>
</div>


<script src="js/jquery.min.js"></script>
<script src="js/jquery-migrate-3.0.1.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.easing.1.3.js"></script>
<script src="js/jquery.waypoints.min.js"></script>
<script src="js/jquery.stellar.min.js"></script>
<script src="js/owl.carousel.min.js"></script>
<script src="js/jquery.magnific-popup.min.js"></script>
<script src="js/aos.js"></script>
<script src="js/jquery.animateNumber.min.js"></script>
<script src="js/bootstrap-datepicker.js"></script>
<script src="js/jquery.timepicker.min.js"></script>
<script src="js/scrollax.min.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
<script src="js/google-map.js"></script>
<script src="js/main.js"></script>

</body>
</html>

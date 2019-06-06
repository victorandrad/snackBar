<?php
include("controles/config.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nome = $_POST['nome'];
    $login = $_POST['login'];
    $senha = $_POST['senha'];
    $frase = $_POST['frase'];

    $insere = 'INSERT INTO cliente (nome, login, senha, frase_secreta, lanchonete) VALUES ("' . $nome . '", "' . $login . '"," ' . $senha . '", "' . $frase . '", "95.124.240/0001-04")';

    $resultado = $db->query($insere);

}
?>
<html lang="pt-br">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Teste Back-End NanoIncub</title>

    <!-- Bootstrap Core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="login-panel panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Cadastro</h3>
                </div>
                <div class="panel-body">
                    <form role="form" method="post" action="cadastro.php">
                        <fieldset>
                            <div class="form-group">
                                <input class="form-control" placeholder="Nome" name="nome" type="text" autofocus>
                            </div>
                            <div class="form-group">
                                <input class="form-control" placeholder="Login" name="login" type="text" autofocus>
                            </div>
                            <div class="form-group">
                                <input class="form-control" placeholder="Senha" name="senha" type="password" value="">
                            </div>
                            <div class="form-group">
                                <input class="form-control" placeholder="Frase secreta" name="frase" type="text"
                                       autofocus>
                            </div>
                            <!-- Change this to a button or input when using this as a form -->
                            <input type="submit" class="btn btn-lg btn-success btn-block" value="Cadastrar">
                            <br/>
                            <a href="login.php"><- Voltar</a>
                        </fieldset>
                    </form>

                    <?php

                    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                        if ($resultado) {
                            echo "<p>Inserido com sucesso!</p>";
                        }
                        if (!$resultado) {
                            echo "<p>Ocorreu um erro ao inserir!</p>";
                        }
                    }
                    ?>


                </div>
            </div>
        </div>
    </div>
</div>

<!-- jQuery -->
<script src="vendor/jquery/jquery.min.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="vendor/bootstrap/js/bootstrap.min.js"></script>

<!-- Metis Menu Plugin JavaScript -->
<script src="vendor/metisMenu/metisMenu.min.js"></script>

<!-- Custom Theme JavaScript -->
<script src="dist/js/sb-admin-2.js"></script>

</body>

</html>

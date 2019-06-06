<?php
include("config.php");

$date = date('Y-m-d');
$nome = $_POST['nome_produto'];
$categoria = $_POST['categoria_produto'];
$preco = $_POST['preco_produto'];
$quantidade = $_POST['quantidade_produto'];

$preco_format = number_format(substr(preg_replace('/[^\d+]/', null, $preco), 0, -2), 2, '.', '');

$sql = "INSERT INTO cardapio (nome_produto, valor_prod) VALUES ('" . $nome . "', valor_prod='" . $preco_format . "')";

$res = mysqli_query($db, $sql);

header("Location: ../cadastro_cardapio.php");

?>

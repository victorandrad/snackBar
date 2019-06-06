<?php
include("config.php");

$id = $_POST['id_produto'];
$nome = $_POST['nome_produto'];
$categoria = $_POST['categoria_produto'];
$preco = $_POST['preco_produto'];
$quantidade = $_POST['quantidade_produto'];

$preco_format = number_format(substr(preg_replace('/[^\d+]/', null, $preco), 0, -2), 2, '.', '');

$data = date('Y-m-d');

$query = "UPDATE cardapio SET nome_produto='" . $nome . "', valor_prod='" . $preco_format . "' WHERE cod_produto='" . $id . "'";
$result = mysqli_query($db, $query);

header("Location: ../cadastro_cardapio.php");
?>

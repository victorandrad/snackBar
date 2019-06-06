<?php
include("config.php");

$id = $_POST['id'];

$query = "DELETE FROM cardapio WHERE cod_produto='" . $id . "'";
$result = mysqli_query($db, $query);

header("Location: ../cadastro_cardapio.php");
?>

<?php
include("config.php");

$id = $_POST['id'];
$preco = $_POST['valor'];

$sql = "INSERT INTO pedido (data_pedido, item_id, valor) VALUES (''," . $id . ", " . $preco . ")";

$res = mysqli_query($db, $sql);

header("Location: ../cardapio.php");

?>

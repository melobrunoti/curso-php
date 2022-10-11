<?php

require_once('conecta_banco.php');

print_r($_GET['idcliente']);

$id = $_GET['idcliente'];

$sql = $conn->prepare('DELETE FROM cdc.rup WHERE id = "' . $id . '"');
$sql->execute();
header('location: ../create.php');

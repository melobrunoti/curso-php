<?php
require_once('conecta_banco.php');

///Pegando pelo metodo POST
$cpfcnpj = $_POST['cpfcnpj'];
$name = $_POST['name'];
$email = $_POST['email'];
$sex = $_POST['sex'];
$nascimento = $_POST['nascimento'];
$message = $_POST['message'];
$uf = $_POST['uf'];

//Query de insert
$sql = $conn->prepare("INSERT INTO rup(cpfcnpj, nome, data_nascimento, sexo, fk_estados, email, mensagem) 
value ('$cpfcnpj','$name','$nascimento', '$sex', '$uf', '$email', '$message')");
$sql->execute();
header('location: ../index.php');

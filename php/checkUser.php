<?php

require_once('conecta_banco.php');

$user_email = $_POST['email'];
$user_password = $_POST['password'];

$sql = $conn->prepare('SELECT * from usuarios WHERE email = "' . $user_email . '"');
$sql->execute();
$user = $sql->fetch(PDO::FETCH_OBJ);

if ($user_password === $user->senha) {
  header('location: ../create.php');
} else {
  header('location: ../index.php');
}

<!DOCTYPE html>
<html lang="en">
<?php require_once('./php/conecta_banco.php');

$sql = $conn->prepare('SELECT * FROM estados');
$sql->execute();
$consulta = $sql->fetchAll(PDO::FETCH_OBJ);

$sql = $conn->prepare('SELECT r.id, r.cpfcnpj, r.nome, r.data_nascimento, r.sexo, r.email, r.fk_estados, r.mensagem, e.uf FROM rup r INNER JOIN estados e ON e.id= r.fk_estados');
$sql->execute();
$dadosRup = $sql->fetchAll(PDO::FETCH_OBJ);

?>

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Create user</title>
  <link rel="stylesheet" href="style.css">
</head>

<body>
  <div id="after_submit"></div>
  <div class="main">
    <form id="contact_form" action="./php/checkUser.php" method="POST" enctype="multipart/form-data">
      <div class="form-container">
        <h1>Login</h1>
        <div class="row">
          <label class="required" for="email">E-mail:</label><br />
          <input id="email" class="input" name="email" type="text" value="" size="30" /><br />
        </div>
        <div class="row">
          <label class="required" for="name">Password:</label><br />
          <input id="name" class="input" name="password" type="password" value="" size="30" /><br />
        </div>
        <input id="submit_button" type="submit" value="Login" />

    </form>

  </div>
  </div>
  </div>
  </div>
</body>

</html>
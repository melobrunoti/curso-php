<!DOCTYPE html>
<html lang="en">
<?php require_once('./php/conecta_banco.php');

$idcliente = $_GET['idcliente'];

$sql = $conn->prepare('SELECT r.id, r.cpfcnpj, r.nome, r.data_nascimento, r.sexo, r.email, r.fk_estados, r.mensagem, e.uf FROM rup r INNER JOIN estados e ON e.id= r.fk_estados WHERE r.id = "' . $idcliente . '"');
$sql->execute();
$consulta = $sql->fetch(PDO::FETCH_OBJ);

$sql = $conn->prepare('SELECT * FROM estados');
$sql->execute();
$ufs = $sql->fetchAll(PDO::FETCH_OBJ);


?>

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <title>Edit user</title>
</head>

<body>
  <div id="after_submit"></div>
  <div class="main">
    <form id="contact_form" action="./php/update.php" method="POST" enctype="multipart/form-data">
      <h1>Edit client</h1>
      <div class="form-container">
        <div class="row">
          <label class="required" for="email">CPF/CNPJ:</label><br />
          <input id="email" class="input" name="cpfcnpj" type="text" value="<?= $consulta->cpfcnpj ?>" size="30" /><br />
        </div>
        <div class="row">
          <label class="required" for="name">Nome:</label><br />
          <input id="name" class="input" name="name" type="text" value="<?= $consulta->nome ?>" size="30" /><br />
        </div>
        <div class="row">
          <label class="required" for="email">E-mail:</label><br />
          <input id="email" class="input" name="email" type="text" value="<?= $consulta->email ?>" size="30" /><br />
        </div>

        <div class="row">
          <label class="required" for="email">Nascimento:</label><br />
          <input id="email" class="input" name="nascimento" type="text" value="<?= $consulta->data_nascimento ?>" size="30" /><br />
        </div>
        <div class="row">
          <label class="required" for="email">UF:</label><br />
          <select name="uf" id="uf">
            <?php foreach ($ufs as $uf) { ?>
              <option value='<?php echo $uf->id ?>'><?php echo $uf->uf ?></option>
            <?php } ?>
          </select>
          <br />
        </div>
        <div class="row">
          <label class="required" for="message">Mensagem:</label><br />
          <textarea id="message" class="input" name="mensagem" rows="7" value="<?= $consulta->mensagem ?>" cols="30"></textarea><br />
        </div>

        <input type="hidden" name="primarykey" value="<?= $consulta->id ?>" />
        <input id="submit_button" type="submit" value="Enviar" />
      </div>
    </form>
</body>
</div>

</html>
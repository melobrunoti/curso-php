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
    <title>Create client</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div id="after_submit"></div>
    <div class="main">
        <form id="contact_form" action="./php/montarDados.php" method="POST" enctype="multipart/form-data">
            <div class="form-container">
                <h1>Create client</h1>
                <div class="row">
                    <label class="required" for="email">CPF/CNPJ:</label><br />
                    <input id="email" class="input" name="cpfcnpj" type="text" value="" size="30" /><br />
                </div>
                <div class="row">
                    <label class="required" for="name">Nome:</label><br />
                    <input id="name" class="input" name="name" type="text" value="" size="30" /><br />
                </div>
                <div class="row">
                    <label class="required" for="email">E-mail:</label><br />
                    <input id="email" class="input" name="email" type="text" value="" size="30" /><br />
                </div>

                <div class="row">
                    <label class="required" for="email">Nascimento:</label><br />
                    <input id="email" class="input" name="nascimento" type="text" value="" size="30" /><br />
                </div>
                <div class="row">
                    <label class="required" for="sex">Sexo:</label><br />
                    <select name="sex" id="sex">
                        <option value='M'>Masculino</option>
                        <option value='F'>Feminino</option>
                    </select>
                </div>

                <div class="row">
                    <label class="required" for="email">UF:</label><br />
                    <select name="uf" id="uf">
                        <?php foreach ($consulta as $uf) { ?>
                            <option value='<?php echo $uf->id ?>'><?php echo $uf->uf ?></option>
                        <?php } ?>
                    </select>
                    <br />
                </div>
                <div class="row">
                    <label class="required" for="message">Mensagem:</label><br />
                    <textarea id="message" class="input" name="message" rows="7" cols="30"></textarea><br />
                </div>

                <input id="submit_button" type="submit" value="Enviar" />
            </div>
        </form>
        <table border="1">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>CPF/CNPJ</th>
                    <th>Email</th>
                    <th>Nascimento</th>
                    <th>Sexo</th>
                    <th>UF</th>
                    <th>Mensagem</th>

                    <th colspan="2">Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($dadosRup as $dado) : ?>
                    <tr>
                        <td><?= $dado->nome    ?></td>
                        <td><?= $dado->cpfcnpj ?></td>
                        <td><?= $dado->email ?></td>
                        <td><?= $dado->data_nascimento ?></td>
                        <td><?= $dado->sexo ?></td>
                        <td><?= $dado->uf ?></td>
                        <td><?= $dado->mensagem ?></td>
                        <td><a href="./edit.php?idcliente=<?= $dado->id ?>">Editar<a></td>
                        <td><a href="./php/delete.php?idcliente=<?= $dado->id ?>">Excluir<a></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

    </div>
</body>

</html>
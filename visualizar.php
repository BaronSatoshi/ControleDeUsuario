<?php

include('config.php');

$consulta = "SELECT * FROM usuarios";
$con = $conexao->query($consulta) or die($conexao->error);

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="visualizar.css">
    <title>Registro de Usuários</title>
</head>
<body>
    <h1>Registro de Usuários</h1>
    <a class="btn  btn-primary" href="sair.php">Sair</a>
    <a class="btn btn-success" href="index.php">Cadastrar</a>
    <table id="tabela" border=2 class="table table-striped ">
        <tr>
            <td><strong>ID</strong></td>
            <td><strong>Nome</strong></td>
            <td><strong>Email</strong></td>
            <td><strong>Senha</strong></td>
            <td><strong>Ação</strong></td>
        </tr>
        <?php while($dado = $con->fetch_array()){ ?>
        <tr>
            <td><?php echo $dado["id"]; ?></td>
            <td><?php echo $dado["nome"]; ?></td>
            <td><?php echo $dado["email"]; ?></td>
            <td><?php echo $dado["senha"]; ?></td>
            <td><a class="btn btn-warning" href="editar.php?codigo=<?php echo $dado["id"] ?>">Editar</a> | <a class="btn btn-danger" href="javascript: if(confirm('Tem certeza que deseja excluir o usuário <?php echo $dado["nome"]; ?>')) location.href='excluir.php?codigo=<?php echo $dado["id"] ?>';">Excluir</a></td>
        </tr>
        <?php } ?>
    </table>
</body>
</html>
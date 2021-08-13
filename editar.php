<?php

include_once('config.php');

$usu_codigo = intval($_GET['codigo']);

error_reporting(0);

$sql = "SELECT * FROM usuarios WHERE id = '$usu_codigo'";
$sql_query = $conexao->query($sql) or die($conexao->error);
$linha = $sql_query->fetch_assoc();

$nome = $linha['nome'];
$email = $linha['email'];

if(isset($_POST['submit'])){

    
    
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = ($_POST['senha']);
    $senhaConfirm = ($_POST['senhaConfirm']);

   
    if($senha == $senhaConfirm){
        $sql_code =  "UPDATE usuarios SET nome = '$nome', email = '$email', senha = '$senha' WHERE id = '$usu_codigo'";
        $result = mysqli_query($conexao, $sql_code);
        if($result){
            echo "<script>alert('Usuário alterado com sucesso.')</script>";
            echo "<script> location.href='visualizar.php'</script>";
        } else {
            echo"<script>alert('opa, algo deu errado')";
        }
    } else {
        echo"<script>alert('Senha inválida')</script>";
    }
   
    
   
    
    

}

?>



<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="editar.css">
    <title>Editar Usuário</title>
</head>
<body>
    <section>
       <div class="user signupBx">
            <div class="formBx">
                <form action="" method="POST">
                <h2>Editar conta</h2>
                <input type="text" name="nome" id="nome" placeholder="Nome de Usuário" value="<?php echo $nome; ?>" required>
                <input type="text" name="email" id="email" placeholder="Email"  value="<?php echo $email; ?>"  required>
                <input type="password" name="senha" id="senha" placeholder="Criar uma senha" required>
                <input type="password" name="senhaConfirm" id="senhaConfirm" placeholder="Confirme a sua senha" required>
                <input type="submit" name="submit" value="Editar">
                </form>
            </div>
        </div>
    </section>  
    <script src="script.js"></script>
</body>
</html>
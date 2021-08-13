<?php

include_once('config.php');

error_reporting(0);

if(isset($_POST['submit'])){
    
    

    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = ($_POST['senha']);
    $senhaConfirm = ($_POST['senhaConfirm']);

    if($senha == $senhaConfirm){
        $sql =  "INSERT INTO usuarios(nome, email, senha) VALUES ('$nome', '$email', '$senha')";
        $result = mysqli_query($conexao, $sql);
        if($result){
            echo "<script>alert('Registrado')</script>";
        } else {
            echo"<script>alert('opa, algo deu errado')";
        }
    } else {
        echo"<script>alert('Senha inválida')</script>";
    }
   

   

    

    //header('Location: index.php');
    

}

?>



<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Tela de Registro&Login</title>
</head>
<body>
    <section>
    <div class="container">
        <div class="user signinBx">
            <div class="imgBx"><img src="img/img01.jpg"></div>
            <div class="formBx">
                <form action="teste_login.php" method="POST">
                <h2>Login</h2>
                <input type="text" name="nome" id="nome" placeholder="Nome" required>
                <input type="password" name="senha" id="senha" placeholder="Senha" required>
                <input type="submit" name="submit" value="login">
                <p class="signup">Não tem uma conta? <a href="#" onclick="toggleForm();">Cadastre-se</a></p>
                </form>
            </div>
        </div>

       <div class="user signupBx">
            <div class="formBx">
                <form action="index.php" method="POST">
                <h2>Criar uma conta</h2>
                <input type="text" name="nome" id="nome" placeholder="Nome de Usuário" value="<?php echo $nome; ?>" required>
                <input type="text" name="email" id="email" placeholder="Email"  value="<?php echo $email; ?>"  required>
                <input type="password" name="senha" id="senha" placeholder="Criar uma senha" required>
                <input type="password" name="senhaConfirm" id="senhaConfirm" placeholder="Confirme a sua senha" required>
                <input type="submit" name="submit" value="Inscrever">
                <p class="signup">Você ja tem uma conta? <a href="#" onclick="toggleForm();">Entrar</a></p>
                </form>
            </div>
            <div class="imgBx"><img src="img/img02.jpg"></div>
        </div>
    </div>
    </section>  
    <script src="script.js"></script>
</body>
</html>
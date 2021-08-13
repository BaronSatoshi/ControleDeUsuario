<?php

include('config.php');

$usu_codigo = intval($_GET['codigo']);

$sql_code = "DELETE FROM usuarios WHERE id = '$usu_codigo'";
$sql = $conexao->query($sql_code) or die($conexao->error);

if($sql){
    echo "<script> location.href='visualizar.php'</script>";
} else {
    echo "<script>
            alert('Não foi possível deletar o usuário.');
            location.href='visualizar.php';
        </script>";
}



?>
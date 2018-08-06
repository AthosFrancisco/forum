<?php
include 'usuarioSessao.php';
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        
        <h1>Bem vindo!
        <?php
            $usuario = $_SESSION['usuario'];
            echo $usuario->getUsuario()->getNome();
        ?>
        </h1>
    </body>
</html>

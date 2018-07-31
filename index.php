<?php
include 'autoload.php';
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <a href="criarpergunta.php">Fazer Pergunta</a>
        
        <h1>Bem vindo!
        <?php
            include 'DAO/UsuarioDAO.php';
            session_start();
            $usuario = $_SESSION['usuario'];
            echo $usuario->getUsuario()->getNome();
        ?>
        </h1>
    </body>
</html>

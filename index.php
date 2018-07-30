<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <h1>Bem vindo!
        <?php
            require_once 'DAO/UsuarioDAO.php';
            session_start();
            $usuario = unserialize($_SESSION['usuario']);
            var_dump($_SESSION);
            echo $usuario->getUsuario();
        ?>
        </h1>
    </body>
</html>

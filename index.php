<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <h1>Bem vindo!
        <?php
            session_start();
            $usuario = $_SESSION["usuario"];
            
            print_r($usuario->getUsuario());
        ?>
        </h1>
    </body>
</html>

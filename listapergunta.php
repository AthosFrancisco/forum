<?php
include_once 'autoload.php';
include_once 'model/Pergunta.php';

session_start();

$usuario = $_SESSION['usuario'];
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        foreach($usuario->listarPerguntas() as $u){
            echo '<a href="pergunta.php?idPergunta='.$u->getId().'">';
            echo '<h2>'.$u->getTitulo().'</h2>';
            echo '<p>'.$u->getDataPostagem().'</p>';
            echo '</a><hr>';
        }
        ?>
    </body>
</html>

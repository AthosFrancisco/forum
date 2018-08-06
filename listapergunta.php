<?php
include 'usuarioSessao.php';
include_once 'model/Pergunta.php';

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
            echo '<h2>'.$u->getTitulo().'</h2></a>';
            echo '<p>'.$u->getDataPostagem().'</p>';
            
            if($u->getIdAutor() == $usuario->getUsuario()->getId()){
                echo '<a href="editarpergunta.php?idPergunta='.$u->getId().'">editar</a>';
                echo '<a href="excluirpergunta.php?idPergunta='.$u->getId().'">excluir</a>';
            }
            
            echo '<hr>';
        }
        ?>
    </body>
</html>

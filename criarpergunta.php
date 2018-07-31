<!DOCTYPE html>
<?php
include 'autoload.php';
include_once 'DAO/UsuarioDAO.php';

session_start();
$usuario = $_SESSION['usuario'];

if (isset($_POST['titulo']) && isset($_POST['corpo'])) {
    $algumVazio = false;

    if (empty($_POST['titulo']) == true) {
        echo '<script>alert("Falta o título");</script>';
        $algumVazio = true;
    }
    if (empty($_POST['corpo']) == true) {
        echo '<script>alert("Falta o texto");</script>';
        $algumVazio = true;
    }

    if (!$algumVazio) {
        $titulo = addslashes($_POST['titulo']);
        $corpo = addslashes($_POST['corpo']);
        $usuario->criarPergunta($titulo, $corpo);
    }
}
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Fazer Pergunta</title>
    </head>
    <body>
        <h1>Fazer Pergunta</h1>
        <form method="POST">
            <table>
                <tr>
                    <td><label for="titulo">Título</label></td>
                    <td><input name="titulo" type="text" id="titulo" autofocus/></td>
                </tr>
                <tr>
                    <td><label for="corpo">Texto</label></td>
                    <td><textarea name="corpo" id="corpo" rows="10" cols="50"></textarea></td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" value="Enviar"/></td>
                </tr>
            </table>
        </form>
    </body>
</html>

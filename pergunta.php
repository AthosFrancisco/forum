<?php
include 'model/Pergunta.php';
include 'usuarioSessao.php';

$usuario = $_SESSION['usuario'];
$idPergunta = $_GET['idPergunta'];

if(isset($_GET['corpo']) && empty($_GET['corpo']) == false){
    $resposta = addslashes($_GET['corpo']);
    
    $usuario->criarResposta($resposta, $idPergunta);
}

$pergunta = $usuario->pergunta($idPergunta);
$listaResposta = $usuario->listarRespostas($idPergunta);
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        echo '<h2>' . $pergunta->getTitulo() . '</h2>';
        echo '<div>Data: ' . $pergunta->getDataPostagem() . '</div>';
        echo '<p>' . $pergunta->getCorpo() . '</p><hr/>';

        foreach ($listaResposta as $r) {
            echo '<div>' . $r->getDataPostagem() . '</div>';
            echo '<div>' . $r->getCorpo() . '</div>';
            echo '<br/><br/>';
        }
        ?>

        <form method="GET">
            <input type="text" name="idPergunta" value="<?php echo $idPergunta;?>" style="display: none;"/>
            <table>
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


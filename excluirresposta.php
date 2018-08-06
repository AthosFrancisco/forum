<?php
include 'usuarioSessao.php';

if(isset($_GET['idResposta'])){
    
    $usuario = $_SESSION['usuario'];
    
    $usuario->apagarResposta(intval($_GET['idResposta']));
}

header("location: pergunta.php?idPergunta=".$_GET['idPergunta']);
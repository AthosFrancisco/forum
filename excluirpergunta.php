<?php
include 'usuarioSessao.php';

if(isset($_GET['idPergunta'])){
    
    $usuario = $_SESSION['usuario'];
    
    $usuario->apagarPergunta(intval($_GET['idPergunta']));
}

header("location: listapergunta.php");
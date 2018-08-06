<?php

function carrega($nome) {
    include('DAO/' . $nome . '.php');
}

spl_autoload_register("carrega");

session_start();

if (isset($_SESSION['usuario']) == false) {
    $_SESSION['usuario'] = new Deslogado(null);
}
?>

<a href="index.php">Index</a>
<a href="criarpergunta.php">Criar Pergunta</a>
<a href="listapergunta.php">Perguntas</a>
<a href="editarcadastro.php">Editar Cadastro</a>

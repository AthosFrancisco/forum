<?php

function carrega($nome) {
    include('DAO/' . $nome . '.php');
}

spl_autoload_register("carrega");

session_start();

if (isset($_SESSION['usuario']) == false) {
    $_SESSION['usuario'] = new Deslogado(null);
}
<?php
    function carrega ($nome) {
        include('DAO/' . $nome . '.php');
    }
    spl_autoload_register("carrega");
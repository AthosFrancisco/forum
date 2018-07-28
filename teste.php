<?php

require_once 'model/Usuario.php';

$usuario = new Usuario(1, "Athos", "athos", "", "Oi");

print_r($usuario);

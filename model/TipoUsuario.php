<?php

require_once 'SplEnum.php';

class TipoUsuario extends SplEnum{

    
    const __default = self::Comum;
    
    const Comum = 1;
    const Moderador = 2;
    const Administrador = 3;
}

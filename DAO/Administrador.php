<?php

class Administrador extends UsuarioDAO{
    
    public function Administrador($usuario) {
        parent::__construct($usuario);
    }
    
    public function apagarPergunta(int $idPergunta) {
        
    }

    public function apagarResposta(int $idResposta) {
        
    }

    public function listarPerguntas(): ArrayObject{
        
    }

    public function listarPerguntasProprias(): ArrayObject{
        
    }

    public function listarRespostas($idPergunta): ArrayObject{
        
    }

    public function criarPergunta(string $titulo, string $corpo) {
        
    }

    public function criarResposta(string $resposta) {
        
    }

}

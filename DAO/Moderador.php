<?php

class Moderador extends UsuarioDAO{
    
    public function Moderador($usuario) {
        parent::__construct($usuario);
    }

    public function apagarPergunta(int $idPergunta) {
        
    }

    public function apagarResposta(int $idResposta) {
        
    }

    public function criarPergunta(\Pergunta $pergunta) {
        
    }

    public function criarResposta(\Resposta $resposta) {
        
    }

    public function listarPerguntas() {
        
    }

    public function listarPerguntasProprias() {
        
    }

    public function listarRespostas() {
        
    }

}

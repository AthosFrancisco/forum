<?php

interface UsuarioDAO {
    
    public function criarPergunta(Pergunta $pergunta);
    
    public function criarResposta(Resposta $resposta);
    
    public function apagarPergunta(int $idPergunta);
    
    public function apagarResposta(int $idResposta);
    
    public function listarPerguntas();
    
    public function listarRespostas();
    
    public function listarPerguntasProprias();
}

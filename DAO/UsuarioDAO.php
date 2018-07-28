<?php

require_once 'Conexao.php';
require_once 'model/Usuario.php';

abstract class UsuarioDAO {
    
    protected $usuario;
    
    public function getUsuario(): Usuario{
        return $this->usuario;
    }

    public abstract function criarPergunta(Pergunta $pergunta);
    
    public abstract function criarResposta(Resposta $resposta);
    
    public abstract function apagarPergunta(int $idPergunta);
    
    public abstract function apagarResposta(int $idResposta);
    
    public abstract function listarPerguntas();
    
    public abstract function listarRespostas();
    
    public abstract function listarPerguntasProprias();
}

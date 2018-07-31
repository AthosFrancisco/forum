<?php

require_once 'Conexao.php';
require_once 'model/Usuario.php';

abstract class UsuarioDAO{
    
    protected $usuario;
    protected $pdo;


    public function __construct($usuario) {
        $this->usuario = $usuario;
    }

    
    public function getUsuario(): Usuario{
        return $this->usuario;
    }
    public function getPdo(){
        $this->pdo = Conexao::getConexao();
        return $this->pdo;
    }

    public abstract function criarPergunta(string $titulo, string $corpo);
    
    public abstract function criarResposta(string $resposta);
    
    public abstract function apagarPergunta(int $idPergunta);
    
    public abstract function apagarResposta(int $idResposta);
    
    public abstract function listarPerguntas();
    
    public abstract function listarRespostas();
    
    public abstract function listarPerguntasProprias();
}

<?php

require 'Conexao.php';

class Comum implements UsuarioDAO{
    
    private $usuario;

    public function __construct(Usuario $usuario) {
        $this->usuario = $usuario;
    }

    
    public function apagarPergunta(int $idPergunta) {
        
        $sql = "SELECT id_autor FROM pergunta WHERE id = '$idPergunta';";
        $sql = $pdo->query($sql);
        
        if($sql->rowCount() > 0){
            $idAutor = $sql->fetch()['id_autor'];
        }
        
        if($idAutor == $usuario->getId()){
            $sql = "DELETE FROM usuario WHERE id = '$idPergunta'";
            $pdo->query($sql);
        }else{
            echo 'Você não é o proprietário desta pergunta';
        }
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

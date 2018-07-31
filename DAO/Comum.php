<?php

class Comum extends UsuarioDAO{
    
    public function Comum($usuario) {
        parent::__construct($usuario);
    }

    
    public function apagarPergunta(int $idPergunta) {
        
        $this->getPdo();
        
        $sql = "SELECT id_autor FROM pergunta WHERE id = '$idPergunta';";
        $sql = $this->pdo->query($sql);
        
        if($sql->rowCount() > 0){
            $idAutor = $sql->fetch()['id_autor'];
        }
        
        if($idAutor == $usuario->getId()){
            $sql = "DELETE FROM usuario WHERE id = '$idPergunta'";
            $this->pdo->query($sql);
        }else{
            echo 'Você não é o proprietário desta pergunta';
        }
        
        $this->pdo = null;
    }

    public function apagarResposta(int $idResposta) {
        
    }

    public function criarPergunta(string $titulo, string $corpo) {
        
        $this->getPdo();
        
        $idAutor = $this->usuario->getId();
        date_default_timezone_set('America/Sao_Paulo');
        $dataPostagem = date("Y-m-d H:i:s");
        
        $sql = "INSERT INTO pergunta (id_autor, titulo, corpo, data_postagem) VALUES ($idAutor, '$titulo', '$corpo', '$dataPostagem');";
        $this->pdo->query($sql);
        
        $this->pdo = null;
    }

    public function criarResposta(string $resposta) {
        
    }

    public function listarPerguntas() {
        
    }

    public function listarPerguntasProprias() {
        
    }

    public function listarRespostas() {
        
    }
}

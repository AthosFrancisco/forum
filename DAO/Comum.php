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
        
        $this->getPdo();
        
        $sql = "SELECT id_autor FROM resposta WHERE id = $idResposta;";
        $sql = $this->pdo->query($sql);
        
        if($sql->rowCount() > 0){
            $sql = $sql->fetch();
            $idAutor = $sql['id_autor'];
        }
        
        if($this->usuario->getId() == $idAutor){
            $sql = "DELETE FROM resposta WHERE id = $idResposta;";
            $this->pdo->query($sql);
        }else{
            echo 'Esta resposta não é sua';
        }
        
        $this->pdo = null;
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
        $this->getPdo();
        
        $idAutor = $this->usuario->getId();
        $idPergunta = $resposta->getIdPergunta();
        $corpo = $resposta->getCorpo();
        
        date_default_timezone_set('America/Sao_Paulo');
        $dataPostagem = date("Y-m-d H:i:s");
        
        $sql = "INSERT INTO resposta (id_autor, id_pergunta, corpo, data_postagem) VALUES ($idAutor, '$idPergunta', '$corpo', '$dataPostagem');";
        $this->pdo->query($sql);
        
        $this->pdo = null;
    }

    public function listarPerguntas(): ArrayObject{
        
        $this->getPdo();
        
        $sql = "SELECT * FROM pergunta";
        $sql = $this->pdo->query($sql);
        
        $lista = new ArrayObject();
        
        if($sql->rowCount() > 0){
            $sql = $sql->fetchAll();
            
            foreach ($sql as $p){
                $pergunta = new Pergunta();
                $pergunta->setId($p['id']);
                $pergunta->setIdAutor($p['id_autor']);
                $pergunta->setTitulo($p['titulo']);
                $pergunta->setCorpo($p['corpo']);
                $pergunta->setDataPostagem($p['data_postagem']);
                
                $lista->append($pergunta);
            }
        }
        
        $this->pdo = null;
        return $lista;
    }

    public function listarPerguntasProprias(): ArrayObject {
        
        $this->getPdo();
        
        $idAutor = $this->usuario->getId();
        
        $sql = "SELECT * FROM pergunta WHERE id_autor = $idAutor;";
        $sql = $this->pdo->query($sql);
        
        $lista = new ArrayObject();
        
        if($sql->rowCount() > 0){
            $sql = $sql->fetchAll();
            
            foreach ($sql as $p){
                $pergunta = new Pergunta();
                $pergunta->setId($p['id']);
                $pergunta->setIdAutor($p['id_autor']);
                $pergunta->setTitulo($p['titulo']);
                $pergunta->setCorpo($p['corpo']);
                $pergunta->getDataPostagem($p['data_postagem']);
                
                $lista->append($pergunta);
            }
        }
        
        $this->pdo = null;
        return $lista;
    }

    public function listarRespostas($idPergunta): ArrayObject{
        
        $this->getPdo();
        
        $sql = "SELECT * FROM resposta WHERE id_autor = $idPergunta;";
        $sql = $this->pdo->query($sql);
        
        $lista = new ArrayObject();
        
        if($sql->rowCount() > 0){
            $sql = $sql->fetchAll();
            
            foreach ($sql as $r){
                $resposta = new Resposta();
                $resposta->setId($r['id']);
                $resposta->setIdAutor($r['id_autor']);
                $resposta->setIdPergunta($r['id_pergunta']);
                $resposta->setCorpo($r['corpo']);
                $resposta->getDataPostagem($r['data_postagem']);
                
                $lista->append($resposta);
            }
        }
        
        $this->pdo = null;
        return $lista;
    }
}

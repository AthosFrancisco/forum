<?php

class Deslogado extends UsuarioDAO {
    
    public function Deslogado($usuario) {
        parent::__construct($usuario);
    }

    public function apagarPergunta(int $idPergunta) {}

    public function apagarResposta(int $idResposta) {}

    public function criarPergunta(string $titulo, string $corpo) {}

    public function criarResposta(string $resposta, $idPergunta) {}

    public function listarPerguntas(): ArrayObject {

        $this->getPdo();

        $sql = "SELECT * FROM pergunta";
        $sql = $this->pdo->query($sql);

        $lista = new ArrayObject();

        if ($sql->rowCount() > 0) {
            $sql = $sql->fetchAll();

            foreach ($sql as $p) {
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

    public function listarPerguntasProprias(): ArrayObject {}

    public function listarRespostas($idPergunta): ArrayObject {

        $this->getPdo();

        $sql = "SELECT * FROM resposta WHERE id_pergunta = $idPergunta;";
        $sql = $this->pdo->query($sql);

        $lista = new ArrayObject();

        if ($sql->rowCount() > 0) {
            $sql = $sql->fetchAll();

            foreach ($sql as $r) {
                $resposta = new Resposta();
                $resposta->setId($r['id']);
                $resposta->setIdAutor($r['id_autor']);
                $resposta->setIdPergunta($r['id_pergunta']);
                $resposta->setCorpo($r['corpo']);
                $resposta->setDataPostagem($r['data_postagem']);

                $lista->append($resposta);
            }
        }

        $this->pdo = null;
        return $lista;
    }

    public function pergunta($idPergunta): Pergunta {
        $this->getPdo();

        $sql = "SELECT * FROM pergunta WHERE id = $idPergunta;";

        $sql = $this->pdo->query($sql);

        $pergunta = new Pergunta();
        if ($sql->rowCount() > 0) {
            $result = $sql->fetch();
            $pergunta->setId($result['id']);
            $pergunta->setIdAutor($result['id_autor']);
            $pergunta->setTitulo($result['titulo']);
            $pergunta->setCorpo($result['corpo']);
            $pergunta->setDataPostagem($result['data_postagem']);
        }

        return $pergunta;
    }

}

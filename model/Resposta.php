<?php

class Resposta {
    
    private $id;
    private $idAutor;
    private $idPergunta;
    private $corpo;
    private $dataPostagem;
    
    public function getId(): int{
        return $this->id;
    }

    public function getIdAutor(): int{
        return $this->idAutor;
    }

    public function getIdPergunta(): int{
        return $this->idPergunta;
    }

    public function getCorpo(): string{
        return $this->corpo;
    }

    public function getDataPostagem(): string{
        return $this->dataPostagem;
    }

    public function setId(int $id) {
        $this->id = $id;
    }

    public function setIdAutor(int $idAutor) {
        $this->idAutor = $idAutor;
    }

    public function setIdPergunta(int $idPergunta) {
        $this->idPergunta = $idPergunta;
    }

    public function setCorpo(string $corpo) {
        $this->corpo = $corpo;
    }

    public function setDataPostagem(string $dataPostagem) {
        $this->dataPostagem = $dataPostagem;
    }

}

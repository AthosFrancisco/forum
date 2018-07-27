<?php

class Pergunta {

    private $id;
    private $idAutor;
    private $titulo;
    private $corpo;
    private $dataPostagem;
    
    public function getId(): int{
        return $this->id;
    }

    public function getIdAutor(): int{
        return $this->idAutor;
    }

    public function getTitulo(): string{
        return $this->titulo;
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

    public function setTitulo(string $titulo) {
        $this->titulo = $titulo;
    }

    public function setCorpo(string $corpo) {
        $this->corpo = $corpo;
    }

    public function setDataPostagem(string $dataPostagem) {
        $this->dataPostagem = $dataPostagem;
    }

}

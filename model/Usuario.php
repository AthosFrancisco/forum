<?php

class Usuario {
    
    public function __construct() {
        
    }

    private $id;
    private $nome;
    private $email;
    private $senha;
    private $tipo;
    
    public function getId(): int{
        return $this->id;
    }

    public function getNome(): string{
        return $this->nome;
    }

    public function getEmail(): string{
        return $this->email;
    }

    public function getSenha(): string{
        return $this->senha;
    }
    
    public function getTipo(): TipoUsuario{
        return $this->tipo;
    }

    public function setId(int$id) {
        $this->id = $id;
    }

    public function setNome(string $nome) {
        $this->nome = $nome;
    }

    public function setEmail(string $email) {
        $this->email = $email;
    }

    public function setSenha(string $senha) {
        $this->senha = $senha;
    }

    public function setTipo(TipoUsuario $tipo) {
        $this->tipo = $tipo;
    }
}

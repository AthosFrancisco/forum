<?php

require_once 'TipoUsuario.php';

class Usuario {
    
    public function __construct($id, $nome, $email, $senha, $tipo) {
        $this->id = $id;
        $this->nome = $nome;
        $this->email = $email;
        $this->senha = $senha;
        $this->setTipo($tipo);
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
    
    public function getTipo(): string{
        return $this->tipo->__toString();
    }

    public function setId(int $id) {
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

    public function setTipo(string $tipo) {
        if($tipo == "Comum"){
            $this->tipo = new TipoUsuario(1);
        }
        elseif($tipo == "Moderador"){
            $this->tipo = new TipoUsuario(2);
        }
        elseif($tipo == "Administrador"){
            $this->tipo = new TipoUsuario(3);
        }else{
            
        }
    }
}

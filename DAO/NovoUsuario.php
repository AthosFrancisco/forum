<?php

require_once 'Conexao.php';
require_once 'model/Usuario.php';

class NovoUsuario{
    
    public static function novo($nome, $email, $senha): Usuario{
        
        $pdo = Conexao::getConexao();
        
        $sql = "INSERT INTO usuario (nome, email, senha, tipo) VALUES ('$nome', '$email', MD5('$senha'), 'Comum');";
        
        $pdo->query($sql);
        
        $id = $pdo->lastInsertId();
        
        $sql = "SELECT * FROM usuario WHERE id=$id;";
        
        $sql = $pdo->query($sql);
        
        if($sql->rowCount() > 0){
            $sql = $sql->fetch();
            $usuario = new Usuario($sql['id'], $sql['nome'], $sql['email'], "", $sql['tipo']);
        }
        
        return $usuario;
    }

}

?>
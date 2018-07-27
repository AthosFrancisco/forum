<?php

require 'Conexao.php';

class NovoUsuario{
    
    public static function novo($nome, $email, $senha): Usuario{
        
        $pdo = Conexao::getConexao();
        
        $sql = "INSERT INTO usuario (nome, email, senha, tipo) VALUES ('$nome', '$email', MD5('$senha'), 'Comum');";
        
        $pdo->query($sql);
        
        $id = $pdo->lastInsertId();
        
        $sql = "SELECT * FROM usuario WHERE id=$id;";
        
        $sql = $pdo->query($sql);
        
        if($sql->rowCount() > 0){
            $usuario = $sql->fetch();
        }
        
        return $usuario;
    }

}

?>
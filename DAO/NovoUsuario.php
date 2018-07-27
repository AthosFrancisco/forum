<?php

require 'Conexao.php';
require 'model/Usuario.php';

class NovoUsuario{
    
    public static function novo($nome, $email, $senha): Usuario{
        
        $pdo = Conexao::getConexao();
        
        $sql = "INSERT INTO usuario (nome, email, senha, tipo) VALUES ('$nome', '$email', MD5('$senha'), 'Comum');";
        
        $pdo->query($sql);
        
        $id = $pdo->lastInsertId();
        
        $sql = "SELECT * FROM usuario WHERE id=$id;";
        
        $sql = $pdo->query($sql);
        
        $usuario = new Usuario();
        if($sql->rowCount() > 0){
            $result = $sql->fetch();
            $usuario::setId(intval($result['id']));
            $usuario::setNome($result['nome']);
            $usuario::setEmail($result['email']);
            $usuario::setSenha("");
            $usuario::setTipo($result['tipo']);
        }
        
        return $usuario;
    }

}

?>
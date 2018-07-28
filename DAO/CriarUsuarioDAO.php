<?php

require_once 'UsuarioDAO.php';
require_once 'Conexao.php';
require_once 'Comum.php';
require_once 'Moderador.php';
require_once 'Administrador.php';
require_once 'model/Usuario.php';

class CriarUsuarioDAO{
    
    public static function getUsuarioDAO($login, $senha): UsuarioDAO{
        
        $pdo = Conexao::getConexao();
        
        $sql = "SELECT * FROM usuario WHERE email='$login' AND senha=MD5('$senha')";
        
        $sql = $pdo->query($sql);
        
        if ($sql->rowCount() > 0){
            $sql = $sql->fetch();
            
            $usuario = new Usuario($sql['id'], $sql['nome'], $sql['email'], "", $sql['tipo']);
        }
        
        switch ($usuario->getTipo()){
            case 1:
                return new Comum($usuario);
                break;
            case 2:
                return new Moderador($usuario);
                break;
            case 3:
                return new Administrador($usuario);
                break;
            default:
                echo "Não é um tipo conhecido";
                return UsuarioDAO();
        }
    }
}
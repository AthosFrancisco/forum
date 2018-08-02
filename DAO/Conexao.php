<?php

class Conexao {

    public static function getConexao() {
        $dsn = "mysql:dbname=forum;host=localhost:3306";
        $dbUsuario = "root";
        $dbSenha = "";

        $pdo;

        try {
            $pdo = new PDO($dsn, $dbUsuario, $dbSenha);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo "<script>console.log('Conexão estabelecida');</script>";
        } catch (PDOException $e) {
            echo "<script>console.log('Falha: " . $e->getMessage() . "');</script>";
        }
        
        return $pdo;
    }

}

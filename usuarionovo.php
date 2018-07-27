<?php
    require 'DAO/NovoUsuario.php';
    
    if(isset($_POST['nome']) && isset($_POST['email']) && isset($_POST['senha'])){
        $algumVazio = false;
        
        if(empty($_POST['nome']) == true){
            echo '<span style="color: red;">Falta o nome</span>';
            $algumVazio = true;
        }
        if(empty($_POST['email']) == true){
            echo '<span style="color: red;">Falta o E-mail</span>';
            $algumVazio = true;
        }
        if(empty($_POST['senha']) == true){
            echo '<span style="color: red;">Falta a senha</span>';
            $algumVazio = true;
        }
        
        if(!$algumVazio){
            $nome = addslashes($_POST['nome']);
            $email = addslashes($_POST['email']);
            $senha = addslashes($_POST['senha']);
            $usuario = NovoUsuario::novo($nome, $email, $senha);
        }
    }
?>

<html lang="pt-br">
    <head>
        <meta charset="utf-8"/>
        <title>Login</title>
    </head>
    <body>
        <h1>Login</h1>
        <form method="POST">
            <table>
                <tr>
                    <td><label for="nome">Nome:</label></td>
                    <td><input type="text" id="nome" name="nome" autofocus/></td>
                </tr>
                <tr>
                    <td><label for="email">E-mail:</label></td>
                    <td><input type="text" id="email" name="email" /></td>
                </tr>
                <tr>
                    <td><label for="senha">Senha:</label></td>
                    <td><input type="password" id="senha" name="senha" /></td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" value="Enviar" /></td>
                </tr>
            </table>
        </form>
    </body>
</html>
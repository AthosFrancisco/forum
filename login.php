<?php
    
    require_once 'DAO/CriarUsuarioDAO.php';
    
    if(isset($_POST['login']) && isset($_POST['senha'])){
        $algumVazio = false;
        
        if(empty($_POST['login']) == true){
            echo '<span style="color: red;">Falta o login</span>';
            $algumVazio = true;
        }
        if(empty($_POST['senha']) == true){
            echo '<span style="color: red;">Falta a senha</span>';
            $algumVazio = true;
        }
        
        if(!$algumVazio){
            $login = addslashes($_POST['login']);
            $senha = addslashes($_POST['senha']);
            $usuarioDAO = CriarUsuarioDao::getUsuarioDAO($login, $senha);
            
            if($usuarioDAO == null){
                echo "Usuário ou senha incorreto";
            }else{
                session_start();
                $_SESSION['usuario'] = serialize($usuarioDAO);
                //print_r($usuarioDAO);
                //print_r(unserialize($_SESSION['usuario']));
                header("Location: index.php");
            }
        }
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <h1>Login</h1>
        <form method="POST">
            <table>
                <tr>
                    <td><label for="login">Login:</label></td>
                    <td><input type="text" name="login" id="login"/></td>
                </tr>
                <tr>
                    <td><label for="senha">Senha:</label></td>
                    <td><input type="password" name="senha" id="senha"/></td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" value="Enviar"/></td>
                </tr>
            </table>
        </form>
    </body>
</html>

<?php
include 'usuarioSessao.php';
require_once 'DAO/NovoUsuario.php';
require_once 'DAO/CriarUsuarioDAO.php';

if (isset($_POST['nome']) && isset($_POST['email']) && isset($_POST['senha'])) {
    $algumVazio = false;

    if (empty($_POST['nome']) == true) {
        echo '<span style="color: red;">Falta o nome</span>';
        $algumVazio = true;
    }
    if (empty($_POST['email']) == true) {
        echo '<span style="color: red;">Falta o E-mail</span>';
        $algumVazio = true;
    }
    if (empty($_POST['senha']) == true) {
        echo '<span style="color: red;">Falta a senha</span>';
        $algumVazio = true;
    }

    if (!$algumVazio) {
        $nome = addslashes($_POST['nome']);
        $email = addslashes($_POST['email']);
        $senha = addslashes($_POST['senha']);
        NovoUsuario::novo($nome, $email, $senha);
        
        $usuarioDAO = CriarUsuarioDao::getUsuarioDAO($email, $senha);

        //////////////////////////////////////////////////
        $arquivo = $_FILES['foto'];

	print_r($arquivo);

	if(isset($arquivo['tmp_name']) && !empty($arquivo['tmp_name'])){

		$nomeDoArquivo = $usuarioDAO->getUsuario()->getId();
		move_uploaded_file($arquivo['tmp_name'], 'fotos/'.$nomeDoArquivo);

		echo 'arquivo enviado com sucesso '.$nomeDoArquivo;
	}
        ///////////////////////////////////////////
        
        if ($usuarioDAO == null) {
        } else {

            session_start();
            $_SESSION['usuario'] = $usuarioDAO;
            //header("Location: index.php");
        }
    }
}
?>

<html lang="pt-br">
    <head>
        <meta charset="utf-8"/>
        <title>Login</title>
    </head>
    <body>
        <h1>Cadastro</h1>
        <form method="POST" enctype="multipart/form-data">
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
                    <td><input type="file" name="foto" /></td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" value="Enviar" /></td>
                </tr>
            </table>
        </form>
    </body>
</html>
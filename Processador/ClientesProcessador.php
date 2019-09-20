<?php
	
    //PROTEGE O ACESSO DIRETO AO ARQUIVO
    if(!isset($_POST['pageLogin'])) {
        echo '<center style="width: 100%; height: 20px; background-color: red; color: white; font-family: Arial; padding-top: 3px;">Arquivo Protegido</center>';
        die();
    }

	include('../config.php');

    switch ($_POST) {
    //EFETUA O LOGIN NO SISTEMA E ABRE TODAS AS SESSÕES
    case isset($_POST['entrarSistema']):

        $usuario = $_POST['usuario'];
        $senha = $_POST['senha'];

        if($usuario != '' && strlen($usuario) == 11 && strpos($usuario,'.') != 1 && $senha != '' && strlen($senha) > 8) {
            
            $login = new Cliente();
            $login->setCpf($usuario);
            $login->setSenha($senha);
            $logar = $login->loginCliente();

            if($logar != false) {
                //LOGAMOS COM SUCESSO.
                $_SESSION['login'] = true;
                $_SESSION['cpf'] = $usuario;
                $_SESSION['nome'] = $logar['nome_cliente'];
                $_SESSION['token'] = sha1(sha1('seg'.$_SERVER['REMOTE_ADDR'].$_SERVER['HTTP_USER_AGENT']));

                $resp = 'sucesso';
                $alerta = 'home';
            }else {
                $resp = 'falha';
                $alerta = 'Usuário ou senha incorretos!';
            }
        }else {
            $resp = 'falha';
            $alerta = 'Usuário ou senha incorretos!';
        }        

        echo json_encode(array($resp,$alerta), JSON_PRETTY_PRINT);
        break;
    
    }


?>
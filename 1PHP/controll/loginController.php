<?php
require_once('./../model/adm.class.php');
require_once('./../model/database.php');

session_start();

//TODO: acesso direto a pagina, mostra layout de login
if($_SERVER['REQUEST_METHOD'] == 'GET'){

    if(isset($_GET['action']) && $_GET['action']=='sair'){//estava logado e pediu para sair

        session_unset(); //! limpa valores ativos na sessão atual
        adm::forget($_POST['email']);

        header('location:./../view/login.php');
            exit;
    } 
        else if(isset($_SESSION['usuario'])){ //ja estava logado e não pediu para sair
            header('location:./../view/menu.php');
            exit;
        }
            else{
                include('./../view/login.php');
                if (isset($_POST['remember'])) {
                  adm::remember($_POST['email']);  
                }
            }
}
else if($_SERVER['REQUEST_METHOD'] == 'POST'){
    
    //TODO: Criptografa a senha
    $senhaHash = md5($_POST['senha']);

    //TODO: Cria objeto usuario (adm)
    $usuario = new adm('', $_POST['email'], $senhaHash);
    
    //TODO: Teste para ver se deu certo
    $deuCerto = $usuario->logar();
    if ($deuCerto) {//logou
        $_SESSION['usuario'] = $usuario;
        $_SESSION['msg'] = 'Bem vindo'.$usuario->nome;
        
        header('location:./../view/menu.php');
        exit;
    }
    else {
        $_SESSION['msg'] = 'Login ou senha incorreta!';
        include('./../view/login.php');
    }
}

    
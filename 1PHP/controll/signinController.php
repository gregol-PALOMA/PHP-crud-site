<?php
require_once('./../model/adm.class.php');
require_once('./../model/database.php');

if (isset($_GET['act']) && $_GET['act']=='cad') {
    include('./../view/signin.php');
} else {
    if(isset($_POST['act']) && $_POST['act']== 'save'){
        
        //TODO: cria objeto materia
        $a = new adm($_POST['nome'], $_POST['email'], $_POST['senha']);
    
        //TODO: tenta salvar objeto
        $salvou = $a->cadastroADM();
    
        $_SESSION['msg'] = $salvou? 'salvou com sucesso' : 'DEU PAU';
    
        header('location:./../view/menu.php');
        exit;
    }
}

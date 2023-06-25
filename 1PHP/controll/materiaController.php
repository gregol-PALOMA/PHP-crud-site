<?php
require_once('./../model/materias.class.php');
require_once('./../model/database.php');

if(isset($_GET['busca'])){//busca ajax
    $busca = $_GET['busca'];
    $resultados = materias::buscarNome($busca);

    $jsonResultados= json_encode($resultados);

    echo $jsonResultados;
}
else{if (isset($_GET['pagina'])) {//listagem ajax
    $pagina = $_GET['pagina'];
    materias::listarHTML($pagina);
}
else{if(isset($_GET['act'])&& $_GET['act'] == 'delete'){
        if(!isset($_GET['id'])){
            die("ID não informado");
        }else {
            $id = $_GET['id'];
            $deuCerto = materias::apagar($id);

            $_SESSION['msg'] = $deuCerto ?
            'Registro excluido' : "DEU PAU";

            header('location:./../view/menu.php');
            exit;
        }
    }
    else if(isset($_GET['act']) && $_GET['act']=='cad'){ //veio novo cadastro
        include('./../view/cadastroMateriais.php');
    }
    else if(isset($_POST['act']) && $_POST['act']== 'save'){ //salva cadastro que veio

        //TODO: cria objeto materia
        $m = new materias($_POST['nome'], $_POST['descricao'], $_POST['preco']);

        //TODO: tenta salvar objeto
        $salvou = $m->cadastrarMateria();

        $_SESSION['msg'] = $salvou? 'salvou com sucesso' : 'DEU PAU';
        

        header('location:./../view/menu.php');
        exit;
    }
    else if (isset($_GET['act']) && $_GET['act'] == 'alter') { //veio edição
        
        $id = $_GET['id'];
        
        //TODO: busca novo objeto por ID
        $m = materias::buscar($id);
    
        include('./../view/cadastroMateriais.php');
    }
    else if (isset($_POST['act']) && $_POST['act'] == 'edit') {//chegou o formulario da edição

        //TODO: cria objeto materia
        $m = new materias($_POST['nome'], $_POST['descricao'], $_POST['preco']);

        //TODO: identifica o id do objeto
        $m->id = $_POST['id'];

        //TODO: tenta atualizar
        $salvou = $m->atualizar();

        $_SESSION['msg'] = $salvou ? 'Atualizou com sucesso':'Não Atualizou';

        header('location:./../view/menu.php');
        exit;
    }
}
}

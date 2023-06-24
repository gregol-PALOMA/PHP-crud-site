<?php
    //TODO: pergunta para a pagina se ja existe aquele objeto e se existe vais editar.
    $alter = isset($m) ? true : false;
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    
    <!--Links GoogleFonts--> 
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rampart+One&display=swap" rel="stylesheet">


    <!--Links Bootstrap--> 
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>


    <style>
        body{
            background-image: url('https://s3-us-west-2.amazonaws.com/s.cdpn.io/1462889/pat-back.svg');
            background-position: center;
            background-repeat: repeat;
            background-color: #fff;
            overflow-x: hidden;
            transition: all 200ms linear;
        }

        #botao-plus {
                width: 75px;
                height: 75px;
                cursor: pointer;
                background-color: red;
                background-image: red;
                border: none;
                border-radius: 50%;
                transition: 200ms;
            }

            #botao-plus span {
                color: white;
                fill: white;
                width: auto;
                height: auto;
                position: absolute;
                transform: translateX(-50%) translateY(-50%);
            }

            #botao-plus:before {
                content: 'Back to Top';
                position: absolute;
                transform: translateX(-50%) translateY(45px);
                font-size: 15px;
                transition: 200ms;
                color: transparent;
                font-weight: bold;
            }

            #botao-plus:hover {
                box-shadow: 0 1px 5px rgba(0,0,0,0.2);
                width: 80px;
                height: 80px;
            }

            #botao-plus:hover::before {
                color: #fff;
            }

            #botao-plus:hover svg {
                    animation: bounce 2s infinite linear;
            }

            @keyframes bounce {
                0% {transform: translateX(-50%) translateY(-50%)}
                25% {transform: translateX(-50%) translateY(-65%)}
                50% {transform: translateX(-50%) translateY(-50%)}
                75% {transform: translateX(-50%) translateY(-35%)}
                100% {transform: translateX(-50%) translateY(-50%)}
            }

            #botao-plus:focus {
                outline: none;
            }
    </style>

<?php
        //TODO: Se há mensagem msg na sessão, mostra com alerta
        if(isset($_SESSION['msg'])){
            $msg = $_SESSION['msg'];
            echo "<script>alert('$msg')</script>";
            unset($_SESSION['msg']); //!destroi variável $_SESSION['msg']
        }
    ?>

    <title></title>
</head>
<body>

        <div class="card mt-4 mx-auto shadow-lg p-3 mb-5 rounded" style="width: 45rem;">
            <form action="./../controll/materiaController.php" method="post">
                <input type="hidden" name="act" value="<?php echo ($alter ? 'edit':'save')?>">
                <inpu type="hidden" name="id" value="value="<?php echo($alter ? $m->id:'')?>>
                <div class="mb-3">
                    <input required name="nome" type="text" class="form-control" id="nomeinput" placeholder="ex: MATEMATICA" value="<?php echo($alter ? $m->nome:'')?>">
                </div>
                <div class="mb-3">
                    <textarea required cols="20" name="descricao" type="text" class="form-control" id="exampleInputEmail1" placeholder="ex: Aula 2x por semana. ..." ><?php echo($alter ? $m->descricao:'')?></textarea>
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-prepend"><span class="input-group-text">R$</span></div>
                    <input required name="preco" type="number" class="form-control" id="exampleInputPassword1" placeholder="59.00" value="<?php echo($alter ? $m->preco:'')?>">
                </div>
                <div class="container-fluid d-flex justify-content-around p-2 ">
                    <button class="btn btn-outline-danger"  style="font-family: 'Rampart One', cursive;" ><strong>ENVIAR</strong></button>
                </div>
            </form>
        </div>

        <div class="container container-fluid mt-5 d-flex justify-content-around">
        <button id="botao-plus" onclick="window.location=('./../view/menu.php');" type="button"><span class="material-symbols-outlined"><span class="material-symbols-outlined">arrow_back_ios_new</span></span></button>
    </div>
   
</body>
</html>

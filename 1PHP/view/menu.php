<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--Links Bootstrap--> 
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>

    <!--Link para ajax -->
    <script type="text/javascript" src="./../js/ajax.js"></script>

    <style>
        #caixa-amostras{
            display: flex;
            justify-content: space-around;
            flex-wrap: wrap;
            flex-direction: row;
            padding: 2%;
        }

        #caixa-amostras div{
            background-color: white;
            margin: 0.5rem;
            width: 25rem;
            padding: 3%;
            box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;
            transition: 0.7s;
            border-bottom: 2px red outset;
        }

        #caixa-amostras div:hover{
            box-shadow: rgba(0, 0, 0, 0.25) 0px 54px 55px, rgba(0, 0, 0, 0.12) 0px -12px 30px, rgba(0, 0, 0, 0.12) 0px 4px 6px, rgba(0, 0, 0, 0.17) 0px 12px 13px, rgba(0, 0, 0, 0.09) 0px -3px 5px;
        }

        /* ESTILO DE FABIO BURGMANN https://codepen.io/fabiocberg*/
            #caixa-amostras a{
            position: relative;
            overflow: hidden;
            border: 1px solid #18181a;
            color: #18181a;
            display: inline-block;
            font-size: 15px;
            line-height: 15px;
            padding: 18px 18px 17px;
            text-decoration: none;
            cursor: pointer;
            background: #fff;
            user-select: none;
            -webkit-user-select: none;
            touch-action: manipulation;
            }

            #caixa-amostras span:first-child {
            position: relative;
            transition: color 600ms cubic-bezier(0.48, 0, 0.12, 1);
            z-index: 10;
            }

            #caixa-amostras span:last-child {
            color: white;
            display: block;
            position: absolute;
            bottom: 0;
            transition: all 500ms cubic-bezier(0.48, 0, 0.12, 1);
            z-index: 100;
            opacity: 0;
            top: 50%;
            left: 50%;
            transform: translateY(225%) translateX(-50%);
            height: 14px;
            line-height: 13px;
            }

            #caixa-amostras a:after {
            content: "";
            position: absolute;
            bottom: -50%;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: black;
            transform-origin: bottom center;
            transition: transform 600ms cubic-bezier(0.48, 0, 0.12, 1);
            transform: skewY(9.3deg) scaleY(0);
            z-index: 50;
            }

            #caixa-amostras a:hover:after {
            transform-origin: bottom center;
            transform: skewY(9.3deg) scaleY(2);
            }

            #caixa-amostras a:hover span:last-child {
            transform: translateX(-50%) translateY(-100%);
            opacity: 1;
            transition: all 900ms cubic-bezier(0.48, 0, 0.12, 1);
            }

            /*BOTAO DE CADASTRO DE MATERIAIS */
            #botao-cadastro{
            text-decoration:none;
            color:black;
            font-size: 20px;
            font-weight: 200;
            letter-spacing: 1px;
            padding: 8px 15px 8px;
            outline: 0;
            border: 1px solid black;
            cursor: pointer;
            position: relative;
            background-color: rgba(0, 0, 0, 0);
            user-select: none;
            -webkit-user-select: none;
            touch-action: manipulation;
            }

            #botao-cadastro:after {
            content: "";
            background-color: red;
            width: 100%;
            z-index: -1;
            position: absolute;
            height: 100%;
            top: 7px;
            left: 7px;
            transition: 0.2s;
            }

            #botao-cadastro:hover:after {
            top: 0px;
            left: 0px;
            }

            @media (min-width: 768px) {
                #botao-cadastro  {
                padding: 13px 50px 13px;
            }
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
        /****************************************************** */

        
    </style>


    <?php
        //TODO: Se há mensagem msg na sessão, mostra com alerta
        if(isset($_SESSION['msg'])){
            $msg = $_SESSION['msg'];
            echo "<script>alert('$msg')</script>";
            unset($_SESSION['msg']); //!destroi variável $_SESSION['msg']
        }
    ?>

    <title>Escola Sesamo</title>
</head>
<body>
    <?php 

    require_once('./../model/materias.class.php');
    require_once('./../model/database.php');

        //TODO: inclui a nav na pagina
        include('./../view/nav.php');
    ?>

    <div class="container container-fluid mt-5 d-flex justify-content-around">
        <a href="./../controll/materiaController.php?act=cad" id="botao-cadastro" class="mx-auto">
            Cadastro Materias
        </a>
    </div>
    
    <div id="caixa-amostras" class="mb-5">
        <?php
            //print_r(materias::listarHTML($pagina));
        ?>
    </div>

    <div class="container container-fluid mt-5 d-flex justify-content-around">
        <button id="botao-plus" onclick="carregaItens();" type="button"><span class="material-symbols-outlined">add</span></button>
    </div>


</body>
<footer>

</footer>
</html>
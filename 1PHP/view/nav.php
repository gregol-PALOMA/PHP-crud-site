<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!--Links Bootstrap--> 
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>

    <!--Links IconsGoogle--> 
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />

    <style>
        body{
            

            background-image: url('https://s3-us-west-2.amazonaws.com/s.cdpn.io/1462889/pat-back.svg');
            background-position: center;
            background-repeat: repeat;
            background-size: 7%;
            background-color: #fff;
            overflow-x: hidden;
            transition: all 200ms linear;
        }
        span{
            color: black;
        }

        .search-box{
            display: flex;
            justify-content: space-around;
        }

        
        .search-box #botao-search {
                width: 4vh;
                height: 4vh;
                margin-left: 1vh;
                cursor: pointer;
                background-color: red;
                background-image: red;
                border: none;
                border-radius: 50%;
                transition: 200ms;
        }

        .search-box #botao-search span {
                color: white;
                fill: white;
                width: auto;
                height: auto;
                position: absolute;
                transform: translateX(-50%) translateY(-50%);
            }

        .search-box #botao-search:before {
                content: 'Back to Top';
                position: absolute;
                transform: translateX(-50%) translateY(45px);
                font-size: 15px;
                transition: 200ms;
                color: transparent;
                font-weight: bold;
            }

        .search-box #botao-search:hover {
                box-shadow: 0 1px 5px rgba(0,0,0,0.2);
                width: 5vh;
                height: 5vh;
            }

        .search-box #botao-search:hover::before {
                color: #fff;
            }

            @keyframes bounce {
                0% {transform: translateX(-50%) translateY(-50%)}
                25% {transform: translateX(-50%) translateY(-65%)}
                50% {transform: translateX(-50%) translateY(-50%)}
                75% {transform: translateX(-50%) translateY(-35%)}
                100% {transform: translateX(-50%) translateY(-50%)}
            }

            .search-box #botao-search:focus {
                outline: none;
            }

        .search-box .input-search, .input-search:focus{
            border: 0;
            outline: 0;
            border-bottom: red solid 0.5px;
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
</head>
<body>
    <div class="shadow-sm p-3 mb-5 bg-white rounded">
        <nav class="navbar  bg-transparent text-dark">
            <div class="container-fluid bg-transparent text-dark justify-content-between">
                <a class="navbar-brand" href="./../view/menu.php">
                    <img src="./img/Logotipo Nome Minimalista Branco e Preto.png" alt="Logo" width="auto" height="33" >
                </a>

                <form class="search-box">
                    <input id="search" class="input-search" type="search" placeholder="Insira sua pesquisa" aria-label="Search">
                    <button id="botao-search" onclick="buscarNome();" type="submit"><span class="material-symbols-outlined">search</span></button>
                </form>

                <div class="p-2">
                    <a class="" href="./../controll/signinController.php?act=cad"><span class="material-symbols-outlined">person</span></a>
                    <a class="" href="./../controll/loginController.php?action=sair"><span class="material-symbols-outlined">logout</span></a>
                </div>
            </div>
        </nav>
    </div>
    
</body>
</html>
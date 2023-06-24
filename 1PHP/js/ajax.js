var pagina = 0;

//TODO: Objeto JS para req AJAX
var xhhtp = new XMLHttpRequest();


function montaTabela(){
    //TODO: Trata a resposta do AJAX
    if (xhhtp.readyState == 4 && xhhtp.status == 200) {

        var tabela = document.getElementById('caixa-amostras');
        tabela.innerHTML += xhhtp.responseText;

        pagina += 5;
    }
}

function carregaItens(){

    //TODO: Define o endereço que será equisitado assincronamente ()
    xhhtp.open('GET', './../controll/materiaController.php?pagina='+ pagina, true);

    //TODO: Função chamada quando a resposta voltar
    xhhtp.onreadystatechange = montaTabela;
    
    //TODO: Envia requisição
    xhhtp.send();
}

function buscarNome(){
    var nome = document.getElementById('search').value;
    var tabela = document.getElementById('caixa-amostras');

    
}
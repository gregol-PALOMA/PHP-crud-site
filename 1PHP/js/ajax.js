var pagina = 0;

//TODO: Objeto JS para req AJAX
var xhhtp = new XMLHttpRequest();


function montaTabela(){
    //TODO: Trata a resposta do AJAX
    if (xhhtp.readyState == 4 && xhhtp.status == 200) {

        var resultados = null;

        var tabela = document.getElementById('caixa-amostras');

        resultados = JSON.parse(xhhtp.responseText);

        if (resultados) {
            tabela.innerHTML = '';

            for (let index = 0; index < resultados.length; index++) {
                var materias = resultados[index];

                //TODO: Constrói o HTML para cada item na tabela
                var htmlItem = "\
                    <div>\
                        <h1>" + materias.nome + "</h1>\
                        <p>" + materias.descricao + "</p>\
                        <h3>" + materias.preco + "</h3>\
                        <a href=\"./../controll/materiaController.php?act=alter&id=" + materias.id + "\">\
                            <span class=\"material-symbols-outlined\">edit</span>\
                            <span class=\"material-symbols-outlined\">done</span>\
                        </a>\
                        <a href=\"./../controll/materiaController.php?act=delete&id=" + materias.id + "\">\
                            <span class=\"material-symbols-outlined\">delete</span>\
                            <span class=\"material-symbols-outlined\">done</span>\
                        </a>\
                    </div>";

                tabela.innerHTML += htmlItem;
                
            }
        } else {
            tabela.innerHTML = xhhtp.responseText;
            pagina += 5;
        } 
    }
}

function buscaNome(){
    var busca = document.getElementById('search').value;

    //TODO: Define o endereço que será equisitado assincronamente ()
    xhhtp.open('GET', './../controll/materiaController.php?busca='+ busca, true);

    //TODO: Função chamada quando a resposta voltar
    xhhtp.onreadystatechange = montaTabela;
    
    //TODO: Envia requisição
    xhhtp.send();
}

function carregaItens(){

    //TODO: Define o endereço que será equisitado assincronamente ()
    xhhtp.open('GET', './../controll/materiaController.php?pagina='+ pagina, true);

    //TODO: Função chamada quando a resposta voltar
    xhhtp.onreadystatechange = montaTabela;
    
    //TODO: Envia requisição
    xhhtp.send();
}

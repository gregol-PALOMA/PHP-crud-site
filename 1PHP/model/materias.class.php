<?php
require_once('./../model/database.php');

class materias{

    private $id;
    private $nome;
    private $descricao;
    private $preco;

    //TODO: Cria um construtor para a classe
    public function __construct( $nome, $descricao, $preco){
        $this->nome = $nome;
        $this->descricao = $descricao;
        $this->preco = $preco;
    }


    //TODO: Cria getters para todos os atributos do objeto
    public function __get($n){
        return $this->$n;
    }

    //TODO: Cria setter para todos os atributos do objeto
    public function __set($nome, $value){
        if (property_exists('materia', $nome)) {
            $this->$nome = $value;
        }else {
            null;
        }
    }


    public function cadastrarMateria(){
        //TODO: Faz a conexão com o Database
        $con = database::conecta();

        //TODO: Prepara o SQL com a tabela correta
        $stmt = $con->prepare("INSERT INTO materias(nome, descricao, preco) VALUES(:nome,:descricao, :preco)");

        //TODO: Insere os valores no comando
        $stmt->bindValue(':nome', $this->nome);
        $stmt->bindValue(':descricao', $this->descricao);
        $stmt->bindValue(':preco', $this->preco);

        //TODO: Executa o comando
        $stmt->execute();

    }

    public static function listarMateria($pagina){

        $materias = array();

        //TODO: Faz a conexão com o Database
        $con = database::conecta();

        //TODO: Prepara o SQL com a tabela correta
        $stmt = $con->prepare("SELECT * FROM materias LIMIT 5 OFFSET :pagina");
        $stmt->bindValue(':pagina', $pagina);

        //TODO: Executa o comando
        $stmt->execute();

        while ($linha = $stmt->fetch()) {
            $m = new materias(
                mb_strtoupper($linha['nome']),
                $linha['descricao'],
                $linha['preco']
            );

            $m->id = $linha['id'];

            $materias[] = $m;
        }

        return $materias;
    }


    public static function listarHTML($pagina){
            foreach(materias::listarMateria($pagina) as $materia){
                echo"
                    <div>
                        <h1>{$materia->nome}</h1>
                        <p>{$materia->descricao}</p>
                        <h3>{$materia->preco}</h3>
                        <a href=\"./../controll/materiaController.php?act=alter&id={$materia->id}\"><span class=\"material-symbols-outlined\">
                        edit
                        </span><span class=\"material-symbols-outlined\">
                        done
                        </span></a>
                        <a href=\"./../controll/materiaController.php?act=delete&id={$materia->id}\"><span class=\"material-symbols-outlined\">
                        delete
                        </span><span class=\"material-symbols-outlined\">
                        done
                        </span></a>
                    </div>";
            }
    }

    public static function apagar($id){
        try {
        //TODO: Faz a conexão com o Database
        $con = database::conecta();

        //TODO: Prepara o SQL com a tabela correta
        $stmt = $con->prepare("DELETE FROM materias WHERE id=:id");
        $stmt -> bindParam(':id', $id);
        
        //TODO: Executa o comando
        return $stmt->execute();

        
        } catch (PDOException $e) {
            die("Erro ao excluir materia".$e->getMessage());
        }
    }

    public static function buscar($id){
        //TODO: Faz a conexão com o Database
        $con = database::conecta();

        //TODO: Prepara o SQL com a tabela correta
        $stmt = $con->prepare("SELECT * FROM materias WHERE id = :id");

        //TODO: Insere os valores no comando
        $stmt->bindValue(':id', $id);

        //TODO: Executa o comando
        $stmt->execute();

        $m = null;
        if($resultado = $stmt->fetch()){
            $m = new materias($resultado['nome'], $resultado['descricao'], $resultado['preco']);
            $m->id = $resultado['id'];
        }

        return $m;
    }

    public static function atualizar(){

        //TODO: Faz a conexão com o Database
        $con = database::conecta();
    
        //TODO: Prepara o SQL com a tabela correta
        $stmt = $con->prepare("UPDATE materias SET nome=:nome, descricao=:descricao, preco=:preco WHERE id = :id");
    
        //TODO: Insere os valores no comando
        $stmt->bindValue(':id', $this->id);
        $stmt->bindValue(':nome', $this->nome);
        $stmt->bindValue(':descricao', $this->descricao);
        $stmt->bindValue(':preco', $this->preco);
    
        //TODO: Executa o comando
        $stmt->execute();
    }
}
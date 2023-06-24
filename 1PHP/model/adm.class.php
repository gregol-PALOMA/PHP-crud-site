<?php
require_once('./../model/database.php');

class Adm{
    private $id;
    private $nome;
    private $email;
    private $senha;

     //TODO: Cria um construtor para a classe
     public function __construct( $nome, $email, $senha){
        $this->nome = $nome;
        $this->email = $email;
        $this->senha = $senha;
    }

    //TODO: Cria getters para todos os atributos do objeto
    public function __get($n){
        return $this->$n;
    }

    //TODO: Cria setter para todos os atributos do objeto
    public function __set($nome, $value){
        if (property_exists('Administrador', $nome)) {
            $this->$nome = $value;
        }else {
            null;
        }
    }

    //TODO: Cria cookie para lembrar dados
    public static function remember($cookie_valor){
        setcookie("remember_user", $cookie_valor, time() + 604800, "/", "");
    }

    //TODO: Desliga cookie caso o usuario saia
    public static function forget($cookie_valor){
        setcookie("remember_user", $cookie_valor, time() - 3600, "/", "");
    }

    function cadastroADM(){
         //TODO: Faz a conexão com o Database
         $con = database::conecta();

         //TODO: Prepara o SQL com a tabela correta
         $stmt = $con->prepare("INSERT INTO administradores(nome, email, senha) VALUES(:nome,:email,:senha)");

         //TODO: Calcula o hash MD5 da senha fornecida
         $senhaHash = md5($this->senha);
 
         //TODO: Insere os valores no comando
         $stmt->bindValue(':nome', $this->nome);
         $stmt->bindValue(':email', $this->email);
         $stmt->bindValue(':senha', $senhaHash);
 
         //TODO: Executa o comando
         $stmt->execute();
     }


    function logar(){
        
        //TODO: Faz a conexão com o Database
        $con = database::conecta();

        //TODO: Prepara o SQL com a tabela correta
        $stmt = $con->prepare("SELECT * FROM administradores WHERE email = :email AND senha = :senha");

        //TODO: Calcula o hash MD5 da senha fornecida
        $senhaHash = md5($this->senha);

        //TODO: Insere os valores no comando
        $stmt->bindValue(':email', $this->email);
        $stmt->bindValue(':senha', $senhaHash);

        //TODO: Executa o comando
        $stmt->execute();

        //TODO: Obtém o resultado da consulta
        $linha = $stmt->fetch();

        
        if ($linha) { // Teste para ver se encontrou algum registro
            $this->nome = $linha['nome'];
            header('Location:./../view/menu.php');
            return true;
        } else {
            return false;
        }
    }
}
<?php

class database{
    private const DSN = 'pgsql:dbname=reforcoEscolar;host=localhost';
    private const DUSER = 'postgres';
    private const DPASSWORD = 'postgres';
    private static $conexao = null;

    static function conecta(){
        
        try {
            //TODO: Cria objeto PDO, conecta com BD e retorna conexão.
            database::$conexao = new PDO(database::DSN, database::DUSER, database::DPASSWORD);

            //TODO: Diz que erros relacionados ao BD serão tratados
            database::$conexao->setAttribute(
                PDO::ATTR_ERRMODE, 
                PDO::ERRMODE_EXCEPTION
            );

            //TODO: Retorna conexão PDO
            return database::$conexao;

        } catch (Exception $e) {
            throw new Exception("Erro ao conectar com o banco de dados: ".$e->getMessage());
        }
    }
}
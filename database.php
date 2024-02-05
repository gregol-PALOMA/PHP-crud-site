<?
    class database{
        private const DSN = 'mysql:dbname=reforcoescolar;port=3306;host=localhost';
        private const DUSER = 'root';
        private const DPASSWORD = '';
        // private const DSN = 'pgsql:dbname=reforcoEscolar;host=localhost';
        // private const DUSER = 'postgres';
        // private const DPASSWORD = 'postgres';
        private static $conection = null;

        static function conect(){
        
            try {
                database::$conection = new PDO(database::DSN, database::DUSER, database::DPASSWORD);
    
                database::$conection->setAttribute(
                    PDO::ATTR_ERRMODE, 
                    PDO::ERRMODE_EXCEPTION
                );
    
                return database::$conection;
            } catch (PDOException $e) {
                echo 'Conexão falhou: ' . $e->getMessage();
            }
        }
    }
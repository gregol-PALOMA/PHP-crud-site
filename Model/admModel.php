<?
    require_once('./../database.php');

    class adm{
        private $name;
        private $email;
        private $password;

        public function __contruct($name, $email, $password){
            $this->name = $name;
            $this->email = $email;
            $this->password = $password;
        }

        
    }

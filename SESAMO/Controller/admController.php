<<<<<<< HEAD
<?
    require_once './Model/admModel.php';
    require_once './database.php';

    function registerAdm($name, $email, $password){
        $con = database::conect();

        try {
            $stmt = $con->prepare("INSERT INTO admin(name, email, password) VALUES(:name, :email, :password)");

            $stmt->bindValue(':name', $name);
            $stmt->bindValue(':email', $email);
        
            $passwordHash = md5($password);

            $stmt->bindValue(':password', $passwordHash);

            $stmt->execute();
        } catch (PDOException $e) {
            echo "Erro ao cadastrar administrador: " . $e->getMessage();
        }   
=======
<?
    require_once './Model/admModel.php';
    require_once './database.php';

    function registerAdm($name, $email, $password){
        $con = database::conect();

        try {
            $stmt = $con->prepare("INSERT INTO admin(name, email, password) VALUES(:name, :email, :password)");

            $stmt->bindValue(':name', $name);
            $stmt->bindValue(':email', $email);
        
            $passwordHash = md5($password);

            $stmt->bindValue(':password', $passwordHash);

            $stmt->execute();
        } catch (PDOException $e) {
            echo "Erro ao cadastrar administrador: " . $e->getMessage();
        }   
>>>>>>> d2b7ada15b56dc488a704fb1f97bb136043156e1
    }
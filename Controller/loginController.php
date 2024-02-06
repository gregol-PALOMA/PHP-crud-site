<?
    require_once './Model/admModel.php';
    require_once './Model/userModel.php';
    require_once './database.php';

    function login($email, $password) {
        $con = database::conect();
 
        try {
            $stmt = $con->prepare("SELECT * FROM user WHERE email = :email AND password = :password");

            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':password', $password);

            $stmt->execute();

            $result = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($result) {
                session_start();
                $_SESSION['user'] = $result;
                header('Location: ./View/home.php');
            } else {
                $stmt = $con->prepare("SELECT * FROM adm WHERE email = :email AND password = :password");

                $stmt->bindParam(':email', $email);
                $stmt->bindParam(':password', $password);

                $stmt->execute();

                $result = $stmt->fetch(PDO::FETCH_ASSOC);

                if(!$result) {
                    echo "Email ou senha inválidos";
                } else {
                    session_start();
                    $_SESSION['adm'] = $result;
                    header('Location: ./View/home.php');
                }
            }
           
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
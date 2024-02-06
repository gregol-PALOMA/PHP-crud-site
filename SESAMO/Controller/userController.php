<?
    require_once './Model/userModel.php';
    require_once './database.php';

    function deleteUser($id){
        $con = database::conect();

        try {
            $stmt = $con->prepare("DELETE FROM user WHERE id = :id");

            $stmt->bindValue(':id', $id);

            $stmt->execute();
        } catch (PDOException $e){
            echo "Erro ao deletar usuário: " . $e->getMessage();
        }
    }
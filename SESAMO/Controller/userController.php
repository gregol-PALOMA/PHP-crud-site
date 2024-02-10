<<<<<<< HEAD
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
=======
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
>>>>>>> d2b7ada15b56dc488a704fb1f97bb136043156e1
    }
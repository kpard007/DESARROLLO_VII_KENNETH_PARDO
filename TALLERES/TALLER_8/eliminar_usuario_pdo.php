<?php
require_once "config_pdo.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try{

        $id = $_POST['id'];

        $sql = "DELETE FROM usuarios WHERE id = :id";

        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);


        if ($stmt->execute()) {
            throw new Exception ("Error en la consulta: " . $stmt->errorInfo()[2]);
        }
        echo "Usuario eliminado con éxito";
    } catch (Exception $e){
        logError($e->getMessage());
        echo "Ocurrio un error: " . $e->getMessage();
    } finally{
        unset($stmt);
        unset($pdo);
    }

}
function logError($message){
    $archivo ='error_log.txt';
    $actual = "[" . date("Y-m-d H:i:s") . "]" . $message . PHP_EOL;
    file_put_contents($archivo, $actual, FILE_APPEND);

}
    
?>

<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
    <div><label>ID</label><input type="text" name="id" required></div>
    <input type="submit" value="Eliminar Usuario">
</form>

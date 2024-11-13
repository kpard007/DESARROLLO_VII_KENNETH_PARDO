<?php
require_once('../db/conexion.php');
 
class Libro {

    private $pdo;

    public function __construct() {
        $this->pdo = (new Conexion())->getConnection(); 
    } 

    // Obtener libros guardados por el usuario
    public function librosFavoritosGuardados($user_id) {
        $sql = "SELECT * FROM libros_guardados WHERE user_id = :user_id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':user_id', $user_id, PDO::PARAM_STR); 
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_OBJ);
        
        return $result;
    }

    public function eliminarDeFavoritos($user_id, $google_books_id) {  
        $sql = "DELETE FROM libros_guardados WHERE user_id = :user_id AND google_books_id = :google_books_id";  
        $stmt = $this->pdo->prepare($sql);  
        $stmt->bindParam(':user_id', $user_id);  
        $stmt->bindParam(':google_books_id', $google_books_id);  
        
        // Devuelve verdadero o falso según el resultado   
        return $stmt->execute(); 
    }   

    public function agregarAFavoritos($user_id, $google_books_id, $titulo, $autor, $imagen, $reseña) {
        try {
            // Verificar si el libro ya está en los favoritos
            $sql = "SELECT COUNT(*) FROM libros_guardados WHERE user_id = :user_id AND google_books_id = :google_books_id";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam(':user_id', $user_id, PDO::PARAM_STR);
            $stmt->bindParam(':google_books_id', $google_books_id, PDO::PARAM_STR);
            $stmt->execute();
            $existing_book_count = $stmt->fetchColumn();
    
            if ($existing_book_count > 0) {
                return false;  
            }
    
    
            $sql = "INSERT INTO libros_guardados (user_id, google_books_id, titulo, autor, imagen_portada, resena_personal) 
                    VALUES (:user_id, :google_books_id, :titulo, :autor, :imagen_portada, :resena_personal)";
            
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam(':user_id', $user_id, PDO::PARAM_STR);
            $stmt->bindParam(':google_books_id', $google_books_id, PDO::PARAM_STR);
            $stmt->bindParam(':titulo', $titulo, PDO::PARAM_STR);
            $stmt->bindParam(':autor', $autor, PDO::PARAM_STR);
            $stmt->bindParam(':imagen_portada', $imagen, PDO::PARAM_STR);
            $stmt->bindParam(':resena_personal', $reseña, PDO::PARAM_STR);
            $stmt->execute();
            // Retornar verdadero si la inserción es exitosa
            return true; 
        } catch (Exception $e) {
            error_log($e->getMessage());
            return false;
        }
    }
    
}
?>



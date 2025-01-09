<?php
require_once __DIR__ . '/../config/database.php';

class Usuario {
    private $conn;

    public function __construct() {
        $database = new Database();
        $this->conn = $database->getConnection();
    }
 
    public function autenticar($login, $senha) {
        $query = "SELECT * FROM tbl_usuario WHERE login = :login AND senha = :senha";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':login', $login);
        $stmt->bindParam(':senha', $senha);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }


    public function verificarLoginExistente($login) {
        $query = "SELECT COUNT(*) AS count FROM tbl_usuario WHERE login = :login";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':login', $login);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC)['count'] > 0;
    }

 
    public function criarUsuario($login, $senha) {
        $query = "INSERT INTO tbl_usuario (login, senha) VALUES (:login, :senha)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':login', $login);
        $stmt->bindParam(':senha', $senha);

        return $stmt->execute();
    }
}
?>

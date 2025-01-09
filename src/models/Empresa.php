<?php
require_once __DIR__ . '/../config/database.php'; 

class Empresa {
    private $conn;

    public function __construct() {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

 
    public function listarEmpresas() {
        $query = "SELECT * FROM tbl_empresa ORDER BY nome ASC";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

  
    public function criarEmpresa($nome) {
        $query = "INSERT INTO tbl_empresa (nome) VALUES (:nome)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':nome', $nome);

        return $stmt->execute();
    }

 
    public function obterEmpresaPorId($id) {
        $query = "SELECT * FROM tbl_empresa WHERE id_empresa = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
?>

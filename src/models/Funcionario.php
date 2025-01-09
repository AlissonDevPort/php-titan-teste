<?php
require_once __DIR__ . '/../config/database.php';

class Funcionario {
    private $conn;

    public function __construct() {
        $database = new Database();
        $this->conn = $database->getConnection();
    }


    public function listarFuncionarios() {
        $query = "SELECT f.*, e.nome AS empresa 
                  FROM tbl_funcionario f 
                  INNER JOIN tbl_empresa e ON f.id_empresa = e.id_empresa
                  ORDER BY f.nome ASC";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


    public function criarFuncionario($nome, $cpf, $rg, $email, $id_empresa, $salario, $data_cadastro) {
        $query = "INSERT INTO tbl_funcionario (nome, cpf, rg, email, id_empresa, salario, data_cadastro) 
                  VALUES (:nome, :cpf, :rg, :email, :id_empresa, :salario, :data_cadastro)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':cpf', $cpf);
        $stmt->bindParam(':rg', $rg);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':id_empresa', $id_empresa);
        $stmt->bindParam(':salario', $salario);
        $stmt->bindParam(':data_cadastro', $data_cadastro);

        return $stmt->execute();
    }


    public function atualizarFuncionario($id_funcionario, $nome, $cpf, $rg, $email, $id_empresa, $salario) {
        $query = "UPDATE tbl_funcionario 
                  SET nome = :nome, cpf = :cpf, rg = :rg, email = :email, id_empresa = :id_empresa, salario = :salario 
                  WHERE id_funcionario = :id_funcionario";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':cpf', $cpf);
        $stmt->bindParam(':rg', $rg);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':id_empresa', $id_empresa);
        $stmt->bindParam(':salario', $salario);
        $stmt->bindParam(':id_funcionario', $id_funcionario);

        return $stmt->execute();
    }

    public function excluirFuncionario($id_funcionario) {
        $query = "DELETE FROM tbl_funcionario WHERE id_funcionario = :id_funcionario";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id_funcionario', $id_funcionario);

        return $stmt->execute();
    }

 
    public function obterFuncionarioPorId($id_funcionario) {
        $query = "SELECT * FROM tbl_funcionario WHERE id_funcionario = :id_funcionario";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id_funcionario', $id_funcionario);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
?>

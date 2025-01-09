<?php
require_once '../src/models/Funcionario.php';
require_once '../src/models/Empresa.php';

class FuncionarioController {

   
    public function listar() {
        session_start();
        if (!isset($_SESSION['usuario'])) {
            header('Location: ?controller=login&action=index'); 
            exit;
        }

        $funcionarioModel = new Funcionario();
        $funcionarios = $funcionarioModel->listarFuncionarios();

        require_once '../src/views/listar_funcionarios.php';
    }
    public function cadastrar() {
        $empresaModel = new Empresa();
        $empresas = $empresaModel->listarEmpresas();

        require_once '../src/views/cadastrar_funcionario.php';
    }


    public function salvar() {
        $nome = $_POST['nome'];
        $cpf = $_POST['cpf'];
        $rg = $_POST['rg'];
        $email = $_POST['email'];
        $id_empresa = $_POST['id_empresa'];
        $salario = $_POST['salario'];
        $data_cadastro = date('Y-m-d');

        if (empty($nome) || empty($cpf) || empty($email) || empty($id_empresa)) {
            echo "<script>alert('Todos os campos obrigatórios devem ser preenchidos!');</script>";
            $this->cadastrar();
            return;
        }

        $funcionarioModel = new Funcionario();
        if ($funcionarioModel->criarFuncionario($nome, $cpf, $rg, $email, $id_empresa, $salario, $data_cadastro)) {
            echo "<script>alert('Funcionário cadastrado com sucesso!');</script>";
            header('Location: ?controller=funcionario&action=listar');
        } else {
            echo "<script>alert('Erro ao cadastrar funcionário!');</script>";
            $this->cadastrar();
        }
    }

    public function excluir() {
        $id_funcionario = $_GET['id'];

        $funcionarioModel = new Funcionario();
        if ($funcionarioModel->excluirFuncionario($id_funcionario)) {
            echo "<script>
            alert('Funcionário excluído com sucesso!');
            window.location.href = '/?controller=funcionario&action=listar'
            </script>";
        } else {
            echo "<script>alert('Erro ao excluir funcionário!');</script>";
        }
        $this->listar();
    }

    public function editar() {
        $id_funcionario = $_GET['id'];
        $funcionarioModel = new Funcionario();
        $funcionario = $funcionarioModel->obterFuncionarioPorId($id_funcionario);
    
        if (!$funcionario) {
            echo "<script>alert('Funcionário não encontrado!');</script>";
            header('Location: ?controller=funcionario&action=listar');
            exit;
        }
    
        $empresaModel = new Empresa();
        $empresas = $empresaModel->listarEmpresas();

        require_once '../src/views/cadastrar_funcionario.php';
    }


    public function atualizar() {
        $id_funcionario = $_POST['id_funcionario'];
        $nome = $_POST['nome'];
        $cpf = $_POST['cpf'];
        $rg = $_POST['rg'];
        $email = $_POST['email'];
        $id_empresa = $_POST['id_empresa'];
        $salario = $_POST['salario'];

        if (empty($nome) || empty($cpf) || empty($email) || empty($id_empresa)) {
            echo "<script>alert('Todos os campos obrigatórios devem ser preenchidos!');</script>";
            $this->editar();
            return;
        }

        $funcionarioModel = new Funcionario();
        if ($funcionarioModel->atualizarFuncionario($id_funcionario, $nome, $cpf, $rg, $email, $id_empresa, $salario)) {
            echo "<script>
                    alert('Funcionário atualizado com sucesso!')
                    window.location.href = '/?controller=funcionario&action=listar'
            </script>";
        } else {
            echo "<script>alert('Erro ao atualizar funcionário!');</script>";
            $this->editar();
        }
    }
}
?>
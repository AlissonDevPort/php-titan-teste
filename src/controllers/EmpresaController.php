<?php
require_once '../src/models/Empresa.php';

class EmpresaController {
    public function cadastrar() {
        require_once '../src/views/cadastrar_empresa.php';
    }

    public function salvar() {
        $nome = $_POST['nome'];

        if (empty($nome)) {
            echo "<script>alert('O nome da empresa é obrigatório!');</script>";
            $this->cadastrar();
            return;
        }

        $empresa = new Empresa();
        if ($empresa->criarEmpresa($nome)) {
            echo "<script>
            alert('Empresa cadastrada com sucesso!')
            window.location.href = '/?controller=funcionario&action=listar'
            </script>";
        } else {
            echo "<script>alert('Erro ao cadastrar empresa!');</script>";
            $this->cadastrar();
        }
    }
}
?>

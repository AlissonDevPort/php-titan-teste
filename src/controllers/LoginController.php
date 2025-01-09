<?php
require_once '../src/models/Usuario.php';

class LoginController {
  
    public function index() {
        require_once '../src/views/login.php';
    }

    public function autenticar() {
        $login = $_POST['login'];
        $senha = md5($_POST['senha']);

        $usuario = new Usuario();
        $resultado = $usuario->autenticar($login, $senha);

        if ($resultado) {
            session_start();
            $_SESSION['usuario'] = $resultado['id_usuario'];
            header('Location: ?controller=funcionario&action=listar');
            exit;  
        } else {
            echo "<script>alert('Login ou senha inválidos!');</script>";
            $this->index();
        }
    }

    public function logout() {
        session_start();
        session_destroy();
        header('Location: ?controller=login&action=index');
        exit;
    }
}
?>

<?php

require_once "../php/conexao.php";

class AuthController {
    private $conn;

    public function __construct() {
        $this->conn = $GLOBALS['conn'];
    }

    public function login() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Verifique as credenciais do usuário no banco de dados
            $login = $_POST["login"];
            $senha = $_POST["senha"];

            // Consulta SQL para verificar as credenciais
            $query = "SELECT id_usuario, cargo, id_empresa_user, nome_usuario FROM usuarios WHERE login = ? AND senha = ?";
            $stmt = $this->conn->prepare($query);
            $stmt->bind_param("ss", $login, $senha);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows == 1) {
                // Login bem-sucedido
                $row = $result->fetch_assoc();

                $query2 = "SELECT id_aluno FROM alunos WHERE id_usuario_aluno = ?";
                $stmt2 = $this->conn->prepare($query2);
                $stmt2->bind_param("i", $row['id_usuario']);
                $stmt2->execute();
                $result2 = $stmt2->get_result();
                $row2 = $result2->fetch_assoc();

                session_start();
                $_SESSION['id_aluno'] = $row2['id_aluno'];
                $_SESSION['login'] = $row['login'];
                $_SESSION['nome_usuario'] = $row['nome_usuario'];
                $_SESSION['id_usuario'] = $row['id_usuario'];
                $_SESSION['cargo'] = $row['cargo'];
                $_SESSION['id_empresa_user'] = $row['id_empresa_user'];

                // Redirecione com base no cargo do usuário
                $this->redirectUser($row['cargo']);
            } else {
                // Login inválido
                echo "<script language='javascript' type='text/javascript'>alert('Credenciais inválidas!');window.location.href='/';</script>";
            }
        }
    }

    public function loginAutomatico($login, $senha) {
        // Consulta SQL para verificar as credenciais
        $query = "SELECT id_usuario, cargo, id_empresa_user, nome_usuario FROM usuarios WHERE login = ? AND senha = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("ss", $login, $senha);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows == 1) {
            // Login bem-sucedido
            $row = $result->fetch_assoc();

            session_start();
            $_SESSION['login'] = $login;
            $_SESSION['nome_usuario'] = $row['nome_usuario'];
            $_SESSION['id_usuario'] = $row['id_usuario'];
            $_SESSION['cargo'] = $row['cargo'];
            $_SESSION['id_empresa_user'] = $row['id_empresa_user'];

            // Redirecione com base no cargo do usuário
            $this->redirectUser($row['cargo']);
        } else {
            // Login inválido
            echo "<script language='javascript' type='text/javascript'>alert('Credenciais inválidas!');window.location.href='/';</script>";
        }
    }

    private function redirectUser($cargo) {
        switch ($cargo) {
            case "gerente":
            case "Gerente":
                header("Location: /listar");
                break;
            case "funcionario":
            case "Funcionario":
                header("Location: /listar_funcionario");
                break;
            case "secretario":
            case "Secretario":
            case "Secretário":
                header("Location: /listar_secretario");
                break;
            case "Aluno":
            case "aluno":
                header("Location: /listar_aluno");
                break;
            case "ex-aluno":
            case "Ex-Aluno":
                header("Location: /listar_ex_aluno");
                break;
            default:
                // Redirecione para uma página padrão ou mostre uma mensagem de erro
                break;
        }
        exit(); // Saia após o redirecionamento
    }
}

// Uso do controlador para fazer login
$authController = new AuthController();
$authController->login();

?>
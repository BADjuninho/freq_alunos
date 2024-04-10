<?php
require_once "php/conexao.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verifique as credenciais do usuário no banco de dados
    $login = $_POST["login"];
    $senha = $_POST["senha"];

    // Consulta SQL para verificar as credenciais
    $query = "SELECT * FROM usuarios WHERE login = '$login' AND senha = '$senha'";
    $result = mysqli_query($conn, $query);

    if (isset($_POST['lembrar']) && $_POST['lembrar'] == 'on') {
        setcookie('lembrar_usuario', $login, time() + (86400 * 30), "/");
    }

    if (mysqli_num_rows($result) == 1) {
        // Login bem-sucedido
        $row = mysqli_fetch_assoc($result);
        session_start();
        $_SESSION['login'] = $row['login'];
        $_SESSION['nome_usuario'] = $row['nome_usuario'];
        $_SESSION['id_usuario'] = $row['id_usuario'];
        $_SESSION['cargo'] = $row['cargo'];
        $_SESSION['id_empresa_user'] = $row['id_empresa_user'];

        // Redirecione com base no cargo do usuário
        if ($row['cargo'] === "gerente" || $row['cargo'] === "Gerente")  {
            header("Location: /listar");
        } else if ($row['cargo'] === "funcionario" || $row['cargo'] === "Funcionario") {
            header("Location: /listar_funcionario");
        } else if ($row['cargo'] === "secretario" || $row['cargo'] === "Secretario" || $row['cargo'] === "Secretário") {
            header("Location: /listar_secretario");
        }
        exit(); // Saia após o redirecionamento
    } else {
        // Login inválido
        echo "<script language='javascript' type='text/javascript'>alert('Credenciais inválidas!');window.location.href='/';</script>";
    }
}

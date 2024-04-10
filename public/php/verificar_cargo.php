<?php
session_start(); // Certifique-se de que a sessão esteja iniciada

if (isset($_SESSION['cargo'])) {
    $cargo = $_SESSION['cargo'];

    if ($cargo === "gerente" || $cargo === "Gerente") {
        require "php/menu.php";
    } elseif ($cargo === "funcionario" || $cargo === "Funcionario") {
        require "php/menu_funcionario.php";
    } elseif ($cargo === "secretario" || $cargo === "Secretario" || $cargo === "Secretário") {
        require "php/menu_secretario.php";
    }
} else {
    echo "A variável de sessão 'cargo' não está definida.";
}
?>

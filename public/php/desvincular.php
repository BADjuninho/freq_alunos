<?php
require_once "../php/conexao.php";

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $cpf = $_GET["cpf"];

    $consulta_empresa = "SELECT id_empresa_user FROM usuarios WHERE cpf_usuario = '$cpf'";
    $resultado_empresa = $conn->query($consulta_empresa);

    if ($resultado_empresa->num_rows > 0) {
        $row = $resultado_empresa->fetch_assoc();
        $id_empresa = $row["id_empresa_user"];

        // Atualiza o campo id_empresa_user para NULL para desvincular o usuário da empresa
        $atualizar_usuario = "UPDATE usuarios SET id_empresa_user = NULL WHERE cpf_usuario = '$cpf'";

        if ($conn->query($atualizar_usuario) === TRUE) {
            echo "<script language='javascript' type='text/javascript'>alert('Usuário desvinculado da empresa com sucesso!');window.location.href='/listar_usuarios';</script>";
        } else {
            echo "Erro ao desvincular usuário da empresa: " . $conn->error;
        }
    } else {
        echo "<script language='javascript' type='text/javascript'>alert('CPF do usuário não encontrado.');window.location.href='/listar_usuarios';</script>";
    }
}

$conn->close();
?>

<?php
require_once "../php/conexao.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $cnpj = $_POST["cnpj"];
    $cpf = $_POST["cpf"];

    // Consulta o ID da empresa com base no CNPJ fornecido
    $consulta_empresa = "SELECT id_empresa FROM empresa WHERE cnpj_empresa = '$cnpj'";
    $resultado_empresa = $conn->query($consulta_empresa);

    if ($resultado_empresa->num_rows > 0) {
        $row = $resultado_empresa->fetch_assoc();
        $id_empresa = $row["id_empresa"];

        // Atualiza o campo id_empresa_user na tabela usuarios com o ID da empresa correspondente
        $atualizar_usuario = "UPDATE usuarios SET id_empresa_user = '$id_empresa' WHERE cpf_usuario = '$cpf'";

        if ($conn->query($atualizar_usuario) === TRUE) {
            echo "<script language='javascript' type='text/javascript'>alert('Usuario Vinculado Com Sucesso!');window.location.href='/vinc_usuario';</script>";
        } else {
            echo "Erro ao vincular usuário à empresa: " . $conn->error;
        }
    } else {
        echo "<script language='javascript' type='text/javascript'>alert('Erro Ao Vincular Usuario');window.location.href='/vinc_usuario';</script>";
    }
}

$conn->close();
?>

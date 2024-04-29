<?php

require_once "../php/conexao.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $id = $_POST["id"];
    $status = $_POST["status"];


    $sql = "UPDATE solicitacoes SET status_sol = '$status' WHERE id_aluno_sol = '$id'";

    if ($conn->query($sql) === TRUE) {
        echo "<script language='javascript' type='text/javascript'>alert('Solicitacao Atualizada com sucesso!');window.location.href='/listar';</script>";
    } else {
        echo "Erro ao atualizar cliente: " . $conn->error;
    }
}
$conn->close();
?>

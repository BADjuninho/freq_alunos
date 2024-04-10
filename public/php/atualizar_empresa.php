<?php

require_once "../php/conexao.php";

if ($_SERVER["REQUEST_METHOD"] == "GET") {

    $id = $_GET["id"];
    $nome = $_GET["nome"];
    $telefone = $_GET["telefone"];
    $endereco = $_GET["endereco"];


    if($nome != "" && $telefone != "" && $endereco != ""){
        $sql_empresa = "UPDATE empresa SET nome_empresa = '$nome', telefone = '$telefone', endereco = '$endereco' WHERE id_empresa = '$id'";

        //atualiza o campo id_empresa_user na tabela usuarios para NULL
        $sql_usuarios = "UPDATE usuarios SET id_empresa_user = NULL WHERE id_empresa_user = '$id'";

        if ($conn->query($sql_empresa) === TRUE) {
            // Executa a query para atualizar o campo id_empresa_user na tabela usuarios
            if ($conn->query($sql_usuarios) === TRUE) {
                echo "<script language='javascript' type='text/javascript'>alert('Empresa Atualizada com sucesso!');window.location.href='/listar';</script>";
            } else {
                echo "Erro ao atualizar cliente na tabela de usuários: " . $conn->error;
            }
        } else {
            echo "Erro ao atualizar cliente: " . $conn->error;
        }
    } else {
        echo "<script language='javascript' type='text/javascript'>alert('Todos os campos devem ser preenchidos');window.location.href='/listar';</script>";
    }
}
$conn->close();
?>

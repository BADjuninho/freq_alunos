<?php
require_once "../php/conexao.php";

$id = $_GET["id"];

$arquivo_query = "SELECT arquivo FROM relatorios WHERE id_relatorio = '$id'";
$arquivo_result = mysqli_query($conn, $arquivo_query);
$row = mysqli_fetch_assoc($arquivo_result);
$caminho_arquivo = $row['arquivo'];

// Verifica se o arquivo existe e o exclui
if (file_exists($caminho_arquivo)) {
    unlink($caminho_arquivo);
}

$delete_query = "DELETE FROM relatorios WHERE id_relatorio = '$id'";

if (mysqli_query($conn, $delete_query)) {
    // Exclui o relatório com sucesso
    echo "<script language='javascript' type='text/javascript'>alert('Relatorio excluído com sucesso!');window.location.href='/listar';</script>";

} else {
    // Erro ao excluir o relatório
    echo "<script language='javascript' type='text/javascript'>alert('Erro ao excluir Relatorio.');window.location.href='/listar';</script>";
}

mysqli_close($conn);
?>

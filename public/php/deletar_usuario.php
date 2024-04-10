<?php
require_once "../php/conexao.php";

$id = $_GET["id"];

    
$delete_query = "DELETE FROM usuarios WHERE id_usuario = '$id'";
    
if (mysqli_query($conn, $delete_query)) {
    echo "<script language='javascript' type='text/javascript'>alert('Usuario excluído com sucesso!');window.location.href='/listar';</script>";
} else {
    echo "<script language='javascript' type='text/javascript'>alert('Erro ao excluir Usuario.');window.location.href='/listar';</script>";
}

mysqli_close($conn);
?>

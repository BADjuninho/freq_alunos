<?php
require_once "../php/conexao.php";

$id = $_GET["id"];

// Consulta para selecionar o id_arquivo da tabela arquivos com base no id_usuario_aluno da tabela alunos
$arquivo_query = "
SELECT arq.id_arquivo
FROM arquivos AS arq
INNER JOIN alunos AS a ON arq.id_aluno_arq = a.id_aluno
WHERE a.id_usuario_aluno = '$id'
";

// Executa a consulta para obter o id_arquivo
$arquivo_result = mysqli_query($conn, $arquivo_query);
$row = mysqli_fetch_assoc($arquivo_result);
$id_arquivo = $row['id_arquivo'];

// Verifica se o arquivo existe e o exclui
if (!empty($id_arquivo)) {
    $delete_arquivo_query = "DELETE FROM arquivos WHERE id_arquivo = '$id_arquivo'";
    if (mysqli_query($conn, $delete_arquivo_query)) {
        // Exclui o arquivo com sucesso
        echo "<script language='javascript' type='text/javascript'>alert('Arquivo excluído com sucesso!');</script>";
    } else {
        // Erro ao excluir o arquivo
        echo "<script language='javascript' type='text/javascript'>alert('Erro ao excluir arquivo.');</script>";
    }
}

// Consulta para obter o CPF do aluno
$cpf_query = "SELECT cpf_aluno FROM alunos WHERE id_usuario_aluno = '$id'";
$cpf_result = mysqli_query($conn, $cpf_query);
$row = mysqli_fetch_assoc($cpf_result);
$cpf_aluno = $row['cpf_aluno'];

// Define o caminho da pasta a ser excluída com base no CPF do aluno
$pasta_aluno = "C:/xampp/htdocs/freq_alunos/alunos/$cpf_aluno";

// Verifica se a pasta existe e a exclui
if (file_exists($pasta_aluno)) {
    if (rmdir($pasta_aluno)) {
        // Pasta excluída com sucesso
        echo "<script language='javascript' type='text/javascript'>alert('Pasta do aluno excluída com sucesso!');</script>";
    } else {
        // Erro ao excluir a pasta
        echo "<script language='javascript' type='text/javascript'>alert('Erro ao excluir a pasta do aluno.');</script>";
    }
}

// Consulta para obter o ID do curso vinculado ao aluno
$id_curso_query = "SELECT id_curso_aluno FROM alunos WHERE id_usuario_aluno = '$id'";
$id_curso_result = mysqli_query($conn, $id_curso_query);
$row = mysqli_fetch_assoc($id_curso_result);
$id_curso = $row['id_curso_aluno'];

// Atualiza o campo num_vagas do curso decrementando uma unidade
$update_curso_query = "UPDATE cursos SET num_vagas = num_vagas - 1 WHERE id_curso = '$id_curso'";
if (mysqli_query($conn, $update_curso_query)) {
    // Atualização bem-sucedida
    echo "<script language='javascript' type='text/javascript'>alert('Vaga do curso atualizada com sucesso!');</script>";
} else {
    // Erro na atualização
    echo "<script language='javascript' type='text/javascript'>alert('Erro ao atualizar a vaga do curso.');</script>";
}

// Consulta para excluir todas as informações relacionadas ao aluno com base no ID do usuário aluno
$delete_query = "
SET FOREIGN_KEY_CHECKS = 0;

DELETE FROM responsaveis WHERE id_responsavel IN (SELECT id_resp_aluno FROM alunos WHERE id_usuario_aluno = '$id');
DELETE FROM usuarios WHERE id_usuario = '$id';
DELETE FROM alunos WHERE id_usuario_aluno = '$id';

SET FOREIGN_KEY_CHECKS = 1;
";

// Executa a consulta SQL
if (mysqli_multi_query($conn, $delete_query)) {
    // Exclui o aluno com sucesso
    echo "<script language='javascript' type='text/javascript'>alert('Aluno e todas as informações relacionadas excluídas com sucesso!');window.location.href='/listar_alunos_gerente';</script>";
} else {
    // Erro ao excluir o aluno
    echo "<script language='javascript' type='text/javascript'>alert('Erro ao excluir aluno e suas informações relacionadas.');window.location.href='/listar_alunos_gerente';</script>";
}

mysqli_close($conn);
?>

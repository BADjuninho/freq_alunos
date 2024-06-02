<?php
require_once "../php/conexao.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $id_curso = $_POST["curso"];
    $cpf = $_POST["cpf"];

    // Verifica a quantidade de vagas disponíveis no curso
    $consulta_curso = "SELECT num_vagas FROM cursos WHERE id_curso = '$id_curso'";
    $resultado_curso = $conn->query($consulta_curso);

    if ($resultado_curso->num_rows > 0) {
        $row = $resultado_curso->fetch_assoc();
        $vagas_disponiveis = $row["num_vagas"];


        if ($vagas_disponiveis > 0) {
            $vagas_disponiveis--;

            $atualizar_vagas = "UPDATE cursos SET num_vagas = '$vagas_disponiveis' WHERE id_curso = '$id_curso'";
            if ($conn->query($atualizar_vagas) === TRUE) {
                
                $atualizar_curso = "UPDATE alunos SET id_curso_aluno = '$id_curso' WHERE cpf_aluno = '$cpf'";
                if ($conn->query($atualizar_curso) === TRUE) {
                    echo "<script language='javascript' type='text/javascript'>alert('Aluno vinculado ao curso com sucesso!');window.location.href='/vinc_aluno';</script>";
                } else {
                    echo "Erro ao vincular aluno ao curso: " . $conn->error;
                }
            } else {
                echo "Erro ao atualizar vagas disponíveis: " . $conn->error;
            }
        } else {
            echo "<script language='javascript' type='text/javascript'>alert('Não há vagas disponíveis para este curso!');window.location.href='/vinc_aluno';</script>";
        }
    } else {
        echo "Curso não encontrado.";
    }
} else {
    echo "<script language='javascript' type='text/javascript'>alert('Erro ao processar o formulário');window.location.href='/vinc_aluno';</script>";
}

$conn->close();
?>

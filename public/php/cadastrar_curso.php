<?php
    require_once "../php/conexao.php";



    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nome = $_POST["nome"];
        $turno = $_POST["turno"];
        $vagas = $_POST["vagas"];

        //verifica se todos os campos estão preenchidos
        if($nome != "" && $turno != "" && $vagas != "") {        
            $sql = "INSERT INTO cursos (nome_curso, turno_curso, num_vagas) VALUES ('$nome', '$turno', '$vagas')";

            if ($conn->query($sql) === TRUE) {
                echo "<script language='javascript' type='text/javascript'>alert('Curso adicionado com sucesso!');window.location.href='/cad_empresa';</script>";
            } else {
                echo "Erro ao cadastrar Empresa. " . $conn->error;
            }
        } else {
            echo "<script language='javascript' type='text/javascript'>alert('Todos os campos devem ser preenchidos!');window.location.href='/cad_empresa';</script>";
        }
    }
    $conn->close();
?>

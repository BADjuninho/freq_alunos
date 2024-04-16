<?php
    require_once "../php/conexao.php";



    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $id = $_POST["id"];
        $tipo = $_POST["tipo"];
        $msg = $_POST["solicitacao"];

        //verifica se todos os campos estão preenchidos
        if($id != "" && $tipo != "" && $msg != "") {        
            $sql = "INSERT INTO solicitacoes (id_usuario_sol, tipo, mensagem, status_sol) VALUES ('$id', '$tipo', '$msg', 'Pendente')";

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

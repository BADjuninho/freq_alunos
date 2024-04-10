<?php
    require_once "../php/conexao.php";



    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $cnpj = $_POST["cnpj"];
        $nome = $_POST["nome"];
        $telefone = $_POST["telefone"];
        $endereco = $_POST["endereco"];

        //verifica se todos os campos estão preenchidos
        if($cnpj != "" && $nome != "" && $telefone != "" && $endereco != "") {        
            $sql = "INSERT INTO empresa (cnpj_empresa, nome_empresa, telefone, endereco) VALUES ('$cnpj', '$nome', '$telefone', '$endereco')";
            
            $upload = "C:/xampp/htdocs/freq_alunos/empresas/" . $cnpj;
            mkdir($upload, 0777);

            if ($conn->query($sql) === TRUE) {
                echo "<script language='javascript' type='text/javascript'>alert('Empresa cadastrada com sucesso!');window.location.href='/cad_empresa';</script>";
            } else {
                echo "Erro ao cadastrar Empresa. " . $conn->error;
            }
        } else {
            echo "<script language='javascript' type='text/javascript'>alert('Todos os campos devem ser preenchidos!');window.location.href='/cad_empresa';</script>";
        }
    }
    $conn->close();
?>

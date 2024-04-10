<?php
require_once "../php/conexao.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];
    $cnpj = $_POST["cnpj"];
    $mes = $_POST["mes"];
    $ano = $_POST["ano"];
    $arquivo_nome = $_FILES["relatorio"]["name"];
    $arquivo_tmp = $_FILES["relatorio"]["tmp_name"];

    // Extrai a extensão do arquivo
    $extensao = pathinfo($arquivo_nome, PATHINFO_EXTENSION);

    // Renomeia o nome do arquivo com o cnpj da empresa e o mês do relatorio
    $novo_nome_arquivo = "$cnpj" . "_" . "$mes" . "_" . "$ano" . ".$extensao";

    $diretorio_upload = "C:/xampp/htdocs/freq_alunos/empresas/$cnpj";

    // Verifica se o diretório existe
    if (!file_exists($diretorio_upload)) {
        mkdir($diretorio_upload, 0777, true);
    }

    // Caminho completo do arquivo
    $caminho_arquivo = "$diretorio_upload/$novo_nome_arquivo";

    // Move o arquivo para o diretório com o novo nome
    if (move_uploaded_file($arquivo_tmp, $caminho_arquivo)) {
        // Insere o caminho do arquivo no banco de dados
        $sql = "INSERT INTO relatorios (id_empresa_rel, mes, ano, arquivo) VALUES ('$id', '$mes', '$ano','$caminho_arquivo')";
        if ($conn->query($sql) === TRUE) {
            echo "<script language='javascript' type='text/javascript'>alert('Relatorio Anexado com sucesso!');window.location.href='/listar';</script>";
        } else {
            echo "Erro ao enviar o arquivo: " . $conn->error;
        }
    } else {
        echo "Erro ao fazer upload do arquivo.";
    }
}

$conn->close();
?>

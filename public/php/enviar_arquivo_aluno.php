<?php
require_once "../php/conexao.php";

// Start the session
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];
    $cpf = $_POST["cpf"];
    $mes = $_POST["mes"];
    $ano = $_POST["ano"];
    $arquivo_nome = $_FILES["arquivo"]["name"];
    $arquivo_tmp = $_FILES["arquivo"]["tmp_name"];

    // Extrai a extensão do arquivo
    $extensao = pathinfo($arquivo_nome, PATHINFO_EXTENSION);

    // Renomeia o nome do arquivo com o cnpj da empresa e o mês do relatorio
    $novo_nome_arquivo = "$cpf" . "_" . "$mes" . "_" . "$ano" . ".$extensao";

    // Check if id_aluno exists in session
    if(isset($_SESSION['id_aluno'])) {
        $id_aluno = $_SESSION['id_aluno'];

        $diretorio_upload = "C:/xampp/htdocs/freq_alunos/alunos/$cpf";

        // Verifica se o diretório existe
        if (!file_exists($diretorio_upload)) {
            mkdir($diretorio_upload, 0777, true);
        }

        // Caminho completo do arquivo
        $caminho_arquivo = "$diretorio_upload/$novo_nome_arquivo";

        // Move o arquivo para o diretório com o novo nome
        if (move_uploaded_file($arquivo_tmp, $caminho_arquivo)) {
            // Insere o caminho do arquivo no banco de dados
            $sql = "INSERT INTO arquivos (id_aluno_arq, mes, ano, arquivo, status_arquivo) VALUES ('$id_aluno', '$mes', '$ano','$caminho_arquivo', 'Pendente')";
            if ($conn->query($sql) === TRUE) {
                echo "<script language='javascript' type='text/javascript'>alert('Relatorio Anexado com sucesso!');window.location.href='/listar_aluno';</script>";
            } else {
                echo "Erro ao enviar o arquivo: " . $conn->error;
            }
        } else {
            echo "Erro ao fazer upload do arquivo.";
        }
    } else {
        echo "<script language='javascript' type='text/javascript'>alert('Erro ao processar o formulário. Por favor, tente novamente.');window.location.href='/listar_aluno';</script>";
    }
}

$conn->close();
?>

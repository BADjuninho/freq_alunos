<?php

class DownloadController {
    private $conn;

    public function __construct() {
        require_once "../php/conexao.php";
        $this->conn = $conn;
    }

    public function downloadArquivo() {
        // Verifica se o parâmetro 'id' foi passado via GET
        if(isset($_GET['id'])) {
            // Obtém o ID do relatório da empresa
            $id = $_GET['id'];

            $sql_query = "SELECT arquivo FROM relatorios WHERE id_relatorio = ?";
            $stmt = $this->conn->prepare($sql_query);
            $stmt->bind_param("i", $id);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $arquivo = $row['arquivo'];

                // Verifica se o arquivo existe
                if (file_exists($arquivo)) {
                    // Configura os headers para forçar o download do arquivo
                    header('Content-Description: File Transfer');
                    header('Content-Type: application/octet-stream');
                    header('Content-Disposition: attachment; filename=' . basename($arquivo));
                    header('Expires: 0');
                    header('Cache-Control: must-revalidate');
                    header('Pragma: public');
                    header('Content-Length: ' . filesize($arquivo));
                    ob_clean();
                    flush();
                    // Faz o download do arquivo
                    readfile($arquivo);
                    exit;
                } else {
                    echo "<script language='javascript' type='text/javascript'>alert('Relatorio não existe!');window.location.href='/listar_aluno';</script>";
                }
            } else {
                echo "<script language='javascript' type='text/javascript'>alert('ID de relatorio invalido!');window.location.href='/listar_aluno';</script>";
            }
        } else {
            echo "ID de relatório não fornecido.";
        }
    }

    public function fecharConexao() {
        $this->conn->close();
    }
}

// Uso do controlador para baixar o arquivo
$downloadController = new DownloadController();
$downloadController->downloadArquivo();
$downloadController->fecharConexao();

?>

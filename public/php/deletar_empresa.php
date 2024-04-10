<?php
require_once "../php/conexao.php";

$id = $_GET["id"];

//seleciona os usuarios associados á empresa
$select_query = "SELECT id_usuario FROM usuarios WHERE id_empresa_user = '$id'";
$result = mysqli_query($conn, $select_query);

if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
        $id_usuario = $row['id_usuario'];
        
        //muda o campo id_empresa_user para NULL na tabela de usuários
        $update_query = "UPDATE usuarios SET id_empresa_user = NULL WHERE id_usuario = '$id_usuario'";
        
        if (!mysqli_query($conn, $update_query)) {
            echo "<script language='javascript' type='text/javascript'>alert('Erro ao atualizar tabela de usuários.');window.location.href='/listar';</script>";
            exit;
        }
    }

    $sql_query2 = "SELECT cnpj_empresa, nome_empresa FROM empresa WHERE id_empresa = " . $id;
    $result2 = $conn->query($sql_query2);

    if ($result2 = $conn->query($sql_query2)) {
        while ($row = $result2->fetch_assoc()) {
            $cnpj = $row['cnpj_empresa'];
        }
    }

    //deleta a pasta dos relatorios da empresa
    $pasta = "C:/xampp/htdocs/freq_alunos/empresas/$cnpj";

    
    if (is_dir($pasta)) {
        $arquivos = glob($pasta . "*");

        foreach($arquivos as $arquivo) {
            if (is_dir($arquivo)) {
                rmdir($arquivo);
            } else {
                unlink($arquivo);
            }
        }

        $delete_query = "DELETE FROM empresa WHERE id_empresa = '$id'";

        if (mysqli_query($conn, $delete_query)) {
            echo "<script language='javascript' type='text/javascript'>alert('Empresa excluída com sucesso!');window.location.href='/listar';</script>";
        } else {
            echo "<script language='javascript' type='text/javascript'>alert('Erro ao excluir empresa.');window.location.href='/listar';</script>";
        }
        } else {
            echo "<script language='javascript' type='text/javascript'>alert('Erro ao excluir pasta da empresa.');window.location.href='/listar';</script>";
        }
} else {
    echo "<script language='javascript' type='text/javascript'>alert('Erro ao recuperar usuários associados à empresa.');window.location.href='/listar';</script>";
}

mysqli_close($conn);
?>

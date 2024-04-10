<?php 
require_once "../php/conexao.php";

if ($_SERVER["REQUEST_METHOD"] == "GET") {

    $id = $_GET["id"];
    $login = $_GET["login"];
    $senha = $_GET["senha"];
    $nome = $_GET["nome"];
    $cpf = $_GET["cpf"];
    $data_nascimento = $_GET["data_nascimento"];
    $cargo = $_GET["cargo"];

    $data_nascimento_obj = DateTimeImmutable::createFromFormat('Y-m-d', $data_nascimento);
    $data_nascimento_formatada = $data_nascimento_obj->format('Y/m/d');

    if($login != "" && $senha != "" && $nome != "" && $cpf != "" && $cargo != ""){
        $sql_empresa = "UPDATE usuarios SET login = '$login', senha = '$senha', nome_usuario = '$nome', cargo = '$cargo', cpf_usuario = '$cpf', dt_nasc_usuario = '$data_nascimento_formatada' WHERE id_usuario = '$id'";

        //atualiza o campo id_empresa_user na tabela usuarios para NULL
        $sql_usuarios = "UPDATE usuarios SET id_empresa_user = NULL WHERE id_usuario = '$id'";

        if ($conn->query($sql_empresa) === TRUE) {
            // Executa a query para atualizar o campo id_empresa_user na tabela usuarios
            if ($conn->query($sql_usuarios) === TRUE) {
                echo "<script language='javascript' type='text/javascript'>alert('Usuario Atualizado com sucesso!');window.location.href='/listar_usuario';</script>";
            } else {
                echo "Erro ao atualizar cliente na tabela de usuários: " . $conn->error;
            }
        } else {
            echo "Erro ao atualizar cliente: " . $conn->error;
        }
    } else {
        echo "<script language='javascript' type='text/javascript'>alert('Todos os campos devem ser preenchidos');window.location.href='listar_usuario';</script>";
    }
}
$conn->close();
?>

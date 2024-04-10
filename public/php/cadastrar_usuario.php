<?php
require_once "../php/conexao.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $login = $_POST["login"];
    $senha = $_POST["senha"];
    $nome = $_POST["nome"];
    $cpf = $_POST["cpf"];
    $data_nascimento = $_POST["data_nascimento"];
    $cargo = $_POST["cargo"];

    // Verifica se todos os campos estão preenchidos
    if ($login != "" && $senha != "" && $nome != "" && $cpf != "" && $data_nascimento != "" && $cargo != "") {
        // Inicializa o ID da empresa como nulo
        $id_empresa = null;

        // Verifica se o CNPJ foi fornecido
        if (isset($_POST["cnpj"]) && $_POST["cnpj"] != "") {
            $cnpj = $_POST["cnpj"];
            // Consulta SQL para verificar se o CNPJ já está cadastrado
            $consulta_cnpj = "SELECT id_empresa FROM empresa WHERE cnpj_empresa = '$cnpj'";
            $resultado_cnpj = $conn->query($consulta_cnpj);

            if ($resultado_cnpj->num_rows > 0) {
                // CNPJ já está cadastrado, exibir mensagem de erro
                echo "<script language='javascript' type='text/javascript'>alert('CNPJ já cadastrado!');window.location.href='/cad_user';</script>";
                exit(); // Saímos do script
            }
        }

        // Formata a data de nascimento
        $data_nascimento_obj = DateTimeImmutable::createFromFormat('Y-m-d', $data_nascimento);
        $data_nascimento_formatada = $data_nascimento_obj->format('Y/m/d');

        // Verifica se o CNPJ está vazio
        if (empty($cnpj)) {
            // SQL para inserir novo usuário sem empresa
            $sql = "INSERT INTO usuarios (login, senha, nome_usuario, cpf_usuario, dt_nasc_usuario, cargo) VALUES ('$login', '$senha', '$nome', '$cpf', '$data_nascimento_formatada', '$cargo')";
        } else {
            // SQL para inserir novo usuário com empresa
            $sql = "INSERT INTO usuarios (id_empresa_user, login, senha, nome_usuario, cpf_usuario, dt_nasc_usuario, cargo) VALUES ('$id_empresa', '$login', '$senha', '$nome', '$cpf', '$data_nascimento_formatada', '$cargo')";
        }

        // Executa a consulta SQL
        if ($conn->query($sql) === TRUE) {
            echo "<script language='javascript' type='text/javascript'>alert('Cliente cadastrado com sucesso!');window.location.href='/cad_user';</script>";
        } else {
            echo "Erro ao cadastrar cliente: " . $conn->error;
        }
    } else {
        echo "<script language='javascript' type='text/javascript'>alert('Todos os campos devem ser preenchidos!');window.location.href='/cad_user';</script>";
    }
}
$conn->close();
?>

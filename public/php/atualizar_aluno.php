<?php 
require_once "../php/conexao.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];
    $login = $_POST["login"];
    $senha = $_POST["senha"];
    $nome = $_POST["nome"];
    $cpf = $_POST["cpf"];
    $email = $_POST["email"];
    $endereco = $_POST["endereco"];
    $data_nascimento = $_POST["data_nascimento"];
    $perfil = $_POST["perfil"];

    $data_nascimento_obj = new DateTimeImmutable($data_nascimento);
    $data_nascimento_obj1 = DateTimeImmutable::createFromFormat('Y-m-d', $data_nascimento);
    $data_nascimento_formatada = $data_nascimento_obj1->format('Y/m/d');
    $data_atual = new DateTimeImmutable();
    $idade = $data_atual->diff($data_nascimento_obj)->y;

    if($login != "" && $senha != "" && $nome != "" && $cpf != "" && $perfil != "" && $email != "" && $endereco != ""){
        $sql_usuarios = "UPDATE usuarios SET login = '$login', senha = '$senha', nome_usuario = '$nome', cargo = '$perfil', cpf_usuario = '$cpf', dt_nasc_usuario = '$data_nascimento_formatada' WHERE id_usuario = '$id'";

        $sql_alunos = "UPDATE alunos SET email_aluno = '$email', endereco = '$endereco', perfil = '$perfil', data_nascimento = '$data_nascimento_formatada' WHERE id_usuario_aluno  = '$id'";

        $sql_responsaveis = "UPDATE responsaveis SET dt_nasc_responsavel = '$data_nascimento_formatada' WHERE id_aluno_responsavel = '$id'";


        if ($conn->query($sql_alunos) === TRUE) {
            if ($conn->query($sql_usuarios) === TRUE) {
                if ($idade < 18) {
                    // Atualiza o campo endereco_responsavel na tabela responsaveis
                    $sql_responsaveis = "UPDATE responsaveis SET endereco_responsavel = '$endereco' WHERE id_aluno_responsavel = '$id'";
                    if ($conn->query($sql_responsaveis) === FALSE) {
                        echo "Erro ao atualizar o endereço do responsável: " . $conn->error;
                    }
                }
                echo "<script language='javascript' type='text/javascript'>alert('Usuário atualizado com sucesso!');window.location.href='/listar_alunos_gerente';</script>";
            } else {
                echo "Erro ao atualizar cliente na tabela de usuários: " . $conn->error;
            }
        } else {
            echo "Erro ao atualizar cliente: " . $conn->error;
        }
    } else {
        echo "<script language='javascript' type='text/javascript'>alert('Todos os campos devem ser preenchidos');window.location.href='listar_alunos_gerente';</script>";
    }
}
$conn->close();
?>

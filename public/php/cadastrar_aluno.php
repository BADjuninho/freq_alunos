<?php
require_once "../php/conexao.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST["nome"];
    $cpf = $_POST["cpf"];
    $email = $_POST["email"];
    $usuario = $_POST["usuario"];
    $senha = $_POST["senha"];
    $perfil = $_POST["status"];
    $matricula = $_POST["matricula"];
    $dt_nascimento = $_POST["dt_nascimento"];
    $endereco = $_POST["endereco"];

    // Verifica se todos os campos estão preenchidos
    if ($nome != "" && $cpf != "" && $usuario != "" && $senha != "" && $perfil != "") {

        $consulta_cpf = "SELECT id_usuario FROM usuarios WHERE cpf_usuario = '$cpf'";
        $resultado_cpf = $conn->query($consulta_cpf);

        if ($resultado_cpf->num_rows > 0) {
            echo "<script language='javascript' type='text/javascript'>alert('CPF já cadastrado!');window.location.href='/';</script>";
            exit();
        }

        $consulta_cpf_aluno = "SELECT id_aluno FROM alunos WHERE cpf_aluno = '$cpf'";
        $resultado_cpf_aluno = $conn->query($consulta_cpf_aluno);

        if ($resultado_cpf_aluno->num_rows > 0) {
            echo "<script language='javascript' type='text/javascript'>alert('CPF já cadastrado!');window.location.href='/';</script>";
            exit();
        }

        // Calcula a idade com base na data de nascimento fornecida
        $data_nascimento_obj = DateTimeImmutable::createFromFormat('Y-m-d', $dt_nascimento);
        $data_atual = new DateTimeImmutable();
        $idade = $data_nascimento_obj->diff($data_atual)->y;

        $consulta_cpf = "SELECT id_aluno FROM alunos WHERE cpf_aluno = '$cpf'";
        $consulta_cpf2 = "SELECT id_usuario FROM usuarios WHERE cpf_usuario = '$cpf'";
        $resultado_cpf = $conn->query($consulta_cpf);
        $resultado_cpf2 = $conn->query($consulta_cpf2);

        if ($resultado_cpf->num_rows > 0 && $resultado_cpf2->num_rows > 0) {
            echo "<script language='javascript' type='text/javascript'>alert('CPF já cadastrado!');window.location.href='/#';</script>";
            exit();
        } else {
            // Insere o usuário na tabela de usuários
            $data_nascimento_formatada = $data_nascimento_obj->format('Y-m-d');
            $sql2 = "INSERT INTO usuarios (login, senha, nome_usuario, cpf_usuario, dt_nasc_usuario, cargo) VALUES ('$usuario', '$senha', '$nome', '$cpf', '$data_nascimento_formatada', '$perfil')";

            

            if ($conn->query($sql2) === TRUE) {
                // Obtém o ID do usuário inserido
                $id_usuario_aluno = $conn->insert_id;

                // Verifica a idade para determinar se é necessário inserir um responsável
                if ($idade >= 18) {
                    $sql_responsavel = "INSERT INTO responsaveis(nome_responsavel,cpf_responsavel, dt_nasc_responsavel, endereco_responsavel) VALUES ('$nome', '$cpf', '$data_nascimento_formatada', '$endereco')";
                    if ($conn->query($sql_responsavel) === TRUE) {
                        // Sucesso ao cadastrar aluno
                        $id_responsavel = $conn->insert_id;

                        $sql = "INSERT INTO alunos (id_resp_aluno , id_curso_aluno,id_usuario_aluno, nome_aluno, email_aluno, cpf_aluno, matricula, perfil, endereco) VALUES ('$id_responsavel',null ,'$id_usuario_aluno', '$nome', '$email', '$cpf', '$matricula', '$perfil', '$endereco')";

                        if ($conn->query($sql) === TRUE) {
                            echo "<script language='javascript' type='text/javascript'>alert('Aluno cadastrado com sucesso!');window.location.href='/#';</script>";
                        } else {
                            echo "Erro ao cadastrar aluno: " . $conn->error;
                        }
                    }
                } else {

                    $consulta_cpf_responsavel = "SELECT id_responsavel FROM responsaveis WHERE cpf_responsavel = '$cpf'";
                    $consulta_cpf_responsavel = $conn->query($consulta_cpf_responsavel);
            
                    if ($consulta_cpf_responsavel->num_rows > 0) {
                        echo "<script language='javascript' type='text/javascript'>alert('CPF já cadastrado!');window.location.href='/  ';</script>";
                        exit();
                    }
                
                    $nome_responsavel = $_POST["nome_responsavel"];
                    $cpf_responsavel = $_POST["cpf_responsavel"];
                    $data_nascimento_responsavel = $_POST["dt_nascimento_responsavel"];
                    $data_nascimento_responsavel_obj = DateTimeImmutable::createFromFormat('Y-m-d', $data_nascimento_responsavel);
                    $data_nascimento_responsavel_formatada = $data_nascimento_responsavel_obj->format('Y-m-d');
                    $endereco_responsavel = $_POST["endereco_responsavel"];
                    $sql_responsavel = "INSERT INTO responsaveis(nome_responsavel, cpf_responsavel, dt_nasc_responsavel, endereco_responsavel) VALUES ('$nome_responsavel', '$cpf_responsavel', '$data_nascimento_responsavel_formatada', '$endereco_responsavel')";

                    if ($conn->query($sql_responsavel) === TRUE) {
                        $id_responsavel = $conn->insert_id;
                        $sql = "INSERT INTO alunos (id_resp_aluno ,id_curso_aluno ,id_usuario_aluno, nome_aluno, email_aluno, cpf_aluno, matricula, perfil, endereco) VALUES ('$id_responsavel', null ,'$id_usuario_aluno',  '$nome', '$email', '$cpf', '$matricula', '$perfil', null)";

                        if($conn->query($sql)) {
                            echo "<script language='javascript' type='text/javascript'>alert('Aluno cadastrado com sucesso!');window.location.href='/#';</script>";
                        }

                    } else {
                        echo "Erro ao cadastrar aluno: " . $conn->error;
                    }
                }
            } else {
                echo "Erro ao cadastrar usuário: " . $conn->error;
            }
        }
    } else {
        echo "<script language='javascript' type='text/javascript'>alert('Todos os campos devem ser preenchidos!');window.location.href='/#';</script>";
    }
} else {
    echo "Preencha todos os campos!";
}

$conn->close();
?>

<?php
    require_once "../php/conexao.php";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nome = $_POST["nome"];
        $cpf = $_POST["cpf"];
        $usuario = $_POST["usuario"];
        $senha = $_POST["senha"];
        $perfil = $_POST["status"];
        $matricula = $_POST["matricula"];
        $dt_nascimento = $_POST["dt_nascimento"];
        $endereco = $_POST["endereco"];

        // Verifica se todos os campos estão preenchidos
        if($nome != "" && $cpf != "" && $usuario != "" && $senha != "" && $perfil != "") {

            $consulta_cpf = "SELECT id_aluno FROM alunos WHERE cpf_aluno = '$cpf'";
            $resultado_cpf = $conn->query($consulta_cpf);

            if ($resultado_cpf->num_rows > 0) {
                echo "<script language='javascript' type='text/javascript'>alert('CPF já cadastrado!');window.location.href='/';</script>";
                exit();
            }

            $data_nascimento_obj = DateTimeImmutable::createFromFormat('Y-m-d', $dt_nascimento);
            $data_nascimento_formatada = $data_nascimento_obj->format('Y/m/d');
            $idade = $data_nascimento_obj->diff(new DateTime('now'))->y;

                if ($idade > 18) {
                $sql_responsavel = "INSERT INTO responsaveis(nome_responsavel,cpf_responsavel, dt_nasc_responsavel, endereco_responsavel) VALUES ('$nome', '$cpf', '$data_nascimento_formatada', '$endereco')";
                $sql = "INSERT INTO alunos (id_usuario_aluno, nome_aluno, cpf_aluno, matricula, perfil, endereco) VALUES ('$id_usuario_aluno', '$nome', '$cpf', '$matricula', '$perfil', '$endereco')";
                } else {
                    $nome_responsavel = $_POST["nome_responsavel"];
                    $cpf_responsavel = $_POST["cpf_responsavel"];
                    $data_nascimento_responsavel = $_POST["dt_nascimento_responsavel"];
                    $data_nascimento_responsavel_obj = DateTimeImmutable::createFromFormat('Y-m-d', $data_nascimento_responsavel);
                    $data_nascimento_responsavel_formatada = $data_nascimento_responsavel_obj->format('Y/m/d');
                    $endereco_responsavel = $_POST["endereco_responsavel"];

                    $sql_responsavel = "INSERT INTO responsaveis(nome_responsavel,cpf_responsavel, dt_nasc_responsavel, endereco_responsavel) VALUES ('$nome_responsavel', '$cpf_responsavel', '$data_nascimento_responsavel_formatada', '$endereco_responsavel')";
                    $sql = "INSERT INTO alunos (id_usuario_aluno, nome_aluno, cpf_aluno, matricula, perfil, endereco) VALUES ('$id_usuario_aluno', '$nome', '$cpf', '$matricula', '$perfil', null)";
                }

                
                $sql2 = "INSERT INTO usuarios (login, senha, nome_usuario, cpf_usuario, dt_nasc_usuario, cargo) VALUES ('$usuario', '$senha', '$nome', '$cpf', '$data_nascimento_formatada', '$perfil')";

                if ($conn->query($sql2) === TRUE) {
                    $id_usuario_aluno = $conn->insert_id;


                    $upload = "C:/xampp/htdocs/freq_alunos/alunos/" . $cpf;
                    mkdir($upload, 0777);

                    if ($conn->query($sql) === TRUE) {
                        echo "<script language='javascript' type='text/javascript'>alert('Aluno cadastrado com sucesso!');window.location.href='/';</script>";
                    } else {
                        echo "Erro ao cadastrar aluno: " . $conn->error;
                    }
                } else {
                    echo "Erro ao cadastrar usuário: " . $conn->error;
                }
            } else {
                echo "<script language='javascript' type='text/javascript'>alert('Todos os campos devem ser preenchidos!');window.location.href='/';</script>";
        }
    }
    $conn->close();
?>

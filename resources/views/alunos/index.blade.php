<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Alunos</title>
    <link rel="stylesheet" href="css/style_listar.css">
    <link rel="shortcut icon" href="img/favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">
    <style>
        td {
            height: 25px;
        }

        h1 {
            text-align: center;
            margin: 50px 0;
        }
    </style>
</head>

<body>
    <?php 
    require_once "php/conexao.php"; 

    // Inicializa a variável de consulta SQL para buscar todos os alunos
    $sql_query = "
    SELECT 
        alunos.id_aluno,
        alunos.nome_aluno, 
        alunos.cpf_aluno, 
        alunos.matricula, 
        alunos.status_aluno, 
        usuarios.nome_usuario AS nome_usuario
    FROM 
        alunos 
    LEFT JOIN 
        usuarios ON alunos.id_usuario_aluno = usuarios.id_usuario";

    // Executa a consulta SQL
    if ($result = $conn->query($sql_query)) {
    ?>
    <center>
        <h1 style="display: flex; justify-content: center; margin-top: 10px; margin-bottom: 10px;">Listar Alunos</h1>
    </center>
    <section>
        <div class="table-wrapper">
            <table class="fl-table table-clear table-striped-columns">
                <thead class="table-dark">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">NOME</th>
                        <th scope="col">CPF</th>
                        <th scope="col">MATRÍCULA</th>
                        <th scope="col">STATUS</th>
                        <th scope="col">USUÁRIO RESPONSÁVEL</th>
                        <th scope="col">AÇÕES</th>
                    </tr>
                </thead>
                <tbody id="tabelaAlunos">
                    <?php while ($row = $result->fetch_assoc()) { ?>
                    <tr>
                        <td><?php echo $row['id_aluno']; ?></td>
                        <td><?php echo $row['nome_aluno']; ?></td>
                        <td><?php echo $row['cpf_aluno']; ?></td>
                        <td><?php echo $row['matricula']; ?></td>
                        <td><?php echo $row['status_aluno']; ?></td>
                        <td><?php echo $row['nome_usuario']; ?></td>
                        <td>
                            <a style="background-color: #1B62B7; border: 1px solid #1B62B7; margin-left: 35px;" href="php/editar_aluno.php?id=<?php echo $row['id_aluno']; ?>"
                                class="btn btn-primary btn-secondary">Editar</a>
                            <a style="background-color: #1B62B7; border: 1px solid #1B62B7;" href="php/deletar_aluno.php?id=<?php echo $row['id_aluno']; ?>"
                                onclick="return confirm('Tem certeza que deseja deletar este registro?')"
                                class="btn btn-secondary">Deletar</a>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </section>
    <?php
    } else {
        echo "Erro ao executar a consulta: " . $conn->error;
    }

    // Fecha a conexão
    $conn->close();
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2"
        crossorigin="anonymous"></script>
</body>

</html>

<?php

if (!isset($_SESSION['id_aluno'])) {
    require "php/verificar_cargo.php";
}

require_once "php/conexao.php"; 
$sql_query = "
SELECT
    alunos.id_usuario_aluno,
    alunos.email_aluno,
    alunos.id_aluno,
    IFNULL(cursos.nome_curso, 'Não possui curso') AS nome_curso,
    alunos.nome_aluno, 
    alunos.cpf_aluno, 
    alunos.matricula, 
    alunos.perfil,
    IF(alunos.endereco IS NULL, responsaveis.endereco_responsavel, alunos.endereco) AS endereco, 
    usuarios.nome_usuario AS nome_usuario
FROM 
    alunos
LEFT JOIN cursos ON alunos.id_curso_aluno = cursos.id_curso
INNER JOIN usuarios ON alunos.id_usuario_aluno = usuarios.id_usuario
LEFT JOIN responsaveis ON alunos.id_resp_aluno = responsaveis.id_responsavel";

if ($result = $conn->query($sql_query)) {?>
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
                height: 50px;
            }

            h1 {
                text-align: center;
                margin: 50px 0;
            }
        </style>
    </head>

    <body>
        <center>
            <h1 style="display: flex; justify-content: center; margin-top: 10px; margin-bottom: 10px;">Alunos</h1>
        </center>
        <section>
            <div class="table-wrapper" style="margin-left: 40px;">
                <table class="fl-table table-clear table-striped-columns">
                    <thead class="table-dark">
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">CURSO</th>
                            <th scope="col">NOME</th>
                            <th scope="col">CPF</th>
                            <th scope="col">EMAIL</th>
                            <th scope="col">MATRÍCULA</th>
                            <th scope="col">PERFIL</th>
                            <th scope="col">ENDEREÇO</th>
                            <th scope="col">AÇÕES</th>
                        </tr>
                    </thead>
                    <tbody id="tabelaAlunos">
                        <?php while ($row = $result->fetch_assoc()) { ?>
                            <tr>
                                <td><?php echo $row['id_aluno']; ?></td>
                                <td><?php echo $row['nome_curso']; ?></td>
                                <td><?php echo $row['nome_aluno']; ?></td>
                                <td><?php echo $row['cpf_aluno']; ?></td>
                                <td><?php echo $row['email_aluno']; ?></td>
                                <td><?php echo $row['matricula']; ?></td>
                                <td><?php echo $row['perfil']; ?></td>
                                <td><?php echo $row['endereco']; ?></td>
                                <td>
                                    <a style="background-color: #1B62B7; border: 1px solid #1B62B7; width: 70px;" href="/update_aluno?id=<?php echo $row['id_usuario_aluno']; ?>"
                                    class="btn btn-primary btn-secondary"><img src="img/edit.png" alt=""
                                        style="width: 25px; height: 20px;"></a> 
                                    <a  style="background-color: #1B62B7; border: 1px solid #1B62B7; width: 70px;" href="php/deletar_aluno.php?id=<?php echo $row['id_usuario_aluno']; ?>"
                                        onclick="return confirm('Tem certeza que deseja deletar este registro?')"
                                        class="btn btn-secondary"><img src="img/remove.png" alt=""
                                            style="width: 20px; height: 20px;"></a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </section>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2"
            crossorigin="anonymous"></script>
            <script src="js/listar_alunos.js"></script>
    </body>
    </html>
<?php
} else {
    echo "Erro ao executar a consulta: " . $conn->error;
}
$conn->close();
?>

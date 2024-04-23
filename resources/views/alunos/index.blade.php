<?php


if (!isset($_SESSION['id_aluno'])) {
    require "php/verificar_cargo.php";
}

require_once "php/conexao.php"; 
$sql_query = "
SELECT 
    cursos.nome_curso AS nome_curso,
    alunos.nome_aluno, 
    alunos.cpf_aluno, 
    alunos.matricula, 
    alunos.perfil,
    IF(alunos.endereco IS NULL, responsaveis.endereco_responsavel, alunos.endereco) AS endereco, 
    usuarios.nome_usuario AS nome_usuario
FROM 
    alunos
INNER JOIN cursos ON alunos.id_curso_aluno = cursos.id_curso
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
            <h1 style="display: flex; justify-content: center; margin-top: 10px; margin-bottom: 10px;">Perfil</h1>
        </center>
        <section>
            <div class="table-wrapper">
                <table class="fl-table table-clear table-striped-columns">
                    <thead class="table-dark">
                        <tr>
                            <th scope="col">CURSO</th>
                            <th scope="col">NOME</th>
                            <th scope="col">CPF</th>
                            <th scope="col">MATRÍCULA</th>
                            <th scope="col">PERFIL</th>
                            <th scope="col">ENDEREÇO</th>
                        </tr>
                    </thead>
                    <tbody id="tabelaAlunos">
                        <?php while ($row = $result->fetch_assoc()) { ?>
                            <tr>
                                <td><?php echo $row['nome_curso']; ?></td>
                                <td><?php echo $row['nome_aluno']; ?></td>
                                <td><?php echo $row['cpf_aluno']; ?></td>
                                <td><?php echo $row['matricula']; ?></td>
                                <td><?php echo $row['perfil']; ?></td>
                                <td><?php echo $row['endereco']; ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </section>
        <div>
            <div class="cards-container">
                <div class="card" style="background-color: #1b62b7; color:white;">
                    <h2 style="margin-bottom: 50px;"><img src="img/attach.svg" alt="" style="height: 60px; width: 60px; color: white;"></h2>
                    <h3 style="margin-bottom: 60px; font-size: 24px;">Enviar Declaração/Atestado</h3>
                    <p style="margin-bottom: 30px;">Envie declarações e atestados, Clique abaixo para anexar.</p>
                    <a class="btn" style="color: white; margin-top: -5px; background-color: #2b89fc;" href="/enviar_arquivo?id=<?php echo $_SESSION['id_aluno']?>">Enviar</a>
                </div>
                <div class="card" style="background-color: #1b62b7; color:white;">
                    <h2 style="margin-bottom: 50px;"><img src="img/request.svg" style="height: 60px; width: 60px;" alt=""></h2>
                    <h3 style="margin-bottom: 60px; font-size: 24px;">Solicitar declaração</h3>
                    <p style="margin-bottom: 30px;">Solicite declarações ou segundas<br>vias de certificados clicando abaixo</p>
                    <a class="btn" style="color: white; margin-top: -5px; background-color: #2b89fc;" href="/formulario_solicitacao?id=<?php echo $_SESSION['id_aluno']?>">Solicitar</a>
                </div>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2"
            crossorigin="anonymous"></script>
    </body>
    </html>
<?php
} else {
    echo "Erro ao executar a consulta: " . $conn->error;
}
$conn->close();
?>

<?php


if (!isset($_SESSION['id_aluno'])) {
    require "php/verificar_cargo.php";
}

require_once "php/conexao.php"; 
$sql_query = "
SELECT 
    solicitacoes.*, 
    alunos.nome_aluno as nome_aluno
FROM 
    solicitacoes
JOIN
    alunos ON solicitacoes.id_aluno_sol = alunos.id_aluno
";


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
            <h1 style="display: flex; justify-content: center; margin-top: 10px; margin-bottom: 10px;">Arquivos</h1>
        </center>
        <section>
            <div class="table-wrapper">
                <table class="fl-table table-clear table-striped-columns">
                    <thead class="table-dark">
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col" style="max-width: 350px; width: 350px;">NOME</th>
                            <th scope="col" style="width: 250px;">TIPO</th>
                            <th scope="col">MENSAGEM</th>
                            <th scope="col" style="width: 200px;">STATUS</th>
                            <th scope="col" colspan="2">AÇÕES</th>
                        </tr>
                    </thead>
                    <tbody id="tabelaAlunos">
                        <?php while ($row = $result->fetch_assoc()) { ?>
                            <tr>
                                <td><?php echo $row['id_aluno_sol']; ?></td>
                                <td><?php echo $row['nome_aluno']; ?></td>
                                <td><?php echo $row['tipo'];?></td>
                                <td><?php echo $row['mensagem']; ?></td>
                                <td><?php echo $row['status_sol']; ?></td>
                                <td><a href="atualizar_solicitacao?id=<?php echo $row['id_aluno_sol']; ?>" class="btn btn-primary" style="background-color: #1B62B7; border: none; width: 150px;">Atualizar Status</a>
                                <a style="background-color: #1B62B7; border: 1px solid #1B62B7; width: 70px;" href="anexar_arquivo_gerente?id=<?php echo $row['id_aluno_sol']; ?>" class="btn btn-primary"><img src="img/clip.png" alt="" style="width: 25px; height: 20px;"></a></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </section>
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

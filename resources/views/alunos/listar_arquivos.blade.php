<?php


if (!isset($_SESSION['id_aluno'])) {
    require "php/verificar_cargo.php";
}

require_once "php/conexao.php"; 
$sql_query = "
SELECT 
    *
FROM 
    arquivos
WHERE
    id_aluno_arq = " . $_SESSION['id_aluno'];

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
                            <th scope="col">TIPO</th>
                            <th scope="col">MÊS</th>
                            <th scope="col">ANO</th>
                            <th scope="col">ARQUIVO</th>
                            <th scope="col">STATUS</th>
                            <th scope="col">AÇÕES</th>
                        </tr>
                    </thead>
                    <tbody id="tabelaAlunos">
                        <?php while ($row = $result->fetch_assoc()) { ?>
                            <tr>
                                <td><?php echo $row['tipo_arquivo'];?></td>
                                <td><?php echo $row['mes']; ?></td>
                                <td><?php echo $row['ano']; ?></td>
                                <td><?php echo basename($row['arquivo']); ?></td>
                                <td><?php echo $row['status_arquivo']; ?></td>
                                <td><a style="background-color: #1B62B7; border: 1px solid #1B62B7 width: 70px;;" href="php/baixar_arquivo_aluno.php?id=<?php echo $row['id_aluno_arq']; ?>"
                                class="btn btn-primary btn-secondary"><img src="img/dw-icon.png" alt=""
                                    style="width: 25px; height: 25px;"></a>
                                <a style="background-color: #1B62B7; border: 1px solid #1B62B7 width: 70px;" href="php/deletar_arquivo_aluno.php?id=<?php echo $row['id_aluno_arq']; ?>"
                                onclick="return confirm('Tem certeza que deseja deletar este registro?')"
                                class="btn btn-secondary"><img src="img/remove.png" alt=""
                                    style="width: 20px; height: 20px;"></a></td>
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

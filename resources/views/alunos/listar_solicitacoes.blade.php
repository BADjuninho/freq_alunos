<?php


if (!isset($_SESSION['id_aluno'])) {
    require "php/verificar_cargo.php";
}

require_once "php/conexao.php"; 
$sql_query = "
SELECT 
    *
FROM 
    solicitacoes
WHERE
    id_aluno_sol = " . $_SESSION['id_aluno'];

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
            <h1 style="display: flex; justify-content: center; margin-top: 10px; margin-bottom: 10px;">Solitações</h1>
        </center>
        <section>
            <div class="table-wrapper">
                <table class="fl-table table-clear table-striped-columns">
                    <thead class="table-dark">
                        <tr>
                            <th scope="col" style="width: 250px;">TIPO</th>
                            <th scope="col">MENSAGEM</th>
                            <th scope="col" style="width: 200px;">STATUS</th>
                        </tr>
                    </thead>
                    <tbody id="tabelaAlunos">
                        <?php while ($row = $result->fetch_assoc()) { ?>
                            <tr>
                                <td><?php echo $row['tipo'];?></td>
                                <td><?php echo $row['mensagem']; ?></td>
                                <td><?php echo $row['status_sol']; ?></td>
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

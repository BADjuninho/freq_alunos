<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listagem de relatorios</title>
    <link rel="shortcut icon" href="img/favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="css/style_listar_empresa.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">
    <style>

        h1 {
            text-align: center;
            margin: 50px 0;
        }

    </style>
</head>

<body>
    <?php require_once "php/conexao.php";
    require "php/verificar_cargo.php";

    $sql_query = "SELECT * FROM relatorios WHERE id_empresa_rel = " . $_SESSION['id_empresa_user'];
    $sql_query2 = "SELECT nome_empresa FROM empresa WHERE id_empresa = " . $_SESSION['id_empresa_user'];

    if ($result = $conn->query($sql_query)) {
        if ($result2 = $conn->query($sql_query2)) {
            while ($row = $result2->fetch_assoc()) {
                $nome_empresa = $row['nome_empresa'];
            }
        }
    ?>
    <h1>Lista de Relatorios da empresa <?php echo"$nome_empresa"?></h1>
    <section>
        <div class="table-wrapper">
            <table class="fl-table table-clear table-striped-columns">
                <thead class="table-dark">
                    <tr>
                        <th scope="col" style="width: 15%;">ID DO RELATORIO</th>
                        <th scope="col" style="width: 15%;">ID DA EMPRESA</th>
                        <th scope="col">MES</th>
                        <th scope="col">ANO</th>
                        <th scope="col">NOME DO ARQUIVO</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = $result->fetch_assoc()) { ?>
                    <tr>
                        <td><?php echo $row['id_relatorio']; ?></td>
                        <td><?php echo $row['id_empresa_rel']; ?></td>
                        <td><?php echo $row['mes']; ?></td>
                        <td><?php echo $row['ano']; ?></td>
                        <td><?php echo basename($row['arquivo']); ?></td>
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

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listagem de relatorios</title>
    <link rel="shortcut icon" href="img/favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="css/style_listar.css">
    <link rel="stylesheet" href="css/menu.css">
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

    $sql_query = "SELECT * FROM relatorios WHERE id_empresa_rel = " . $_GET['id'];
    $sql_query2 = "SELECT nome_empresa FROM empresa WHERE id_empresa = " . $_GET['id'];
    $result2 = $conn->query($sql_query2);

    if ($result = $conn->query($sql_query)) {
        if ($result2 = $conn->query($sql_query2)) {
            while ($row = $result2->fetch_assoc()) {
                $nome_empresa = $row['nome_empresa'];
            }
        }
    ?>
    <center>
    <h1>Lista de Relatorios da empresa <?php echo"$nome_empresa"?></h1>
    <form method="GET" action="" style="margin-top: -22px; justify-content: center;">
        <label for="mes" style="margin-left: 30px; margin-top: 9px; font-size: 22px;">Selecione o Mês:</label>
        <div class="select-dropdown" style="width: 500px; margin-top: 45px;">
            <select name="mes" id="mes" onchange="filtrarRelatorios()">
            <option value="1">Janeiro</option>
            <option value="2">Fevereiro</option>
            <option value="3">Março</option>
            <option value="4">Abril</option>
            <option value="5">Maio</option>
            <option value="6">Junho</option>
            <option value="7">Julho</option>
            <option value="8">Agosto</option>
            <option value="9">Setembro</option>
            <option value="10">Outubro</option>
            <option value="11">Novembro</option>
            <option value="12">Dezembro</option>
        </select>
        </div>
        <button type="submit" class="btn btn-primary" style="margin-left: 5px; margin-top: -3px;">Pesquisar</button>
    </form>
    </center>
    <section>
        <div class="table-wrapper">
            <table class="fl-table table-clear table-striped-columns">
                <thead class="table-dark">
                    <tr>
                        <th scope="col" style="width: 15%;">ID DO RELATORIO</th>
                        <th scope="col" style="width: 15%;">ID DA EMPRESA</th>
                        <th scope="col" style="width: 15%;">NOME DA EMPRESA</th>
                        <th scope="col">MES</th>
                        <th scope="col">ANO</th>
                        <th scope="col">NOME DO ARQUIVO</th>
                        <th scope="col">ARQUIVO</th>
                    </tr>
                </thead>
                <tbody id="tabelaRelatorios">
                    <?php while ($row = $result->fetch_assoc()) { ?>
                    <tr>
                        <td><?php echo $row['id_relatorio']; ?></td>
                        <td><?php echo $row['id_empresa_rel']; ?></td>
                        <td><?php echo $nome_empresa; ?></td>
                        <td><?php echo $row['mes']; ?></td>
                        <td><?php echo $row['ano']; ?></td>
                        <td><?php echo basename($row['arquivo']); ?></td>
                        <td><a style="background-color: #1B62B7; border: 1px solid #1B62B7;" href="php/baixar_arquivo.php?id=<?php echo $row['id_relatorio']; ?>"
                                class="btn btn-primary btn-secondary"><img src="img/dw-icon.png" alt=""
                                    style="width: 25px; height: 25px;"></a>
                            <a style="background-color: #1B62B7; border: 1px solid #1B62B7;" href="php/deletar_relatorio.php?id=<?php echo $row['id_relatorio']; ?>"
                            onclick="return confirm('Tem certeza que deseja deletar este registro?')"
                            class="btn btn-secondary"><img src="img/remove.png" alt=""
                                style="width: 20px; height: 20px;"></a></td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </section>
    <script src="js/listar_empresa_relatorios.js"></script>

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

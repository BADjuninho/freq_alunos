<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RELAÇÃO DE CLIENTES</title>
    <link rel="shortcut icon" href="img/favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style_listar_empresa.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap');

        h1 {
            text-align: center;
            margin: 50px 0;
        }

        body {
            font-family: 'Poppins', sans-serif;
        }
    </style>
</head>

<body>
    <?php require_once "php/conexao.php";
    require "php/verificar_cargo.php";
    

    //Obtem quantos usuarios estão cadastrados no cnpj daquela empresa no sistema
    $sql_query = "SELECT empresa.id_empresa, empresa.cnpj_empresa, empresa.nome_empresa, empresa.telefone, empresa.endereco, COUNT(usuarios.id_usuario) AS num_usuarios FROM empresa LEFT JOIN usuarios ON empresa.id_empresa = usuarios.id_empresa_user GROUP BY empresa.id_empresa";

    if ($result = $conn->query($sql_query)) {
    ?>
        <center>
            <h1 style="display: flex; justify-content: center; margin-top: 15px; margin-bottom: 20px;">Listar Empresas Cadastradas</h1>
            <div>
                <form class="campo-input" method="POST" action="php/pesquisar_cnpj.php" style=" width: 500px;display: flex; margin-left: 10px; margin-top: 15px; margin-bottom: 25px; vertical-align: top;">
                    <input style="margin-top: 0;" class="form-control" type="text" id="cnpj" name="cnpj" placeholder="CNPJ da empresa" oninput="filtrarEmpresas(this.value)">
                    <button type="submit" class="btn btn-primary btnPesquisar" style="margin-top: 1px; margin-left: 10px;">Pesquisar</button>
                </form>
            </div>
        </center>
        <section>
            <div class="table-wrapper">
                <table class="fl-table table-clear table-striped-columns">
                    <thead class="table-dark">
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">CNPJ</th>
                            <th scope="col">NOME</th>
                            <th scope="col">TELEFONE</th>
                            <th scope="col">ENDEREÇO</th>
                            <th scope="col" style="display: inline-block;white-space: nowrap; width:100%;">Usuarios da empresa</th>
                            <th scope="col">Arquivos</th>
                            <th scope="col" style="text-align: center;">AÇÕES</th>
                        </tr>
                    </thead>
                    <tbody id="tabelaEmpresas">
                        <?php while ($row = $result->fetch_assoc()) { ?>
                            <tr>
                                <td><?php echo $row['id_empresa']; ?></td>
                                <td><?php echo $row['cnpj_empresa']; ?></td>
                                <td style="max-width: 275px;"><?php echo strlen($row['nome_empresa']) > 30 ? substr($row['nome_empresa'], 0, 30) . '...' : $row['nome_empresa']; ?></td>
                                <td><?php echo $row['telefone']; ?></td>
                                <td style="max-width: 1000px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
                                    <?php echo strlen($row['endereco']) > 85 ? substr($row['endereco'], 0, 85) . '...' : $row['endereco']; ?></td>
                                <td style="text-align: center; font-size: 18px;" id="numUsuarios-<?php echo $row['id_empresa']; ?>">
                                    <?php echo $row['num_usuarios']; ?>
                                    <a class="btn btn-primary" style="margin-left: 50px; background-color: #1B62B7; border: 1px solid #1B62B7;" href="listar_usuarios_empresa?id=<?php echo $row['id_empresa']; ?>">
                                        <img src="img/show-icon.png" style="width: 20px; height: 20px;" alt="Ver usuarios">
                                    </a>
                                </td>
                                <td><a href="listar_relatorios?id=<?php echo $row['id_empresa']; ?>" class="btn btn-primary" style="background-color: #1B62B7; border: none;">Ver Relatorios</a>
                                    <a style="background-color: #1B62B7; border: 1px solid #1B62B7;" href="anexar_relatorio?id=<?php echo $row['id_empresa']; ?>" class="btn btn-primary"><img src="img/clip.png" alt="" style="width: 25px; height: 20px;"></a></td>
                                <td><a style="background-color: #1B62B7; border: 1px solid #1B62B7;" href="update_empresa?id=<?php echo $row['id_empresa']; ?>" class="btn btn-primary"><img src="img/edit.png" alt="" style="width: 25px; height: 20px;"></a>
                                    <a style="background-color: #1B62B7; border: 1px solid #1B62B7;" href="php/deletar_empresa.php?id=<?php echo $row['id_empresa']; ?>" onclick="return confirm('Tem certeza que deseja deletar este registro?')" class="btn btn-primary"><img src="img/remove.png" alt="" style="width: 20px; height: 20px;"></a></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </section>

        <!-- JavaScript Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>

        <script src="js/listar_empresa.js"></script>
</body>

</html>

<?php
    } else {
        echo "Erro ao executar a consulta: " . $conn->error;
    }

    // Fecha a conexão
    $conn->close();
?>

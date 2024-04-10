<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Usuarios</title>
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
    require "php/verificar_cargo.php";

    // Inicializa a variável de consulta SQL para buscar todos os usuários
    $sql_query = "
    SELECT 
        usuarios.id_usuario,
        usuarios.nome_usuario, 
        usuarios.cpf_usuario, 
        usuarios.dt_nasc_usuario, 
        usuarios.cargo, 
        empresa.nome_empresa AS empresa_usuario
    FROM 
        usuarios 
    LEFT JOIN 
        empresa ON usuarios.id_empresa_user = empresa.id_empresa";

    // Verifica se o CPF foi enviado via POST
    if(isset($_POST['cpf'])) {
        // Limpa o CPF e prepara para a consulta SQL
        $cpf = $_POST['cpf'];

        // Consulta SQL para pesquisar o usuário pelo CPF
        if (!empty($cpf)) {
            $sql_query = "
            SELECT 
                usuarios.id_usuario,
                usuarios.nome_usuario, 
                usuarios.cpf_usuario, 
                usuarios.dt_nasc_usuario, 
                usuarios.cargo, 
                empresa.nome_empresa AS empresa_usuario
            FROM 
                usuarios 
            LEFT JOIN 
                empresa ON usuarios.id_empresa_user = empresa.id_empresa
            WHERE 
                usuarios.cpf_usuario LIKE '%$cpf%'";
        }
    }

    // Executa a consulta SQL
    if ($result = $conn->query($sql_query)) {
    ?>
    <center>
        <h1 style="display: flex; justify-content: center; margin-top: 10px; margin-bottom: 10px;">Listar Usuarios</h1>
        <div>
        <form class="campo-input" onsubmit="filtrarUsuarios(); return false;" style="width: 500px; display: flex; margin-left: 10px; margin-top: 15px; margin-bottom: 25px; vertical-align: top;">
            <input style="margin-top: 0;" class="form-control" type="text" id="cpf" name="cpf" placeholder="CPF do Usuario" oninput="filtrarUsuarios()">
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
                        <th scope="col">NOME</th>
                        <th scope="col">CPF</th>
                        <th scope="col">DATA DE NASCIMENTO</th>
                        <th scope="col">CARGO</th>
                        <th scope="col" style="display: inline-block; width: 100%;">Empresa do usuario</th>
                        <th scope="col">AÇÕES</th>
                    </tr>
                </thead>
                <tbody id="tabelaUsuarios">
                    <?php while ($row = $result->fetch_assoc()) { ?>
                    <tr>
                        <td><?php echo $row['id_usuario']; ?></td>
                        <td><?php echo $row['nome_usuario']; ?></td>
                        <td><?php echo $row['cpf_usuario']; ?></td>
                        <td><?php echo $row['dt_nasc_usuario']; ?></td>
                        <td><?php echo $row['cargo']; ?></td>
                        <td class="empresa-usuario"><?php echo $row['empresa_usuario']; ?></td>
                        <td>
                            <?php if (!empty($row['empresa_usuario'])) { ?>
                                <a style="background-color: #1B62B7; border: 1px solid #1B62B7; margin-left: 35px;" href="php/desvincular.php?cpf=<?php echo $row['cpf_usuario']; ?>"
                                class="btn btn-primary btn-secondary btn-desvincular">Desvincular</a>
                            <?php } ?>
                            <a style="background-color: #1B62B7; border: 1px solid #1B62B7;" href="/update_usuario?id=<?php echo $row['id_usuario']; ?>"
                                class="btn btn-primary btn-secondary"><img src="img/edit.png" alt=""
                                    style="width: 25px; height: 20px;"></a> 
                            <a  style="background-color: #1B62B7; border: 1px solid #1B62B7;" href="php/deletar_usuario.php?id=<?php echo $row['id_usuario']; ?>"
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
    <?php
    } else {
        echo "Erro ao executar a consulta: " . $conn->error;
    }

    // Fecha a conexão
    $conn->close();
    ?>
    <script src="js/listar_usuarios.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2"
        crossorigin="anonymous"></script>
</body>

</html>

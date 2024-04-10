<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RELAÇÃO DE CLIENTES</title>
    <link rel="shortcut icon" href="img/favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style_listar.css">
    <style>

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

    //Obtem quantos usuarios estão cadastrados no cnpj daquela empresa no sistema
    $sql_query = "SELECT empresa.id_empresa, empresa.cnpj_empresa, empresa.nome_empresa, empresa.telefone, empresa.endereco, COUNT(usuarios.id_usuario) AS num_usuarios FROM empresa LEFT JOIN usuarios ON empresa.id_empresa = usuarios.id_empresa_user GROUP BY empresa.id_empresa";
    $sql_query2 = "SELECT nome_empresa FROM empresa WHERE id_empresa = " . $_SESSION['id_empresa_user'];
    if ($result = $conn->query($sql_query)) {
        if ($result2 = $conn->query($sql_query2)) {
            while ($row = $result2->fetch_assoc()) {
                $nome_empresa = $row['nome_empresa'];
            }
        }
    ?>
        <h1>Lista de usuarios da empresa <?php echo $nome_empresa;?></h1>
        <section>
        <div class="table-wrapper">
            <table class="fl-table table-clear table-striped-columns">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>CPF</th>
                        <th>Data de Nascimento</th>
                        <th>Cargo</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $sql_usuarios = "SELECT * FROM usuarios WHERE id_empresa_user = " . $_SESSION['id_empresa_user'];
                    $result_usuarios = $conn->query($sql_usuarios);
                    while ($row_usuario = $result_usuarios->fetch_assoc()) { ?>
                        <tr>
                            <td><?php echo $row_usuario['id_usuario']; ?></td>
                            <td><?php echo $row_usuario['nome_usuario']; ?></td>
                            <td><?php echo $row_usuario['cpf_usuario']; ?></td>
                            <td><?php echo $row_usuario['dt_nasc_usuario']; ?></td>
                            <td><?php echo $row_usuario['cargo']; ?></td>
                        </tr>
                        <?php } ?>
                    </tbody>
        </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>

</html>

<?php
} else {
    echo "Erro ao executar a consulta: " . $conn->error;
}
$conn->close();
?>

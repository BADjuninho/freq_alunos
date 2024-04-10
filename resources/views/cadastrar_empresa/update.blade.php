<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CADASTRO DE CLIENTES</title>
    <link rel="stylesheet" href="css/style_cad_page_empresa.css">
    <link rel="shortcut icon" href="img/favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        body {
            background-color: #f8f9fa;
        }

        .container-custom {
            margin-top: 50px;
        }

        .card-custom {
            border-radius: 15px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .form-label {
            font-weight: 600;
        }
    </style>
</head>

<body>
<?php require "php/verificar_cargo.php"; ?>
<div class="container">
        <header><img src="img/usuario.png" alt="">Atualizar Empresa</header>
        <?php
            require_once "php/conexao.php";
            $sql_query = "SELECT * FROM empresa WHERE id_empresa = " . $_GET["id"];
            if ($result = $conn->query($sql_query)) {
                while ($row = $result->fetch_assoc()) {
                    $id = $row["id_empresa"];
                    $nome = $row["nome_empresa"];
                    $telefone = $row["telefone"];
                    $endereco = $row["endereco"];
        ?>
        <form action="php/atualizar_empresa.php" method="GET" class="form">
                <div class="detalhes-pessoal">
                    <span class="titulo">Detalhes da Empresa</span>
                    <div class="campos">
                            <input type="hidden" class="form-control" value="<?php echo $id; ?>" name="id" id="id" required>
                            <div class="campo-input">
                                <label for="nome" class="form-label">Nome da Empresa:</label>
                                <input type="text" class="form-control" value="<?php echo $nome; ?>" name="nome" id="nome" required>
                            </div>
                            <div class="campo-input">
                                <label for="cpf" class="form-label">Telefone:</label>
                                <input type="text" class="form-control" value="<?php echo $telefone; ?>" name="telefone" id="telefone" required>
                            </div>
                            <div class="campo-input">
                                <label for="nome" class="form-label">Endereço:</label>
                                <input type="text" class="form-control" value="<?php echo $endereco; ?>" name="endereco" id="endereco" required>
                        </div>
                    </div>
                    <button type="submit" class="btn-login btn-primary">Atualizar</button>
                </div>
        </form>
        <?php
            }
        }
        $conn->close();
        ?>
    </div>
</body>

</html>

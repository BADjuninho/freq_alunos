<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="img/favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="css/style_vinc_usuario.css">
    <title>VINCULAR USUARIO</title>
    <style>
        h1 {
            color: #343a40;
            text-align: center;
            margin-bottom: 30px;
        }

        .form-control {
            border-radius: 20px;
        }

        .form-label {
            color: #495057;
            font-weight: bold;
        }
    </style>
</head>

<body>
    <?php
        require "php/verificar_cargo.php";
    ?>
    <div class="container">
        <header><img src="img/usuario.png" alt="">Vincular Usuario a Empresa</header>
        <form action="php/vincular.php" method="POST" class="form">
            <div class="detalhes-pessoal">
                <span class="titulo">Detalhes da Empresa</span>
                <div class="campos">
                    <div class="campo-input">
                        <label for="cnpj" class="form-label">CNPJ da Empresa:</label>
                        <input type="text" class="form-control" name="cnpj" id="cnpj" required>
                    </div>
                    <div class="campo-input">
                        <label for="id" class="form-label">Selecionar Usuario:</label>
                        <select class="form-control" name="id" id="id" required>
                            <?php
                            require_once "php/conexao.php";

                            $stmt = $conn->prepare("SELECT cpf_usuario, nome_usuario FROM usuarios WHERE id_empresa_user IS NULL AND cargo != 'Aluno' AND cargo != 'Ex-Aluno'");
                            $stmt->execute();
                            $result = $stmt->get_result();

                            // Preenche o <select> com os dados obtidos
                            while ($row = $result->fetch_assoc()) {
                                echo "<option name='cpf' value='" . $row['cpf_usuario'] . "'>" . $row['nome_usuario'] . " - " . $row['cpf_usuario'] . "</option>";
                            }

                            // Fecha a consulta e a conexão
                            $stmt->close();
                            $conn->close();
                            ?>
                        </select>
                    </div>
                    <button type="submit" class="btn-login btn-primary">Vincular</button>
                </div>
            </div>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2"
        crossorigin="anonymous"></script>
    <script src="js/only_nums.js"></script>
</body>

</html>

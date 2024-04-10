<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="img/favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="css/style_cad_page_empresa.css">
    <title>CADASTRO DE EMPRESA</title>
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
        <header><img src="img/usuario.png" alt="">Cadastrar Empresa</header>
        <form action="php/cadastrar_empresa.php" method="POST" class="form">
                <div class="detalhes-pessoal">
                    <span class="titulo">Detalhes da Empresa</span>
                    <div class="campos">
                            <div class="campo-input">
                                <label for="cnpj" class="form-label">CNPJ da Empresa:</label>
                                <input type="text" class="form-control" name="cnpj" id="cnpj" required>
                            </div>
                            <div class="campo-input">
                                <label for="nome" class="form-label">Nome da Empresa:</label>
                                <input type="text" class="form-control" name="nome" id="nome" required>
                            </div>
                            <div class="campo-input">
                                <label for="cpf" class="form-label">Telefone:</label>
                                <input type="text" class="form-control" name="telefone" id="telefone" required>
                            </div>
                            <div class="campo-input">
                                <label for="nome" class="form-label">Endereço:</label>
                                <input type="text" class="form-control" name="endereco" id="endereco" required>
                        </div>
                        <button type="submit" class="btn-login btn-primary">CADASTRAR</button>
                    </div>
                </div>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2"
        crossorigin="anonymous"></script>
    

    <script src="js/script_index_empresa.js"></script>

</body>

</html>

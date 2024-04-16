<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="img/favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="css/style_cad_page.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">
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
        $id = $_GET['id'];
    ?>
    <div class="container">
        <header><img src="img/usuario.png" alt="">Fazer Solicitação</header>
        <form action="php/cadastrar_solicitacao.php" method="POST" class="form">
                <div class="detalhes-pessoal">
                    <span class="titulo">Detalhes da solicitacao</span>
                    <div class="campos">
                            <input type="hidden" value="<?php echo $id; ?>" name="id" id="id">
                            <div class="campo-input">
                                <label for="mes" style="margin-left: 30px; margin-top: 9px; font-size: 22px;">Tipo Da Solicitação:</label>
                                <div class="select-dropdown" style="width: 500px; margin-top: 45px;">
                                    <select name="tipo" id="tipo">
                                    <option value="Segunda Via de certificado">Segunda via de certificado</option>
                                    <option value="Historico">Historico</option>
                                    <option value="Declaração">Declaração</option>
                                    <option value="">Outros Assuntos</option>
                                </select>
                                </div>
                            </div>
                            <div class="campo-input">
                                <label for="nome" class="form-label">Solicitação:</label>
                                <input type="text" class="form-control" name="solicitacao" id="solicitacao" required>
                            </div>
                        <button type="submit" class="btn-login btn-primary">Solicitar</button>
                    </div>
                </div>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2"
        crossorigin="anonymous"></script>
    


</body>

</html>

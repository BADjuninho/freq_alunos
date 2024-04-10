<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="shortcut icon" href="img/favicon.png" type="image/x-icon">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style_cad_page.css">
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
        <header><img src="img/usuario.png" alt="">Registrar Usuario</header>
        <form action="php/cadastrar_usuario.php" method="POST" class="form">
            <div class="primeira-forma">
                <div class="detalhes-pessoal">
                    <span class="titulo">Detalhes do Usuario</span>
                    <div class="campos">
                            <div class="campo-input">
                                <label for="cnpj" class="form-label">CNPJ da Empresa:</label>
                                <input type="text" class="form-control" name="cnpj" id="cnpj">
                            </div>
                            <div class="campo-input">
                                <label for="nome" class="form-label">Login:</label>
                                <input type="text" class="form-control" name="login" id="login" required>
                            </div>
                            <div class="campo-input">
                                <label for="cpf" class="form-label">Senha:</label>
                                <input type="password" class="form-control" name="senha" id="senha" required>
                            </div>
                            <div class="campo-input">
                                <label for="nome" class="form-label">Nome:</label>
                                <input type="text" class="form-control" name="nome" id="nome" required>
                            </div>
                            <div class="campo-input">
                                <label for="telefone" class="form-label">CPF:</label>
                                <input type="text" class="form-control" name="cpf" id="cpf" required>
                            </div>
                            <div class="campo-input">
                                <label for="data_nascimento" class="form-label">Data de Nascimento:</label>
                                <input type="date" class="form-control" name="data_nascimento" id="data_nascimento" required>
                            </div>
                            <div>
                                <label for="cargo">Cargo:</label>
                                <div class="select-dropdown">
                                    <select name="cargo" id="">
                                        <option value="Funcionario">Funcionario</option>
                                        <option value="Secretário">Secretário</option>
                                        <option value="Gerente">Gerente</option>
                                    </select>   
                                </div>
                            </div>
                            <button type="submit" class="btn-login btn-primary">CADASTRAR</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <script>
        const mainForm = document.querySelector('.form');
        mainForm.addEventListener('input', (e) => {
            const element = e.target;

            if (element.id === 'cnpj' || element.id === 'cpf') {

                element.value = element.value.replace(/\D/g, '');

                if (element.id === 'cpf' && element.value.length > 11) {
                    element.value = element.value.slice(0, 11);
                } else if (element.id === 'cnpj' && element.value.length > 14) {
                    element.value = element.value.slice(0, 14);
                }
            }
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2"
        crossorigin="anonymous"></script>
</body>

</html>

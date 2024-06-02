<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="img/favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="css/style_vinc_usuario.css">
    <title>VINCULAR ALUNO</title>
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

        .select-dropdown select {
            width: 100%;
            height: 100%;
            font-size: 1rem;
            font-weight: normal;
            padding: 10px 24px 8px 10px;
            border: none;
            background-color: transparent;
            appearance: none;
        }

        .select-dropdown {
            margin-top: 20px;
            display: inline-block;
            position: relative;
            background-color: #ccc;
            border-radius: 4px;
        }

        .select-dropdown:after {
            content: "";
            position: absolute;
            top: 50%;
            right: 8px;
            width: 0;
            height: 0;
            margin-top: -2px;
            border-top: 5px solid #aaa;
            border-right: 5px solid transparent;
            border-left: 5px solid transparent;
        }
    </style>
</head>

<body>
    <?php
        require_once "php/conexao.php";
        require "php/verificar_cargo.php";

        $sql = "SELECT nome_curso, id_curso FROM cursos";
        $result = $conn->query($sql);
        
    ?>
    <div class="container">
        <header><img src="img/usuario.png" alt="">Vincular Aluno a Curso</header>
        <form action="php/vincular_aluno.php" method="POST" class="form">
                <div class="detalhes-pessoal">
                    <span class="titulo" style="font-size:20px;">Detalhes</span>
                    <div class="campos">
                        <div class="campo-input" style="border:none;">
                            <label class="form-label" style="font-size: 16px;">Curso: </label>
                            <div class="select-dropdown">
                                <select name="curso" id="curso">
                                    <?php
                                        if ($result->num_rows > 0) {
                                            while ($row = $result->fetch_assoc()) {
                                                echo "<option value='" . $row['id_curso'] . "'>" . $row['nome_curso'] . "</option>";
                                            }
                                        } else {
                                            echo "<h1>Não existem Cursos</h1>";
                                        }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <input type="hidden" name="id" id="id">
                        <div class="campo-input" style="border:none;">
                            <label class="form-label" style="font-size: 16px;">Selecione O Aluno: </label>
                            <div class="select-dropdown">
                                <select name="cpf" id="cpf" required>
                                <?php
                                require_once "php/conexao.php";

                                $stmt = $conn->prepare("SELECT cpf_usuario, nome_usuario FROM usuarios WHERE cargo = 'Aluno'");
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

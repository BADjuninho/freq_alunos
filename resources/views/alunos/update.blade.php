<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atualizar Usuario</title>
    <link rel="stylesheet" href="css/style_cad_page.css">
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
        <header><img src="img/usuario.png" alt="">Atualizar Aluno</header>
        <?php
            require_once "php/conexao.php";
            $sql_query = "SELECT * FROM usuarios WHERE id_usuario = " . $_GET["id"];
            $sql_query2 = "SELECT * FROM alunos WHERE id_usuario_aluno = " . $_GET["id"];
            if ($result = $conn->query($sql_query)) {
                if ($result2 = $conn->query($sql_query2)) {
                    if ($result2 && $result2->num_rows > 0){
                        $row2 = $result2->fetch_assoc();
                    } else {
                        echo "<script language='javascript' type='text/javascript'>alert('Não foi encontrado nenhum registro');window.location.href='/listar_alunos_gerente';</script>";
                        exit;
                    }
                } else {
                    echo "<script language='javascript' type='text/javascript'>alert('Falha ao fazer consulta');window.location.href='/listar_alunos_gerente';</script>";
                    exit;
                }
                while ($row = $result->fetch_assoc()) {
                    $id = $row["id_usuario"];
                    $login = $row["login"];
                    $senha = $row["senha"];
                    $nome = $row["nome_usuario"];
                    $cpf = $row["cpf_usuario"];
                    $data_nascimento = $row["dt_nasc_usuario"];
                    $cargo = $row["cargo"];
                    $email = $row2["email_aluno"];
                    $endereco = $row2["endereco"];
                    $perfil = $row2["perfil"];
        ?>
        <form action="php/atualizar_aluno.php" method="POST" class="form">
                <div class="detalhes-pessoal">
                    <span class="titulo">Detalhes do Aluno</span>
                    <div class="campos">
                            <input type="hidden" class="form-control" value="<?php echo $id; ?>" name="id" id="id" required>
                            <div class="campo-input">
                                <label for="login" class="form-label">Login:</label>
                                <input type="text" class="form-control" value="<?php echo $login; ?>" name="login" id="login" required>
                            </div>
                            <div class="campo-input">
                                <label for="senha" class="form-label">Senha:</label>
                                <input type="password" class="form-control" value="<?php echo $senha; ?>" name="senha" id="senha" required>
                            </div>
                            <div class="campo-input">
                                <label for="nome" class="form-label">Nome:</label>
                                <input type="text" class="form-control" value="<?php echo $nome; ?>" name="nome" id="nome" required>
                            </div>
                            <div class="campo-input">
                                <label for="nome" class="form-label">E-mail:</label>
                                <input type="text" class="form-control" value="<?php echo $email; ?>" name="email" id="email" required>
                            </div>
                            <div class="campo-input">
                                <label for="cpf" class="form-label">CPF:</label>
                                <input type="text" class="form-control" value="<?php echo $cpf; ?>" name="cpf" id="cpf" required>
                            </div>
                            <div class="campo-input">
                                <label for="nome" class="form-label">Endereco:</label>
                                <input type="text" class="form-control" value="<?php echo $endereco; ?>" name="endereco" id="endereco" required>
                            </div>
                            <div class="campo-input">
                                <label for="data_nascimento" class="form-label">Data De Nascimento:</label>
                                <input type="date" class="form-control" value="<?php echo $data_nascimento; ?>" name="data_nascimento" id="data_nascimento" required>
                            </div>
                            <div class="campo-input-botoes">
                                <label for="perfil">Perfil:</label>
                                <div class="select-dropdown" style="width: 475px;">
                                    <select name="perfil" id="">
                                        <option value="Aluno">Aluno</option>
                                        <option value="Ex-Aluno">Ex-Aluno</option>
                                    </select>   
                                </div>
                            </div>
                    </div>
                    <button type="submit" class="btn-login btn-primary" style="margin-left: auto; width: 150px;">Atualizar</button>
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

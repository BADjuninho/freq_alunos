<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CADASTRO DE CLIENTES</title>
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

        .select-dropdown select {
            width: 100%;
            height: 100%;
            font-size: 1rem;
            font-weight: normal;
            padding: 8px 24px 8px 10px;
            border: none;
            background-color: transparent;
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
        }

        .select-dropdown {
            display: inline-block;
            position: relative;
            background-color: #E6E6E6;
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
        require "php/verificar_cargo.php";
    ?>
    <div class="container container-custom">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="card card-custom">
                    <div class="card-body">
                        <?php
                            require_once "php/conexao.php";
                            if(isset($_GET["id"])) {
                                $sql_query = "
                                SELECT 
                                    solicitacoes.*, 
                                    alunos.nome_aluno as nome_aluno
                                FROM 
                                    solicitacoes
                                JOIN
                                    alunos ON solicitacoes.id_aluno_sol = alunos.id_aluno
                                ";
                                if ($result = $conn->query($sql_query)) {
                                    while ($row = $result->fetch_assoc()) {
                                        $nome = $row["nome_aluno"];
                                        $id = $row["id_aluno_sol"];
                                        $status = $row["status_sol"];
                                        $tipo = $row["tipo"];
                                    }
                                }
                            } else {
                                echo "ID não especificado na URL";
                                exit;
                            }   
                        ?>
                        <h1 class="text-center mb-4">Atualizar a solicitação de: <?php echo $nome ?></h1>
                        <form method="POST" action="php/atualizar_solicitacao.php" enctype="multipart/form-data">
                            <input type="hidden" class="form-control" name="id" id="id" required value="<?php echo $id;?>" required>
                            <div class="mb-3">
                                <label class="form-label">Status:</label>
                                <div class="select-dropdown">
                                    <select name="status" id="status">
                                        <option value="Pendente">Pendente</option>
                                        <option value="Aguardando Pagamento">Aguardando Pagamento</option>
                                        <option value="Concluida">Concluida</option>
                                    </select>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="tipo" class="form-label">Tipo:</label>
                                <input type="text" class="form-control" name="tipo" id="tipo" readonly required value="<?php echo $tipo;?>">
                            <div class="mb-3" style="margin-top: 20px">
                                <button type="submit" class="btn btn-primary">Enviar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>

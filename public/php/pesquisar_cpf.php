<?php
/**
 * Este arquivo é responsável por realizar uma pesquisa
 * de usuário pelo CPF e retornar o resultado em HTML.
 */
require_once "conexao.php";

if(isset($_POST['cpf'])) { // Se o CPF foi enviado
    $cpf = $_POST['cpf'];  // Pega o CPF enviado

    // Consulta SQL para pesquisar o usuário pelo CPF
    $sql = "SELECT 
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

    $result = $conn->query($sql);

    if ($result->num_rows > 0) { // Se encontrou um usuário correspondente
        // Construir o HTML para as linhas da tabela com os resultados da pesquisa
        while($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["id_usuario"] . "</td>"; // id
            echo "<td>" . $row["nome_usuario"] . "</td>"; // nome
            echo "<td>" . $row["cpf_usuario"] . "</td>"; // cpf
            echo "<td>" . $row["dt_nasc_usuario"] . "</td>"; // data de nascimento
            echo "<td>" . $row["cargo"] . "</td>"; // cargo
            echo "<td>" . $row["empresa_usuario"] . "</td>"; // empresa
            echo "<td>"; // botoes
            if (!empty($row['empresa_usuario'])) { // se o usuario estiver vinculado a uma empresa
                echo "<a style='background-color: #1B62B7; border: 1px solid #1B62B7; margin-left: 35px;' href='php/desvincular.php?cpf=" . $row["cpf_usuario"] . "' class='btn btn-primary btn-secondary btn-desvincular'>Desvincular</a>";
            }
            echo "<a style='background-color: #1B62B7; border: 1px solid #1B62B7; margin-left: 10px;' href='/update_usuario?id=" . $row["id_usuario"] . "' class='btn btn-primary btn-secondary'><img src='img/edit.png' alt='' style='width: 25px; height: 20px;'></a> 
                  <a style='background-color: #1B62B7; border: 1px solid #1B62B7; margin-left: 10px;' href='php/deletar_usuario.php?id=" . $row["id_usuario"] . "' onclick=\"return confirm('Tem certeza que deseja deletar este registro?')\" class='btn btn-secondary'><img src='img/remove.png' alt='' style='width: 20px; height: 20px;'></a>";
            echo "</td>";   
            echo "</tr>";
        }
    } else { // Se não encontrou nenhum usuario correspondente
        echo "<tr><td colspan='8'>Nenhum resultado encontrado</td></tr>";
    }
} else { // Se o CPF não foi enviado
    echo "<tr><td colspan='8'>CPF não enviado</td></tr>";
}

$conn->close();
?>


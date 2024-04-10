<?php
require_once "conexao.php";

if(isset($_POST['cnpj'])) {
    $cnpj = $_POST['cnpj'];

    // Consulta SQL para pesquisar a empresa pelo CNPJ
    $sql = "SELECT empresa.id_empresa, empresa.cnpj_empresa, empresa.nome_empresa, empresa.telefone, empresa.endereco, COUNT(usuarios.id_usuario) AS num_usuarios FROM empresa LEFT JOIN usuarios ON empresa.id_empresa = usuarios.id_empresa_user WHERE empresa.cnpj_empresa LIKE '%$cnpj%' GROUP BY empresa.id_empresa";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Construir o HTML para as linhas da tabela com os resultados da pesquisa
        while($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["id_empresa"] . "</td>";
            echo "<td>" . $row["cnpj_empresa"] . "</td>";
            echo "<td>" . $row["nome_empresa"] . "</td>";
            echo "<td>" . $row["telefone"] . "</td>";
            echo "<td>" . $row["endereco"] . "</td>";
            echo '<td>'.$row["num_usuarios"].'<a class="btn btn-primary" style="margin-left: 50px; background-color: #1B62B7; border: 1px solid #1B62B7;" href="listar_usuarios_empresa?id='.$row['id_empresa'].'"><img src="img/show-icon.png" style="width: 20px; height: 20px;" alt="Ver usuarios"> </a></td>';
            echo "<td><a class='btn btn-primary' href='listar_relatorios?id=" . $row["id_empresa"] . "'>Ver Relatorios</a>";
            echo "<a style='background-color: #1B62B7; border: 1px solid #1B62B7; margin-left: 10px;' href='anexar_relatorio?id=" . $row["id_empresa"] . "' class='btn btn-primary'><img src='img/clip.png' alt='' style='width: 25px; height: 20px;'></a></td>";
            echo "<td><a style='background-color: #1B62B7; border: 1px solid #1B62B7;' href='update_empresa?id=" . $row["id_empresa"] . "' class='btn btn-primary'><img src='img/edit.png' alt='' style='width: 25px; height: 20px;'></a>";
            echo "<a style='background-color: #1B62B7; border: 1px solid #1B62B7; margin-left: 10px;' href='php/deletar_empresa.php?id=" . $row["id_empresa"] . "' onclick=\"return confirm('Tem certeza que deseja deletar este registro?')\" class='btn btn-primary'><img src='img/remove.png' alt='' style='width: 20px; height: 20px;'></a></td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='8'>Nenhum resultado encontrado</td></tr>";
    }
} else {
    echo "<tr><td colspan='8'>CNPJ não enviado</td></tr>";
}

$conn->close();
?>

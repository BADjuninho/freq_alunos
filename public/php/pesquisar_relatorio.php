<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['mes'])) {
        $mes = $_POST['mes'];
        
        if (ctype_digit($mes) && $mes >= 1 && $mes <= 12) {
            require_once "conexao.php";
            
            $sql = "SELECT * FROM relatorios WHERE mes = $mes";
            
            $result = $conn->query($sql);
            
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $sql2 = "SELECT nome_empresa FROM empresa WHERE id_empresa = " . $row['id_empresa_rel'];
                    $result2 = $conn->query($sql2);
                    $row2 = $result2->fetch_assoc();
                    $nome_empresa = $row2['nome_empresa'];
                    echo "<tr>";
                    echo "<td>" . $row['id_relatorio'] . "</td>";
                    echo "<td>" . $row['id_empresa_rel'] . "</td>";
                    echo "<td>" . $nome_empresa . "</td>";
                    echo "<td>" . $row['mes'] . "</td>";
                    echo "<td>" . $row['ano'] . "</td>";
                    echo "<td>" . basename($row['arquivo']) . "</td>";
                    echo "<td><a style='background-color: #1B62B7; border: 1px solid #1B62B7;' href='php/baixar_arquivo.php?id=" . $row['id_relatorio'] . "' class='btn btn-primary btn-secondary'><img src='img/dw-icon.png' alt='' style='width: 25px; height: 25px;'></a>
                          <a style='background-color: #1B62B7; border: 1px solid #1B62B7;' href='php/deletar_relatorio.php?id=" . $row['id_relatorio'] . "' onclick='return confirm(\"Tem certeza que deseja deletar este registro?\")' class='btn btn-secondary'><img src='img/remove.png' alt='' style='width: 20px; height: 20px;'></a></td>";
                    echo "</tr>";
                }
                
                echo "</tbody>";
                echo "</table>";
            } else {
                echo "<p>Nenhum relatório encontrado para o mês selecionado.</p>";
            }
            
            $conn->close();
        } else {
            echo "<p>Valor de mês inválido.</p>";
        }
    } else {
        echo "<p>Parâmetro 'mes' não enviado.</p>";
    }
} else {
    echo "<p>Método de requisição inválido.</p>";
}
?>

function filtrarRelatorios() {
    var mesSelecionado = document.getElementById("mes").value;
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("tabelaRelatorios").innerHTML = this.responseText;
        }
    };
    xhttp.open("POST", "php/pesquisar_relatorio.php", true); // Substitua 'filtro_relatorios.php' pelo nome do arquivo PHP que processa a solicitação AJAX
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("mes=" + mesSelecionado);
}
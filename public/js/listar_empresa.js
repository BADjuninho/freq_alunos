function filtrarEmpresas(cnpj) {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("tabelaEmpresas").innerHTML = this.responseText;
        }
    };
    xhttp.open("POST", "php/pesquisar_cnpj.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("cnpj=" + cnpj);
}
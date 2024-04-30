function filtrarUsuarios() {
    var cpf = document.getElementById("cpf").value;
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("tabelaUsuarios").innerHTML = this.responseText;
        }
    };
    xhttp.open("POST", "php/pesquisar_cpf_aluno.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("cpf=" + cpf);
}
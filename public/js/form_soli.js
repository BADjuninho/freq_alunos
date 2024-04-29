function mostrarOutrosAssuntos() {
    var tipoSelecionado = document.getElementById("tipo").value;
    var outrosAssuntosCampo = document.getElementById("outros-assuntos");

    if (tipoSelecionado === "Outros") {
        outrosAssuntosCampo.classList.remove("hidden");
    } else {
        outrosAssuntosCampo.classList.add("hidden");
    }
}
function contarCaracteres(campo, limite) {
    var caracteresDigitados = campo.value.length;
    var caracteresRestantes = limite - caracteresDigitados;

    document.querySelector(".caracteres-restantes").innerHTML = `${caracteresDigitados}` + ` / ` + `${caracteresRestantes}`;
}
    
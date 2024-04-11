document.addEventListener("DOMContentLoaded", function() {
    document.getElementById("matricula").value = gerarMatricula();
});

function gerarMatricula() {
    const caracteresIniciais = ['M', 'T', 'N'];
    const caractereInicial = caracteresIniciais[Math.floor(Math.random() * caracteresIniciais.length)];
    const numerosAleatorios = Math.floor(Math.random() * 10000000).toString().padStart(7, '0');
    const matricula = caractereInicial + numerosAleatorios;
    return matricula;
}

const container = document.querySelector('.container');
const login = document.querySelector('.login-link');
const btnLogin = document.querySelector('.btnLogin');
const fechar = document.querySelector('.icone-fechar');
const container_geral = document.querySelector('.container-geral');
const registrar = document.querySelector('.registrar-link');
const caixa_toggle = document.querySelector('.caixa-toggle-items');
const caixa_registrar = document.querySelector('.caixa-registrar');
const caixa_login_empresarial = document.querySelector('.caixa-login-empresarial');
const h1_register = document.querySelector('.h1-register');
const h1_login = document.querySelector('.h1-login');

function toggleLogin() {
    caixa_toggle.style.display = (caixa_toggle.style.display === 'block') ? 'none' : 'block';
    container.classList.toggle('popup-ativo');
    container_geral.classList.toggle('oculto');
    caixa_toggle.classList.toggle('exibindo');
}

function mudar(){
    caixa_toggle.style.display = (caixa_toggle.style.display === 'block') ? 'none' : 'block';
}
btnLogin.addEventListener('click', toggleLogin);
login.addEventListener('click', mudar);
registrar.addEventListener('click', mudar);


login.addEventListener('click', () => {
    container.classList.add('ativo');
    caixa_registrar.style.display = 'block';
    caixa_login_empresarial.style.display = 'none';
    h1_register.textContent = 'Registrar';
    h1_login.textContent = 'Conta SENAI';
});

registrar.addEventListener('click', () => {
    container.classList.remove('ativo');
    caixa_registrar.style.display = 'block';
    caixa_login_empresarial.style.display = 'none';
    h1_register.textContent = 'Registrar';
    h1_login.textContent = 'Conta SENAI';
});

fechar.addEventListener('click', () => {
    caixa_toggle.classList.remove('exibindo');
    container.classList.remove('ativo')
    container.classList.remove('popup-ativo');
    container_geral.classList.remove('oculto');
    caixa_toggle.classList.remove('exibindo');
    caixa_toggle.style.display = 'none';
    caixa_registrar.style.display = 'none';
    caixa_login_empresarial.style.display = 'none';
    h1_register.textContent = 'Registrar';
    h1_login.textContent = 'Conta SENAI';
});

const tipoContaSwitch = document.querySelector('.switch input[type="checkbox"]');
const tipoContaLabel = document.querySelector('.caixa-toggle');
const caixaLogin = document.querySelector('.caixa-login');
const caixaRegistrar = document.querySelector('.caixa-registrar');
const caixaLoginEmpresarial = document.querySelector('.caixa-login-empresarial');

tipoContaSwitch.addEventListener('change', function() {
    if (this.checked) {
        tipoContaLabel.textContent = 'Fazer Login - Conta Empresarial';
        caixaLogin.style.display = 'none';
        caixaRegistrar.style.display = 'none';
        caixaLoginEmpresarial.style.display = 'block';
    } else {
        tipoContaLabel.textContent = 'Fazer Login - Conta SENAI';
        caixaLogin.style.display = 'block';
        caixaRegistrar.style.display = 'block';
        caixaLoginEmpresarial.style.display = 'none';
    }
});

function calcularIdade() {
    var dataNascimento = new Date(document.getElementById("dt_nascimento").value);
    var hoje = new Date();
    var idade = hoje.getFullYear() - dataNascimento.getFullYear();
    var mes = hoje.getMonth() - dataNascimento.getMonth();

    if (mes < 0 || (mes === 0 && hoje.getDate() < dataNascimento.getDate())) {
        idade--;
    }

    return idade;
}

function mostrarCamposResponsavel() {
    var idade = calcularIdade();

    if (idade < 18) {
        document.getElementById("camposResponsavel").style.display = "block";
        container.classList.add('expandido');
        caixaLogin.style.display = "none";
        document.querySelector(".conteudo-aluno-reg").style.display = "none";
    } else {
        document.getElementById("camposResponsavel").style.display = "none";
        container.classList.remove('expandido');
    }
}

document.getElementById("dt_nascimento").addEventListener("input", function() {
    mostrarCamposResponsavel();
});


function voltar() {
    let conteudoAlunoReg = document.querySelector('.conteudo-aluno-reg');
    let camposResponsavel = document.getElementById("camposResponsavel");
    if (conteudoAlunoReg.style.display === 'none') {
        conteudoAlunoReg.style.display = 'block';
        camposResponsavel.style.display = 'none';
    } else {
        conteudoAlunoReg.style.display = 'none';
    }
}
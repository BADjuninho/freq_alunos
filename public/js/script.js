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

btnLogin.addEventListener('click', () => {
    container.classList.toggle('popup-ativo');
    container_geral.classList.toggle('oculto');
    caixa_toggle.classList.toggle('exibindo');
    caixa_toggle.style.display='block';
});

login.addEventListener('click', () => {
    container.classList.add('ativo');
    caixa_toggle.style.display = 'none';
    caixa_registrar.style.display = 'block';
    caixa_login_empresarial.style.display = 'none';
    h1_register.textContent = 'Registrar';
    h1_login.textContent = 'Conta SENAI';
});

registrar.addEventListener('click', () => {
    container.classList.remove('ativo');
    caixa_toggle.style.display = 'block';
    caixa_registrar.style.display = 'block';
    caixa_login_empresarial.style.display = 'none';
    h1_register.textContent = 'Registrar';
    h1_login.textContent = 'Conta SENAI';
});

fechar.addEventListener('click', () => {
    caixa_toggle.classList.toggle('exibindo');
    container.classList.remove('ativo')
    container.classList.remove('popup-ativo');
    container_geral.classList.remove('oculto');
    caixa_toggle.classList.remove('exibindo');
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
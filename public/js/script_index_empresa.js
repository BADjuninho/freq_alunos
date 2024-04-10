const mainForm = document.querySelector('.form');
mainForm.addEventListener('input', (e) => {
    const element = e.target;

    if (element.id === 'cnpj' || element.id === 'cpf') {
        // Remove todos os caracteres que não são números
        element.value = element.value.replace(/\D/g, '');

        // Verifica se o valor ultrapassou o tamanho máximo permitido
        if (element.id === 'cpf' && element.value.length > 11) {
            element.value = element.value.slice(0, 11);
        } else if (element.id === 'cnpj' && element.value.length > 14) {
            element.value = element.value.slice(0, 14);
        }
    }
});
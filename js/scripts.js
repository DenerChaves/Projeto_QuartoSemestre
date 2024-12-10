// Função para validar campos do formulário
function validarCadastro() {
    let formValid = true;
    let errorMessages = []; // Lista de erros

    const campos = [
        { id: 'nome', message: 'O campo Nome Completo é obrigatório.' },
        { id: 'email', message: 'O campo Endereço de E-mail é obrigatório.' },
        { id: 'nome_cracha', message: 'O campo Nome para Crachá é obrigatório.' },
        { id: 'data_nascimento', message: 'O campo Data de Nascimento é obrigatório.' },
        { id: 'cpf', message: 'O campo CPF é obrigatório.' },
        { id: 'rg', message: 'O campo RG é obrigatório.' },
        { id: 'endereco', message: 'O campo Endereço é obrigatório.' },
        { id: 'municipio', message: 'O campo Município é obrigatório.' },
        { id: 'celular', message: 'O campo Celular é obrigatório.' },
        { id: 'profissao', message: 'O campo Profissão é obrigatório.' },
        { id: 'empresa', message: 'O campo Empresa que trabalha é obrigatório.' },
    ];

    // Função para mostrar o campo de habilidades (sempre aberto)
    function toggleHabilidades() {
        const habilidadesField = document.getElementById('quaisHabilidades');
        habilidadesField.style.display = 'block'; // Sempre mostra o campo de habilidades
    }

    // Função para adicionar ou remover a classe de erro
    function setError(inputElement, message) {
        let errorMessage = inputElement.nextElementSibling;
        inputElement.classList.add('is-invalid');
        errorMessage.textContent = message;
        formValid = false;
        errorMessages.push(message); // Adiciona a mensagem de erro à lista
    }

    // Limpar erros de campos
    function clearError(inputElement) {
        inputElement.classList.remove('is-invalid');
        let errorMessage = inputElement.nextElementSibling;
        errorMessage.textContent = '';
    }

    // Validar cada campo
    campos.forEach(campo => {
        let input = document.getElementById(campo.id);
        if (input && input.value === "") {
            setError(input, campo.message);
        } else {
            clearError(input);
        }
    });


    // Alternar a exibição do campo de habilidades logo que a página for carregada
    toggleHabilidades();

    // Alternar o campo de habilidades ao clicar nas opções de rádio
    document.querySelectorAll('input[name="compartilhar_habilidades"]').forEach(input => {
        input.addEventListener('change', toggleHabilidades);
    });

    return { formValid, errorMessages }; // Retorna a validade e as mensagens de erro
}

// Função de exibição de erro após o envio do formulário
function exibirErros(erros) {
    let errorContainer = document.getElementById('errorContainer');
    if (!errorContainer) {
        errorContainer = document.createElement('div');
        errorContainer.id = 'errorContainer';
        errorContainer.classList.add('alert', 'alert-danger');
        document.querySelector('main').insertBefore(errorContainer, document.querySelector('form'));
    }
    errorContainer.innerHTML = ''; // Limpa erros anteriores
    erros.forEach(erro => {
        let div = document.createElement('div');
        div.textContent = erro;
        errorContainer.appendChild(div);
    });
}

// Função de exibição de sucesso após cadastro
function exibirSucesso() {
    alert('Cadastro realizado com sucesso!');
}

// Configurar o botão "Aceitar Termos"
document.getElementById('aceitarTermos').addEventListener('click', function () {
    const form = document.getElementById('formCadastro');
    const { formValid, errorMessages } = validarCadastro();

    // Se o formulário não for válido
    if (!formValid) {
        // Exibe os erros na página
        exibirErros(errorMessages);
        return; // Não faz mais nada, retorna aqui
    }

    // Se o formulário for válido
    exibirSucesso(); // Exibe a mensagem de sucesso

    // Fechar o modal dos termos
    const modalElement = document.getElementById('modalTermos');
    const modal = bootstrap.Modal.getInstance(modalElement);
    if (modal) modal.hide();

    // Marcar que os termos foram aceitos
    localStorage.setItem('termosAceitos', 'true'); // Armazenar que os termos foram aceitos

    // Atrasar a submissão do formulário para garantir que o alerta seja exibido primeiro
    setTimeout(function () {
        form.submit();  // Submete o formulário
        // Redirecionar para a página inicial após o envio do formulário
        setTimeout(function () {
            window.location.href = 'index.php';  // Redireciona para index.php após o alerta
        }, 1000);  // Redireciona 1 segundo depois da submissão do formulário
    }, 500);  // Delay de 500ms para garantir que o alerta seja exibido antes
});

// Validação do formulário antes do envio
document.getElementById('formCadastro').addEventListener('submit', function (event) {
    event.preventDefault(); // Impede o envio imediato do formulário

    const { formValid, errorMessages } = validarCadastro();

    if (!formValid) {
        exibirErros(errorMessages); // Exibe os erros se o formulário não for válido
    } else {
        const modalElement = document.getElementById('modalTermos');
        const modal = new bootstrap.Modal(modalElement);
        modal.show(); // Exibe o modal de termos
    }
});

// Garantir que o campo de habilidades seja mostrado ou escondido corretamente ao carregar a página
window.addEventListener('load', function () {
    toggleHabilidades(); // Sempre exibe o campo de habilidades
});

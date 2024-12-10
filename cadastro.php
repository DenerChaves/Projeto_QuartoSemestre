<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/styles.css">
    <title>Impactação - Cadastro</title>
</head>

<body class="bg-light-gray">

    <!-- Cabeçalho -->
    <header class="text-white custom-header">
        <nav class="navbar navbar-expand-lg navbar-dark">
            <div class="container container-header">
                <a href="index.php" class="navbar-brand">
                    <img src="img/logo.png" alt="Logo Impactação" class="logo-header">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="voluntario.php">Seja Voluntário</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <!-- Formulário de Cadastro -->
    <main class="container my-5">
        <h2 class="text-center mb-4">Cadastro de Voluntário</h2>
        <form action="processar_cadastro.php" method="POST" id="formCadastro" novalidate>
            <!-- Campos do formulário -->
            <div class="main-content-cadastro">
                <div class="mb-3">
                    <label for="nome" class="form-label">Nome Completo</label>
                    <input type="text" class="form-control" id="nome" name="nome" required>
                    <div class="invalid-feedback">Por favor, insira seu nome completo.</div>
                </div>
                <div class="form-group">
                    <label for="email">E-mail:</label>
                    <input type="email" id="email" name="email" class="form-control">
                    <div class="invalid-feedback">
                        Por favor, insira um endereço de e-mail válido.
                    </div>
                </div>
                <div class="mb-3">
                    <label for="nome_cracha" class="form-label">Nome para Crachá</label>
                    <input type="text" class="form-control" id="nome_cracha" name="nome_cracha" required>
                    <div class="invalid-feedback">Por favor, insira o nome para o crachá.</div>
                </div>
                <div class="mb-3">
                    <label for="data_nascimento" class="form-label">Data de Nascimento</label>
                    <input type="date" class="form-control" id="data_nascimento" name="data_nascimento" required
                        min="1900-01-01" max="2100-12-31">
                    <div class="invalid-feedback">Por favor, insira uma data de nascimento válida.</div>
                </div>

                <div class="mb-3">
                    <label for="cpf" class="form-label">CPF</label>
                    <input type="text" class="form-control" id="cpf" name="cpf" required
                        pattern="\d{11}" maxlength="11" placeholder="Ex: 12345678901"
                        inputmode="numeric" oninput="this.value = this.value.replace(/\D/g, '')">
                    <div class="invalid-feedback">Por favor, insira um CPF válido com 11 números.</div>
                </div>
                <div class="mb-3">
                    <label for="rg" class="form-label">RG</label>
                    <input type="text" class="form-control" id="rg" name="rg" required
                        pattern="\d+" maxlength="20" placeholder="Ex: 12345678"
                        inputmode="numeric" oninput="this.value = this.value.replace(/\D/g, '')">
                    <div class="invalid-feedback">Por favor, insira o número do RG (somente números).</div>
                </div>
                <div class="mb-3">
                    <label for="endereco" class="form-label">Endereço</label>
                    <input type="text" class="form-control" id="endereco" name="endereco" required>
                    <div class="invalid-feedback">Por favor, insira seu endereço.</div>
                </div>
                <div class="mb-3">
                    <label for="municipio" class="form-label">Município</label>
                    <input type="text" class="form-control" id="municipio" name="municipio" required>
                    <div class="invalid-feedback">Por favor, insira o município.</div>
                </div>
                <div class="mb-3">
                    <label for="celular" class="form-label">Celular (WhatsApp)</label>
                    <input type="tel" class="form-control" id="celular" name="celular" required
                        pattern="\d{11}" maxlength="11" placeholder="Ex: 11987654321"
                        inputmode="numeric" oninput="this.value = this.value.replace(/\D/g, '')">
                    <div class="invalid-feedback">Por favor, insira um número de celular válido (DDD+Número, sem traço e sem espaços).</div>
                </div>
                <div class="mb-3">
                    <label for="profissao" class="form-label">Profissão</label>
                    <input type="text" class="form-control" id="profissao" name="profissao" required>
                    <div class="invalid-feedback">Por favor, insira sua profissão.</div>
                </div>
                <div class="mb-3">
                    <label for="empresa" class="form-label">Empresa que Trabalha</label>
                    <input type="text" class="form-control" id="empresa" name="empresa" required>
                    <div class="invalid-feedback">Por favor, insira o nome da empresa onde trabalha.</div>
                </div>
                <div class="mb-3">
                    <label class="form-label">Gostaria de compartilhar alguma habilidade?</label>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="compartilhar_habilidades" id="sim" value="sim">
                        <label class="form-check-label" for="sim">Sim</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="compartilhar_habilidades" id="nao" value="nao">
                        <label class="form-check-label" for="nao">Não</label>
                    </div>
                </div>

                <div id="quaisHabilidades" style="display:none;">
                    <label for="habilidade_adicional" class="form-label">Quais Habilidades?</label>
                    <input type="text" class="form-control" id="habilidade_adicional" name="habilidade_adicional" placeholder="Descreva suas habilidades adicionais" required>
                </div>
                <button type="submit" class="btn btn-danger mt-3" id="btnCadastrar" data-bs-toggle="modal" data-bs-target="#modalTermos">Cadastrar</button>
            </div>
        </form>
    </main>

    <!-- Modal de Termos e Condições -->
    <div class="modal fade" id="modalTermos" tabindex="-1" aria-labelledby="modalTermosLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalTermosLabel">Termos de Aceite</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
                </div>
                <div class="modal-body">
                    <p><strong>TERMO DE VOLUNTARIADO E CESSÃO DE DIREITOS AUTORAIS, CONEXOS E DE IMAGEM</strong></p>
                    <p>1. Finalidade do Voluntariado: O voluntariado é um ato livre e espontâneo, realizado sem qualquer vínculo empregatício, financeiro ou contratual.</p>
                    <p>2. Responsabilidades do Voluntário: O voluntário compromete-se a agir com ética, responsabilidade e respeito às normas estabelecidas pelo Impactação Social.</p>
                    <p>3. Cessão de Direitos Autorais: O voluntário cede, de forma irrevogável e irretratável, todos os direitos autorais relativos a materiais, conteúdos e criações desenvolvidas no âmbito das atividades voluntárias.</p>
                    <p>4. Uso de Imagem: O voluntário autoriza o uso de sua imagem em materiais promocionais, publicitários e institucionais, sem qualquer ônus para o Impactação Social.</p>
                    <p>5. Confidencialidade: O voluntário compromete-se a manter sigilo sobre informações confidenciais a que tiver acesso durante suas atividades.</p>
                    <p>6. Rescisão: Este termo pode ser rescindido a qualquer momento por qualquer das partes, mediante comunicação prévia.</p>
                    <p>Declaro que li e aceito as condições acima.</p>
                    <!-- Coloque seus termos aqui -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-danger" id="aceitarTermos">Aceitar e Cadastrar</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Obtém os elementos do rádio e o campo de habilidades
        const simRadio = document.getElementById('sim');
        const naoRadio = document.getElementById('nao');
        const habilidadesDiv = document.getElementById('quaisHabilidades');

        // Função para alternar a visibilidade do campo de habilidades
        function toggleHabilidades() {
            if (simRadio.checked) {
                habilidadesDiv.style.display = 'block'; // Exibe o campo
            } else {
                habilidadesDiv.style.display = 'none'; // Oculta o campo
            }
        }

        // Inicializa o estado do campo de habilidades baseado na seleção
        simRadio.addEventListener('change', toggleHabilidades);
        naoRadio.addEventListener('change', toggleHabilidades);

        // Chama a função para definir a visibilidade corretamente ao carregar a página
        toggleHabilidades();
    </script>
    <!-- Rodapé -->
    <footer class="footer-custom bg-dark text-white text-center">
        &copy; 2024 Impactação. Todos os direitos reservados.
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/scripts.js"></script>
</body>

</html>
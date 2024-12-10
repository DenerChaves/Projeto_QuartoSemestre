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
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="voluntario.php">Seja Voluntário</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>

    <!-- Formulário de Cadastro -->
    <main class="container my-5">
        <h2 class="text-center mb-4">Cadastro de Voluntário</h2>
        <style>
        .terms-footer {
            background-color: #f8f9fa;
            padding: 20px;
            border-top: 1px solid #e9ecef;
            text-align: center;
        }
        .terms-footer p {
            margin-bottom: 10px;
        }
        .terms-footer button {
            cursor: pointer;
        }

        .modal-content {
            padding: 30px; /* Maior espaçamento nas bordas */
            border-radius: 10px; /* Deixar os cantos mais suaves */
        }

        .terms-content h2 {
            margin-bottom: 20px; /* Espaçamento entre o título e o conteúdo */
        }

        .terms-content h3 {
            margin-top: 20px; /* Espaçamento antes dos subtítulos */
            margin-bottom: 10px; /* Espaçamento após os subtítulos */
        }

        .terms-content p {
            margin-bottom: 15px; /* Mais espaço entre os parágrafos */
            line-height: 1.6; /* Melhor espaçamento entre linhas */
        }

        .terms-content ul {
            margin-bottom: 15px;
        }

        .modal-body {
            max-height: 70vh; /* Limitar altura do modal */
            overflow-y: auto; /* Permitir rolagem se necessário */
        }
    </style>
        <form action="processar_cadastro.php" method="POST" id="formCadastro">
            <div class="mb-3">
                <label for="nome" class="form-label">Nome Completo</label>
                <input type="text" class="form-control" id="nome" name="nome" required>
                <div class="invalid-feedback">Por favor, insira seu nome completo.</div>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Endereço de E-mail</label>
                <input type="email" class="form-control" id="email" name="email" required>
                <div class="invalid-feedback">Por favor, insira um e-mail válido.</div>
            </div>
            <div class="mb-3">
                <label for="nome_cracha" class="form-label">Nome para Crachá</label>
                <input type="text" class="form-control" id="nome_cracha" name="nome_cracha" required>
                <div class="invalid-feedback">Por favor, insira o nome para o crachá.</div>
            </div>
            <div class="mb-3">
                <label for="data_nascimento" class="form-label">Data de Nascimento</label>
                <input type="date" class="form-control" id="data_nascimento" name="data_nascimento" required>
                <div class="invalid-feedback">Por favor, insira sua data de nascimento.</div>
            </div>
            <div class="mb-3">
                <label for="cpf" class="form-label">CPF</label>
                <input type="text" class="form-control" id="cpf" name="cpf" required>
                <div class="invalid-feedback">Por favor, insira um CPF válido.</div>
            </div>
            <div class="mb-3">
                <label for="rg" class="form-label">RG</label>
                <input type="text" class="form-control" id="rg" name="rg" required>
                <div class="invalid-feedback">Por favor, insira o número do RG.</div>
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
                <input type="text" class="form-control" id="celular" name="celular" required>
                <div class="invalid-feedback">Por favor, insira um número de celular válido.</div>
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
                <div id="quaisHabilidades" style="display:none;">
                    <label for="habilidade_adicional" class="form-label">Quais Habilidades?</label>
                    <input type="text" class="form-control" id="habilidade_adicional" name="habilidade_adicional">
                </div>
            </div>
            <button type="submit" class="btn btn-danger" disabled>Cadastrar</button>
        </form>
    </main>

    <!-- Rodapé -->
    <footer class="footer-custom bg-dark text-white text-center">
        &copy; 2024 Impactação. Todos os direitos reservados.
    </footer>

    <div class="terms-footer">
        <p>
            Eu li e aceito os <a href="#" data-bs-toggle="modal" data-bs-target="#modalTermos">Termos e Condições</a>.
        </p>
        <input type="checkbox" id="acceptTerms" />
        <label for="acceptTerms">Aceito os termos</label>
    </div>

    <!-- Modal com os Termos -->
    <div class="modal fade" id="modalTermos" tabindex="-1" aria-labelledby="modalTermosLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalTermosLabel">Termos e Condições</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body terms-content">
                <h2>TERMO DE VOLUNTARIADO E CESSÃO DE DIREITOS AUTORAIS, CONEXOS E DE IMAGEM</h2>
                    <p>Pelo presente instrumento, declaro que assumo os seguintes compromissos junto ao <strong>Impactação Social</strong>:</p>

                    <h3>1. Voluntariado</h3>
                    <p>Comprometo-me a prestar serviços no <strong>Impactação Social</strong>, na qualidade de voluntário(a), ciente de que o serviço não será remunerado, nem gerará qualquer vínculo empregatício ou obrigação trabalhista ou previdenciária, tendo em vista seu caráter filantrópico.</p>

                    <p>O <strong>Impactação Social</strong> declara que cumpre toda a legislação aplicável sobre a privacidade e proteção de dados, inclusive a <strong>Lei Geral de Proteção de Dados (Lei Federal n. 13.709/2018)</strong>, comprometendo-se a tratar os dados pessoais coletados exclusivamente para a execução deste termo, nos estritos limites e finalidades previstos em lei.</p>

                    <p>Declaro estar ciente de que os dados pessoais tratados em razão deste instrumento, mesmo após o encerramento da relação de voluntariado, poderão ser retidos pelo <strong>Impactação Social</strong> para o cumprimento de obrigações legais ou regulatórias e para resguardar seus direitos em eventual ação judicial ou procedimento administrativo, respeitando os prazos prescricionais da legislação vigente, assegurada a privacidade dos meus dados pessoais.</p>

                    <p>Este termo tem validade de <strong>1 (um) ano</strong>, sendo renovado automaticamente ao término do prazo, salvo em caso de desligamento por solicitação própria ou decisão do <strong>Impactação Social</strong>.</p>

                    <h3>2. Cessão de Direitos Autorais, Conexos e de Imagem</h3>
                    <p><strong>AUTORIZO</strong>, em caráter de colaboração pessoal e espontânea, ao <strong>Impactação Social</strong>, os direitos autorais e os de imagem, exibição, transmissão, reprodução e divulgação decorrentes da minha participação em materiais institucionais e de divulgação, sem finalidade comercial.</p>

                    <p>A presente autorização é concedida a título gratuito, abrangendo o uso da minha imagem e dos direitos mencionados em território nacional e no exterior, em todas as modalidades, com destaque para:</p>
                    <ul>
                        <li>Redes sociais;</li>
                        <li>Mídias diversas;</li>
                        <li>TV e outros meios de divulgação em geral.</li>
                    </ul>

                    <p>Declaro que esta autorização reflete a minha vontade, não havendo qualquer reclamação futura relacionada a direitos conexos ou outros sobre o uso descrito acima.</p>

                    <p>A cessão de direitos tem validade de <strong>1 (um) ano</strong>, sendo renovada automaticamente ao término do prazo, salvo em caso de desligamento do quadro de voluntariado por solicitação própria ou decisão do <strong>Impactação Social</strong>.</p>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.getElementById("acceptTerms").addEventListener("change", function() {
            const submitButton = document.querySelector('button[type="submit"]');
            submitButton.disabled = !this.checked;
        });

        document.getElementById("sim").addEventListener("change", function() {
            if (this.checked) {
                document.getElementById("quaisHabilidades").style.display = "block";
            }
        });

        document.getElementById("nao").addEventListener("change", function() {
            if (this.checked) {
                document.getElementById("quaisHabilidades").style.display = "none";
            }
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
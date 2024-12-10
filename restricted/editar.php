<?php
session_start();

// Conectar ao banco de dados
$mysqli = new mysqli("108.167.151.95", "impa5212_usuario_cpanel", "usuario_cpanel@123", "impa5212_cadastro");

if ($mysqli->connect_error) {
    die("Erro ao conectar: " . $mysqli->connect_error);
}

// Verificar se o ID foi passado na URL
$id_voluntario = isset($_GET['id_voluntario']) ? (int) $_GET['id_voluntario'] : 0;
$erro = ''; // Variável para armazenar a mensagem de erro
$voluntario = null;

if ($id_voluntario > 0) {
    // Consultar os dados do voluntário
    $sql = "SELECT * FROM voluntarios WHERE id_voluntario = ?";
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param("i", $id_voluntario);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $voluntario = $result->fetch_assoc();
    } else {
        $erro = "Voluntário não encontrado.";  // Definir a mensagem de erro
    }
} else {
    $erro = "ID inválido.";  // Caso o ID não seja válido
}

// Atualizar os dados após o envio do formulário
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $nome_cracha = $_POST['nome_cracha'];
    $data_nascimento = $_POST['data_nascimento'];
    $cpf = $_POST['cpf'];
    $rg = $_POST['rg'];
    $endereco = $_POST['endereco'];
    $municipio = $_POST['municipio'];
    $celular = $_POST['celular'];
    $profissao = $_POST['profissao'];
    $empresa = $_POST['empresa'];
    $compartilhar_habilidade = $_POST['compartilhar_habilidade'];
    $qual_habilidade = $_POST['qual_habilidade'];
    $status_colete = $_POST['status_colete'];
    $status_voluntario = $_POST['status_voluntario'];

    // Atualizar os dados no banco
    $update_sql = "UPDATE voluntarios SET nome = ?, email = ?, nome_cracha = ?, data_nascimento = ?, cpf = ?, rg = ?, endereco = ?, municipio = ?, celular = ?, profissao = ?, empresa = ?, compartilhar_habilidade = ?, qual_habilidade = ?, status_colete = ?, status_voluntario = ? WHERE id_voluntario = ?";
    $update_stmt = $mysqli->prepare($update_sql);
    $update_stmt->bind_param("sssssssssssssssi", $nome, $email, $nome_cracha, $data_nascimento, $cpf, $rg, $endereco, $municipio, $celular, $profissao, $empresa, $compartilhar_habilidade, $qual_habilidade, $status_colete, $status_voluntario, $id_voluntario);

    if ($update_stmt->execute()) {
        header("Location: visualizar_cadastros.php"); // Redirecionar para a lista de cadastros
        exit;
    } else {
        echo "Erro ao atualizar: " . $update_stmt->error;
    }
}

$mysqli->close();
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../css/styles.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Editar Voluntário</title>
</head>
<body class="bg-light-gray">
    <header class="custom-header">
        <div class="container d-flex justify-content-between align-items-center py-3">
            <img src="../img/logo.png" alt="Logo Impactação" class="logo-header" style="width: 100px;">
            <h1 class="h3 text-white">Editar Voluntário</h1>
            <nav class="nav">
                <a class="nav-link text-white" href="../index.php">Home</a>
                <a class="nav-link text-white" href="../voluntario.php">Seja Voluntário</a>
            </nav>
        </div>
    </header>

    <!-- Exibição de Erros -->
    <?php if ($erro): ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Erro:</strong> <?php echo $erro; ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>

    <main class="container my-5">
        <h2 class="text-center mb-4">Edição de Cadastro</h2>

        <form action="editar.php?id_voluntario=<?php echo $voluntario['id_voluntario']; ?>" method="POST">
            <div class="mb-3">
                <label for="nome" class="form-label">Nome Completo</label>
                <input type="text" class="form-control" id="nome" name="nome" value="<?php echo htmlspecialchars($voluntario['nome']); ?>" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">E-mail</label>
                <input type="email" class="form-control" id="email" name="email" value="<?php echo htmlspecialchars($voluntario['email']); ?>" required>
            </div>
            <div class="mb-3">
                <label for="nome_cracha" class="form-label">Nome para Crachá</label>
                <input type="text" class="form-control" id="nome_cracha" name="nome_cracha" value="<?php echo htmlspecialchars($voluntario['nome_cracha']); ?>" required>
            </div>
            <div class="mb-3">
                <label for="data_nascimento" class="form-label">Data de Nascimento</label>
                <input type="date" class="form-control" id="data_nascimento" name="data_nascimento" value="<?php echo htmlspecialchars($voluntario['data_nascimento']); ?>" required>
            </div>
            <div class="mb-3">
                <label for="cpf" class="form-label">CPF</label>
                <input type="text" class="form-control" id="cpf" name="cpf" value="<?php echo htmlspecialchars($voluntario['cpf']); ?>" required>
            </div>
            <div class="mb-3">
                <label for="rg" class="form-label">RG</label>
                <input type="text" class="form-control" id="rg" name="rg" value="<?php echo htmlspecialchars($voluntario['rg']); ?>" required>
            </div>
            <div class="mb-3">
                <label for="endereco" class="form-label">Endereço</label>
                <input type="text" class="form-control" id="endereco" name="endereco" value="<?php echo htmlspecialchars($voluntario['endereco']); ?>" required>
            </div>
            <div class="mb-3">
                <label for="municipio" class="form-label">Município</label>
                <input type="text" class="form-control" id="municipio" name="municipio" value="<?php echo htmlspecialchars($voluntario['municipio']); ?>" required>
            </div>
            <div class="mb-3">
                <label for="celular" class="form-label">Celular</label>
                <input type="text" class="form-control" id="celular" name="celular" value="<?php echo htmlspecialchars($voluntario['celular']); ?>" required>
            </div>
            <div class="mb-3">
                <label for="profissao" class="form-label">Profissão</label>
                <input type="text" class="form-control" id="profissao" name="profissao" value="<?php echo htmlspecialchars($voluntario['profissao']); ?>" required>
            </div>
            <div class="mb-3">
                <label for="empresa" class="form-label">Empresa</label>
                <input type="text" class="form-control" id="empresa" name="empresa" value="<?php echo htmlspecialchars($voluntario['empresa']); ?>" required>
            </div>
            <div class="mb-3">
                <label for="compartilhar_habilidade" class="form-label">Compartilhar Habilidade</label>
                <input type="text" class="form-control" id="compartilhar_habilidade" name="compartilhar_habilidade" value="<?php echo htmlspecialchars($voluntario['compartilhar_habilidade']); ?>" required>
            </div>
            <div class="mb-3">
                <label for="qual_habilidade" class="form-label">Qual Habilidade</label>
                <input type="text" class="form-control" id="qual_habilidade" name="qual_habilidade" value="<?php echo htmlspecialchars($voluntario['qual_habilidade']); ?>">
            </div>
            <div class="mb-3">
                <label for="status_colete" class="form-label">Status do Colete</label>
                <select class="form-select" id="status_colete" name="status_colete" required>
                    <option value="" <?php echo $voluntario['status_colete'] == '' ? 'selected' : ''; ?>></option>
                    <option value="Ok" <?php echo $voluntario['status_colete'] == 'Ok' ? 'selected' : ''; ?>>Ok</option>
                    <option value="Devolvido" <?php echo $voluntario['status_colete'] == 'Devolvido' ? 'selected' : ''; ?>>Devolvido</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="status_voluntario" class="form-label">Status do Voluntário</label>
                <select class="form-select" id="status_voluntario" name="status_voluntario" required>
                    <option value="ativo" <?php echo $voluntario['status_voluntario'] == 'ativo' ? 'selected' : ''; ?>>Ativo</option>
                    <option value="inativo" <?php echo $voluntario['status_voluntario'] == 'inativo' ? 'selected' : ''; ?>>Inativo</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Salvar Alterações</button>
        </form>
    </main>
</body>
</html>

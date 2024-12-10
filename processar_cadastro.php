<?php

// Conectar ao banco de dados
$mysqli = new mysqli("108.167.151.95", "impa5212_usuario_cpanel", "usuario_cpanel@123", "impa5212_cadastro");

// Verificar a conexão
if ($mysqli->connect_error) {
    die("Conexão falhou: " . $mysqli->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Validar e tratar dados
    $nome = isset($_POST['nome']) ? $_POST['nome'] : '';
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $nome_cracha = isset($_POST['nome_cracha']) ? $_POST['nome_cracha'] : '';
    $data_nascimento = isset($_POST['data_nascimento']) ? $_POST['data_nascimento'] : '';
    $cpf = isset($_POST['cpf']) ? $_POST['cpf'] : '';
    $rg = isset($_POST['rg']) ? $_POST['rg'] : '';
    $endereco = isset($_POST['endereco']) ? $_POST['endereco'] : '';
    $municipio = isset($_POST['municipio']) ? $_POST['municipio'] : '';
    $celular = isset($_POST['celular']) ? $_POST['celular'] : '';
    $profissao = isset($_POST['profissao']) ? $_POST['profissao'] : '';
    $empresa = isset($_POST['empresa']) ? $_POST['empresa'] : '';
    $compartilhar_habilidades = isset($_POST['compartilhar_habilidades']) ? $_POST['compartilhar_habilidades'] : '';
    $habilidade_adicional = isset($_POST['habilidade_adicional']) ? $_POST['habilidade_adicional'] : '';

    // Sanitizar e validar os dados (por exemplo, validar e-mail)
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "E-mail inválido!";
        exit;
    }

    // Preparar a declaração SQL para inserir voluntário
    $stmt = $mysqli->prepare("INSERT INTO voluntarios (nome, email, nome_cracha, data_nascimento, cpf, rg, endereco, municipio, celular, profissao, empresa, compartilhar_habilidade, qual_habilidade) 
                              VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

    if ($stmt === false) {
        die('Erro na preparação da declaração: ' . $mysqli->error);
    }

    // Associar os parâmetros
    $stmt->bind_param("sssssssssssss", $nome, $email, $nome_cracha, $data_nascimento, $cpf, $rg, $endereco, $municipio, $celular, $profissao, $empresa, $compartilhar_habilidades, $habilidade_adicional);

    // Executar a inserção
    if ($stmt->execute()) {
        // Pegar o ID do voluntário recém-criado
        $voluntario_id = $stmt->insert_id;

        // Inserir um termo relacionado ao voluntário
        $termo_stmt = $mysqli->prepare("INSERT INTO termo (id_voluntario, inicio_vigencia, fim_vigencia) 
                                        VALUES (?, NOW(), DATE_ADD(NOW(), INTERVAL 1 YEAR))");
        
        if ($termo_stmt === false) {
            die('Erro na preparação da declaração de termo: ' . $mysqli->error);
        }

        // Associar o ID do voluntário ao termo
        $termo_stmt->bind_param("i", $voluntario_id);

        // Executar a inserção do termo
        if (!$termo_stmt->execute()) {
            echo "Erro ao inserir termo: " . $termo_stmt->error;
        }

        $termo_stmt->close();

        // Redirecionar após sucesso
        header("Location: https://impactacaosocial.com.br/voluntario.php");
        exit;
    } else {
        echo "Erro ao inserir dados: " . $stmt->error;
    }

    // Fechar a declaração e a conexão
    $stmt->close();
    $mysqli->close();
}

?>

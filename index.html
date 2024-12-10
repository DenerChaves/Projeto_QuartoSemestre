<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/styles.css">
    <title>Impactação - Página Inicial</title>
</head>

<body class="bg-custom">
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

    <main class="container main-content">
        <div class="row my-5">
            <div class="col-md-6">
                <h2 class="display-4">Junte-se à Impactação Social</h2>
                <p class="lead">Nós acreditamos que pequenas ações podem gerar grandes impactos. Junte-se a nós e ajude centenas de famílias necessitadas. A sua contribuição como voluntário faz toda a diferença!</p>
                <div class="text-end">
                    <a href="voluntario.php" class="btn btn-danger btn-lg">Seja Voluntário</a>
                </div>
            </div>
            <div class="col-md-6">
                <img src="img/voluntarios.jpg" class="img-fluid img-voluntarios" alt="Imagem de Voluntários">
            </div>
        </div>
    </main>

    <footer class="footer-custom bg-dark text-white text-center">
        &copy; 2024 Impactação. Todos os direitos reservados.
        <div class="footer-image">
            <a href="restricted/visualizar_cadastros.php">
                <img src="img/minilogo.png" alt="Mini logo" class="mini-logo">
            </a>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>

<?php
if (date("d") == 6) {
    require("PHPMailer-master/src/PHPMailer.php");
    require("PHPMailer-master/src/SMTP.php");


    $mysqli = new mysqli("108.167.151.95", "impa5212_usuario_cpanel", "usuario_cpanel@123", "impa5212_cadastro");


    if ($mysqli->connect_error) {
        die("Falha na conexão: " . $mysqli->connect_error);
    }

    // Data atual
    $dataAtual = date("Y-m-d");

    $sql = "
            SELECT termo.id_termo, termo.fim_vigencia, termo.id_voluntario, voluntarios.nome
            FROM termo
            JOIN voluntarios ON termo.id_voluntario = voluntarios.id_voluntario
            WHERE termo.fim_vigencia < ?
        ";


    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param("s", $dataAtual);
    $stmt->execute();
    $result = $stmt->get_result();


    if ($result->num_rows > 0) {

        while ($row = $result->fetch_assoc()) {
            $idVoluntario = $row['id_voluntario'];
            $nomeVoluntario = $row['nome'];
            $fimVigencia = $row['fim_vigencia'];


            $mail = new PHPMailer\PHPMailer\PHPMailer();
            $mail->IsSMTP(); // Habilitar SMTP
            $mail->SMTPDebug = 0; // Desativar debug
            $mail->SMTPAuth = true; // Habilitar autenticação SMTP
            $mail->SMTPSecure = 'ssl'; // Usar SSL
            $mail->Host = "smtp.titan.email"; // Servidor SMTP do Titan
            $mail->Port = 465; // Porta para SSL
            $mail->IsHTML(true); // Habilitar envio de e-mail em HTML


            $mail->Username = "admimpacta@impactacaosocial.com.br";
            $mail->Password = "Impactacaosocial@123";
            $mail->SetFrom("admimpacta@impactacaosocial.com.br");


            $mail->Subject = "Aviso: Vencimento do Termo de Voluntariado - $nomeVoluntario (ID: $idVoluntario)";

            $dataFormatada = date("d/m/Y", strtotime($fimVigencia));
            $mail->Body = "
                    <p>Prezado(a) Administrador(a),</p>
                    <p>O sistema informa que o termo de voluntariado de <strong>$nomeVoluntario</strong> (ID: $idVoluntario) venceu em <strong>$dataFormatada</strong>.</p>
                    <p>Recomendamos enviar um lembrete com as instruções para acesso à plataforma e assinatura digital do novo termo.</p>
                    <p>Caso precise de suporte ou tenha dúvidas, estamos à disposição.</p>
                    <p>Atenciosamente,<br>[Nome do Sistema]</p>
                ";

            // Adicionar destinatário
            $mail->AddAddress("denermichel@uni9.edu.br"); // E-mail do administrador


            if (!$mail->Send()) {
                echo "Erro ao enviar o e-mail: " . $mail->ErrorInfo . "<br>";
            } else {
                echo "E-mail enviado com sucesso para o voluntário: $nomeVoluntario (ID: $idVoluntario).<br>";
            }
        }
    } else {
        echo "Nenhum termo com vigência expirada foi encontrado.<br>";
    }


    $stmt->close();
    $mysqli->close();
}
?>

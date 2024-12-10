<?php
session_start();

// Conexão com o banco de dados
$mysqli = new mysqli("108.167.151.95", "impa5212_usuario_cpanel", "usuario_cpanel@123", "impa5212_cadastro");

if ($mysqli->connect_error) {
    die("Erro ao conectar: " . $mysqli->connect_error);
}

$sql = "SELECT * FROM voluntarios";
$result = $mysqli->query($sql);
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../css/styles.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Impactação - Visualizar Cadastros</title>

    <!-- Link para a biblioteca SheetJS -->
    <script src="https://cdn.jsdelivr.net/npm/xlsx@0.17.2/dist/xlsx.full.min.js"></script>

    <!-- Link para a biblioteca FileSaver.js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/FileSaver.js/2.0.5/FileSaver.min.js"></script>
    <style>
        /* Definindo as cores para as linhas */
        .linha-ativa {
            background-color: #d4edda;
        }

        .linha-inativa {
            background-color: #f8d7da; 
        }
    </style>
</head>

<body class="bg-light-gray">
    <header class="custom-header">
        <div class="container d-flex justify-content-between align-items-center py-3">
            <img src="../img/logo.png" alt="Logo Impactação" class="logo-header" style="width: 100px;">
            <h1 class="h3 text-white">PÁGINA ADMINISTRATIVA</h1>
            <nav class="nav">
                <a class="nav-link text-white" href="../index.php">Home</a>
                <a class="nav-link text-white" href="../voluntario.php">Seja Voluntário</a>
            </nav>
        </div>
    </header>
    
    <main class="container my-5">
        <h2 class="text-center mb-4">Visualização dos Cadastros</h2>

        <!-- Botão para Exportar em Excel -->
        <div class="mb-3 text-end">
            <button class="btn btn-success" onclick="exportTableToExcel('cadastroTable', 'cadastros')">Exportar para Excel</button>
        </div>

        <div class="table-responsive">
            <table id="cadastroTable" class="table table-hover table-bordered">
                <thead class="bg-secondary text-white text-center">
                    <tr>
                        <th>ID</th>
                        <th>Nome Completo</th>
                        <th>E-mail</th>
                        <th>Nome para Crachá</th>
                        <th>Data de Nascimento</th>
                        <th>CPF</th>
                        <th>RG</th>
                        <th>Endereço</th>
                        <th>Município</th>
                        <th>Celular</th>
                        <th>Profissão</th>
                        <th>Empresa</th>
                        <th>Compartilhar Habilidades</th>
                        <th>Habilidade Adicional</th>
                        <th>Status do Colete</th>
                        <th>Status Voluntário</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            // Determinar a classe da linha com base no status do voluntário
                            $linha_class = '';
                            if ($row['status_voluntario'] == 'Ativo') {
                                $linha_class = 'linha-ativa';
                            } elseif ($row['status_voluntario'] == 'Inativo') {
                                $linha_class = 'linha-inativa';
                            }
                            
                            // Converter e exibir a data de nascimento no formato dd-mm-aaaa
                            $data_nascimento = new DateTime($row['data_nascimento']);
                            $data_formatada = $data_nascimento->format('d-m-Y');
                            
                            echo "<tr class='$linha_class'>
                                <td>" . htmlspecialchars($row['id_voluntario']) . "</td>
                                <td>" . htmlspecialchars($row['nome']) . "</td>
                                <td>" . htmlspecialchars($row['email']) . "</td>
                                <td>" . htmlspecialchars($row['nome_cracha']) . "</td>
                                <td>" . $data_formatada . "</td>
                                <td>" . htmlspecialchars($row['cpf']) . "</td>
                                <td>" . htmlspecialchars($row['rg']) . "</td>
                                <td>" . htmlspecialchars($row['endereco']) . "</td>
                                <td>" . htmlspecialchars($row['municipio']) . "</td>
                                <td>" . htmlspecialchars($row['celular']) . "</td>
                                <td>" . htmlspecialchars($row['profissao']) . "</td>
                                <td>" . htmlspecialchars($row['empresa']) . "</td>
                                <td>" . htmlspecialchars($row['compartilhar_habilidade']) . "</td>
                                <td>" . htmlspecialchars($row['qual_habilidade']) . "</td>
                                <td>" . htmlspecialchars($row['status_colete']) . "</td>
                                <td>" . htmlspecialchars($row['status_voluntario']) . "</td>
                            </tr>";
                        }
                    } else {
                        echo "<tr><td colspan='16' class='text-center'>Nenhum cadastro encontrado.</td></tr>";
                    }

                    $mysqli->close();
                    ?>
                </tbody>
            </table>

            <table id="cadastroTable" class="table table-hover table-bordered">
                <thead class="bg-secondary text-white text-center">
                    <td colspan="16">
                        <form action="editar.php" method="GET" style="display:inline;">
                            <input type="number" name="id_voluntario" placeholder="Digite o ID" required>
                            <button type="submit" class="btn btn-sm btn-warning">Editar</button>
                        </form>

                        <form action="deletar.php" method="POST" style="display:inline;">
                            <input type="number" name="id_voluntario" placeholder="Digite o ID" required>
                            <button type="submit" class="btn btn-sm btn-danger">Deletar</button>
                        </form>
                    </td>
                </thead>
            </table>
        </div>
    </main>

    <!-- Rodapé -->
    <footer class="footer-custom bg-dark text-white text-center">
        &copy; 2024 Impactação. Todos os direitos reservados.
    </footer>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Script para Exportar Tabela para Excel -->
    <script>
        function exportTableToExcel(tableId, filename = '') {
            var wb = XLSX.utils.table_to_book(document.getElementById(tableId), {
                sheet: "Sheet1"
            });
            var wbout = XLSX.write(wb, {
                bookType: 'xlsx',
                type: 'binary'
            });

            function s2ab(s) {
                var buf = new ArrayBuffer(s.length);
                var view = new Uint8Array(buf);
                for (var i = 0; i < s.length; i++) {
                    view[i] = s.charCodeAt(i) & 0xFF;
                }
                return buf;
            }

            var filename = filename ? filename + '.xlsx' : 'tabela.xlsx';
            saveAs(new Blob([s2ab(wbout)], {
                type: "application/octet-stream"
            }), filename);
        }
    </script>
</body>

</html>

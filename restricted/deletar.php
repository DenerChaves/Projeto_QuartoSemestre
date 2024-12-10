<?php
// Conectar ao banco
$mysqli = new mysqli("108.167.151.95", "impa5212_usuario_cpanel", "usuario_cpanel@123", "impa5212_cadastro");

// Obter o ID do registro
$id = isset($_POST['id_voluntario']) ? (int) $_POST['id_voluntario'] : 0;

// Verificar se o ID é válido
if ($id === 0) {
    echo "ID inválido.";
    exit();
}

// Excluir o registro
$sql = "DELETE FROM voluntarios WHERE id_voluntario = ?";
$stmt = $mysqli->prepare($sql);
$stmt->bind_param("i", $id);

if ($stmt->execute()) {
    header("Location: visualizar_cadastros.php");
} else {
    echo "Erro ao deletar: " . $stmt->error;
}

$mysqli->close();
?>

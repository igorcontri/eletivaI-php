<?php
require_once("conexao.php");

if (!isset($_GET['id'])) {
    header("Location: contratos.php?exclusao=false");
    exit;
}

$id = (int) $_GET['id'];

try {
    $sql = "DELETE FROM contratos_locacao WHERE id = ?";
    $stmt = $pdo->prepare($sql);
    if ($stmt->execute([$id])) {
        header("Location: contratos.php?exclusao=true");
    } else {
        header("Location: contratos.php?exclusao=false");
    }
} catch (Exception $e) {
    header("Location: contratos.php?exclusao=false");
}
?>

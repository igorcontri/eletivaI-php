<?php
require_once("conexao.php");

if (!isset($_GET['id'])) {
    header("Location: imoveis.php?exclusao=false");
    exit;
}

$id = (int) $_GET['id'];

try {
    $sql = "DELETE FROM imoveis WHERE id = ?";
    $stmt = $pdo->prepare($sql);
    if ($stmt->execute([$id])) {
        header("Location: imoveis.php?exclusao=true");
        exit;
    } else {
        header("Location: imoveis.php?exclusao=false");
        exit;
    }
} catch (Exception $e) {
    header("Location: imoveis.php?exclusao=false");
    exit;
}
?>

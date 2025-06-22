<?php
require_once("conexao.php");

if (!isset($_GET['id'])) {
    header("Location: proprietarios.php?exclusao=false");
    exit;
}

$id = (int) $_GET['id'];

try {
    $sql = "DELETE FROM proprietarios WHERE id = ?";
    $stmt = $pdo->prepare($sql);
    if ($stmt->execute([$id])) {
        header("Location: proprietarios.php?exclusao=true");
        exit;
    } else {
        header("Location: proprietarios.php?exclusao=false");
        exit;
    }
} catch (Exception $e) {
    header("Location: proprietarios.php?exclusao=false");
    exit;
}
?>

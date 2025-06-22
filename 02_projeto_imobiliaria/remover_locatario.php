<?php
require_once("conexao.php");

if (!isset($_GET['id'])) {
    header("Location: locatarios.php?exclusao=false");
    exit;
}

$id = (int) $_GET['id'];

try {
    $sql = "DELETE FROM locatarios WHERE id = ?";
    $stmt = $pdo->prepare($sql);
    if ($stmt->execute([$id])) {
        header("Location: locatarios.php?exclusao=true");
        exit;
    } else {
        header("Location: locatarios.php?exclusao=false");
        exit;
    }
} catch (Exception $e) {
    header("Location: locatarios.php?exclusao=false");
    exit;
}
?>

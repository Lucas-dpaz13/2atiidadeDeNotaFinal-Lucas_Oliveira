<?php
require "database.php";

try{
  $pdo = conectar();

  if ($_SERVER['REQUEST_METHOD'] === "POST"){
    $id = trim($_POST['id']);

    $stmt = $pdo->prepare("DELETE FROM livros WHERE id = :id");
    $stmt->bindParam(":id", $id);
    $stmt->execute();

    header("Location: index.php");
    exit;
  };
} catch (PDOException $e) {
  echo "Erro: " . $e->getMessage();
};
?>
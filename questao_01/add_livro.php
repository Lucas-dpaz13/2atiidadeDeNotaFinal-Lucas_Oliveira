<?php
require "database.php";

try {
  $pdo = conectar();

  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $titulo = trim($_POST['titulo']);
    $autor = trim($_POST['autor']);
    $ano_publicacao = trim($_POST['ano_publicacao']);
    $descricao = trim($_POST['descricao']);

    $stmt = $pdo->prepare("INSERT INTO livros (titulo, autor, ano_publicacao, descricao) VALUES (:titulo, :autor, :ano_publicacao, :descricao)");

    $stmt->bindParam(':titulo', $titulo);
    $stmt->bindParam(':autor', $autor);
    $stmt->bindParam(':ano_publicacao', $ano_publicacao);
    $stmt->bindParam(':descricao', $descricao);

    $stmt->execute();

    header("Location: index.php");
    exit;
  } else {
    echo "Método inválido.";
  }
} catch (PDOException $e) {
  echo "Erro: " . $e->getMessage();
}
?>
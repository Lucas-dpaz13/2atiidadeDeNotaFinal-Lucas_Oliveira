<?php
header('Content-Type: application/json');

require 'database.php';

try {
  $pdo = conectar();

  if (isset($_GET['action']) && $_GET['action'] === 'read') {
    $stmt = $pdo->query("SELECT * FROM livros");
    $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($resultado);
  } else {
    echo json_encode(['erro' => 'Ação inválida ou ausente.']);
  }
} catch (PDOException $e) {
  echo json_encode([
    'erro' => 'Erro na execução.',
    'mensagem' => $e->getMessage()
  ]);
};

exit;
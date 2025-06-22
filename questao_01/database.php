<?php
function conectar() {
  try {
    $pdo = new PDO('sqlite:database.db');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->exec('CREATE TABLE IF NOT EXISTS livros (
      id INTEGER PRIMARY KEY AUTOINCREMENT,
      titulo TEXT,
      autor TEXT,
      ano_publicacao TEXT,
      descricao TEXT
    )');
    return $pdo;
  } catch (PDOException $e) {
    header('Content-Type: application/json');
    echo json_encode(['erro' => 'Conexão falhou!', 'mensagem' => $e->getMessage()]);
    exit;
  };
};
?>
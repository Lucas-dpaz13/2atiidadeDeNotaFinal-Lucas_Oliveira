<!DOCTYPE html>
<html lang="pt-BR">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="author" content="Lucas Oliveira" />
    <title>Livraria Kairós</title>
    <script>
      const listarLivros = async () => {
        try {
          let resposta = await fetch("lerTabela.php?action=read");

          if (!resposta.ok) {
            console.log("Erro na requisição");
            return;
          }

          let livros = await resposta.json();

          let tabela = document.getElementById("corpoTabela");
          tabela.innerHTML = "";

          livros.forEach((livro) => {
            tabela.innerHTML += `
              <tr>
                <td>${livro.id}</td>
                <td>${livro.titulo}</td>
                <td>${livro.autor}</td>
                <td>${livro.ano_publicacao}</td>
                <td>${livro.descricao}</td>
              </tr>
            `;
          });
        } catch (error) {
          console.log(`Erro: ${error.message}`);
        }
      };

      window.onload = () => {
        listarLivros();
      };
    </script>
  </head>
  <body>
    <div>
      <h1>Livraria Kairós</h1>
      <div>
        <h2>Nossa biblioteca</h2>
        <table border="1">
          <thead>
            <tr>
              <th>Id</th>
              <th>Título</th>
              <th>Autor</th>
              <th>Ano_Publicação</th>
              <th>Descrição</th>
            </tr>
          </thead>
          <tbody id="corpoTabela"></tbody>
        </table>
      </div>

      <div>
        <h2>Adicionar livro</h2>
        <form action="add_livro.php" method="POST">
          <label for="titulo">Título</label>
          <input type="text" name="titulo" id="titulo" required />
          <br /><br />
          <label for="autor">Autor</label>
          <input type="text" name="autor" id="autor" required />
          <br /><br />
          <label for="ano_publicacao">Ano de publicação</label>
          <input type="text" name="ano_publicacao" id="ano_publicacao" />
          <br /><br />
          <label for="descricao">Descrição</label>
          <input type="text" name="descricao" id="descricao" />
          <br />
          <button type="submit" > Enviar </button>
        </form>
      </div>
      <div>
        <h2>Remover livro</h2>
        <form action="removerLivro.php" method="POST">
          <label for="id">Id</label>
          <table border="1">
            <thead>
              <tr>
                <input type="text" name="id" id="id" required</input>
              </tr>
              <tr>
                <button type="submit">remover</button>
              </tr>
            </thead>
            <tbody id="corpoTabelaRemover">
              
            </tbody>
          </table>
      </div>
    </div>
  </body>
</html>
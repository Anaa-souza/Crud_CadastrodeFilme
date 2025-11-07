<h1 align="center">🎬 CRUD de Filmes — PHP + MySQL</h1>

<p align="center">
  <img src="https://img.shields.io/badge/PHP-8.2-blue?style=for-the-badge&logo=php" />
  <img src="https://img.shields.io/badge/MySQL-Database-orange?style=for-the-badge&logo=mysql" />
  <img src="https://img.shields.io/badge/HTML-%23E34F26.svg?style=for-the-badge&logo=html5&logoColor=white" />
  <img src="https://img.shields.io/badge/CSS-%231572B6.svg?style=for-the-badge&logo=css3&logoColor=white" />
</p>

<p align="center">
  Um CRUD simples e funcional para gerenciar <b>filmes</b>, feito com <b>PHP + MySQL</b> 💾  
  Ideal para quem está aprendendo sobre <b>banco de dados</b> e <b>desenvolvimento web</b> 🌐
</p>

---

## 🚀 Funcionalidades

- ✅ Cadastrar novos filmes  
- 🧾 Listar filmes em uma tabela dinâmica  
- ✏️ Editar informações em uma página dedicada  
- ❌ Excluir registros com um clique  
- 🔁 Redirecionamento automático após as ações  
- 📊 Contador total de filmes cadastrados  

---

## 🖥️ Interface do Sistema

<div align="center">
  
| Página Principal | Página de Atualização |
|------------------|------------------------|
| <img src="https://github.com/user-attachments/assets/6bbac286-7601-4a49-af1f-918275f93de1" width="350"/> | <img src="https://github.com/user-attachments/assets/246b0549-16ec-4264-a0ce-78ce91ee6e9e" width="350"/> |

</div>

---

## 🧩 Estrutura do Projeto



```bash
📂 crud-filmes
├── 📄 index.php          # Página principal (cadastro + listagem)
├── 📄 update.php         # Atualiza informações do filme
├── 📄 delete.php         # Exclui um filme do banco
├── 📄 store.php          # Insere um novo registro
├── 📄 conexao.php        # Conexão com o banco MySQL
├── 🎨 style.css          # Estilos do layout
└── 📘 README.md          # Este arquivo 
⚙️ Como Executar o Projeto
Clone o repositório

bash
Copiar código
git clone https://github.com/seu-usuario/crud-filmes.git
Inicie o servidor local (XAMPP ou WAMP)

Ative Apache e MySQL

Crie o banco de dados

sql
Copiar código
CREATE DATABASE teste_conexao;
Configure a conexão no arquivo conexao.php

php
Copiar código
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "teste_conexao";
Abra no navegador

arduino
Copiar código
http://localhost/crud-filmes/index.php
💻 Detalhes do Código
🧩 conexao.php
Cria a conexão com o banco de dados MySQL:

php
Copiar código
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Erro na conexão: " . $conn->connect_error);
}
Usa mysqli para conectar ao banco.

Caso haja erro, o sistema exibe uma mensagem e interrompe a execução.

🎬 index.php
É a página principal do sistema, contendo:

O formulário de cadastro

A listagem de todos os filmes

O contador de registros

Inserção de dados:

php
Copiar código
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $sql = "INSERT INTO filmes (titulo, diretor, genero, ano)
            VALUES ('$titulo', '$diretor', '$genero', '$ano')";
    $conn->query($sql);
}
➡ Quando o formulário é enviado, os dados são gravados no banco.

Listagem de filmes:

php
Copiar código
$sqlALL = "SELECT * FROM filmes";
$result = $conn->query($sqlALL);
➡ Exibe os filmes em uma tabela organizada.

Ordenação e contagem:

php
Copiar código
$sqlOrder = "SELECT * FROM filmes ORDER BY titulo ASC";
$sqlCount = "SELECT COUNT(*) AS total FROM filmes";
➡ Mostra a lista ordenada e o total de filmes cadastrados.

✏️ update.php
Usado para editar um filme.
Ele busca os dados pelo id e preenche o formulário automaticamente:

php
Copiar código
$sql = "SELECT * FROM filmes WHERE id=$id";
$filme = $conn->query($sql)->fetch_assoc();
Quando o usuário clica em “Atualizar”, o código executa:

php
Copiar código
$sql = "UPDATE filmes SET titulo='$titulo', diretor='$diretor',
        genero='$genero', ano='$ano' WHERE id=$id";
✅ Após a atualização, o sistema redireciona de volta para index.php.

❌ delete.php
Responsável por excluir filmes:

php
Copiar código
$sql = "DELETE FROM filmes WHERE id=$id";
if ($conn->query($sql) === TRUE) {
    header("Location: index.php");
}
Assim que a exclusão é feita, o usuário é redirecionado para a página principal.

🪄 store.php
Arquivo simples para armazenar novos registros enviados pelo formulário:

php
Copiar código
$sql = "INSERT INTO usuarios (nome, email) VALUES ('$nome', '$email')";
$conn->query($sql);
header("Location: index.php");
🎨 style.css
Define o visual do sistema.
Usa tons roxos, cantos arredondados e contraste suave:

css
Copiar código
form {
  background-color: #3e1568;
  padding: 15px;
  border-radius: 8px;
}
table {
  border-collapse: collapse;
  width: 600px;
}


🧑‍💻 Tecnologias Usadas
Tecnologia	Descrição
🐘 PHP	Linguagem principal
🗄️ MySQL	Banco de dados relacional
🌐 HTML	Estrutura das páginas
🎨 CSS	Estilos visuais




👩🏽‍💻 Autora
Desenvolvido por: Ana Carolina
Se este projeto te ajudou, deixe uma ⭐ no repositório!


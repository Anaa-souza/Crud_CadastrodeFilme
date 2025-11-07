<?php
$servername = "localhost";
$username = "root";
$password = "Senai@118";
$dbname = "teste_conexao";

// Criar conexão
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexão
if ($conn->connect_error) {
    die("Erro na conexão: " . $conn->connect_error);
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Cadastro de Filmes</title>
<link rel="stylesheet" href="style.css">
</head>
<body>

<h1>🎬 Cadastro de Filmes</h1>

<!-- Formulário de cadastro -->
<form method="POST" action="store.php">
    <label>Título do Filme:</label>
    <input type="text" name="titulo" required><br>

    <label>Diretor:</label>
    <input type="text" name="diretor" required><br>

    <label>Gênero:</label>
    <input type="text" name="genero" required><br>

    <label>Ano:</label>
    <input type="number" name="ano" required><br>

    <input type="submit" value="Adicionar Filme">
</form>

<hr>

<h3>🎥 Filmes Cadastrados</h3>
<?php
$sqlALL = "SELECT * FROM filmes ORDER BY titulo ASC";
$result = $conn->query($sqlALL);

if ($result->num_rows > 0) {
    echo "<table border='1'>
            <tr>
                <th>ID</th>
                <th>Título</th>
                <th>Diretor</th>
                <th>Gênero</th>
                <th>Ano</th>
                <th>Ações</th>
            </tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>{$row['id']}</td>
                <td>{$row['titulo']}</td>
                <td>{$row['diretor']}</td>
                <td>{$row['genero']}</td>
                <td>{$row['ano']}</td>
                <td>
                    <a href='update.php?id={$row['id']}'>Editar</a> |
                    <a href='delete.php?id={$row['id']}'>Excluir</a>
                </td>
              </tr>";
    }
    echo "</table>";
} else {
    echo "<p>Nenhum filme cadastrado.</p>";
}

// Contar total
$sqlCount = "SELECT COUNT(*) AS total FROM filmes";
$resCount = $conn->query($sqlCount);
$linhaCount = $resCount->fetch_assoc();
echo "<br><b>Total de filmes cadastrados:</b> " . $linhaCount['total'];

$conn->close();
?>
</body>
</html>






                
                


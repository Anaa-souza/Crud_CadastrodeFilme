<?php
include 'conexao.php';

// Buscar o filme pelo ID que veio na URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM filmes WHERE id=$id";
    $result = $conn->query($sql);
    $filme = $result->fetch_assoc();
}

// Atualizar o filme
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $titulo = $_POST['titulo'];
    $diretor = $_POST['diretor'];
    $genero = $_POST['genero'];
    $ano = $_POST['ano'];

    $sql = "UPDATE filmes 
            SET titulo='$titulo', diretor='$diretor', genero='$genero', ano='$ano' 
            WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        header("Location: index.php"); // volta para a página principal
        exit;
    } else {
        echo "Erro ao atualizar: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<title>Atualizar Filme</title>
<link rel="stylesheet" href="style.css">
</head>
<body>

<h1>🎬 Atualizar Filme</h1>

<!-- Formulário de atualização -->
<form method="POST">
    <input type="hidden" name="id" value="<?php echo $filme['id']; ?>">

    <label>Título:</label>
    <input type="text" name="titulo" value="<?php echo $filme['titulo']; ?>"><br>

    <label>Diretor:</label>
    <input type="text" name="diretor" value="<?php echo $filme['diretor']; ?>"><br>

    <label>Gênero:</label>
    <input type="text" name="genero" value="<?php echo $filme['genero']; ?>"><br>

    <label>Ano:</label>
    <input type="number" name="ano" value="<?php echo $filme['ano']; ?>"><br>

    <input type="submit" value="Atualizar Filme">
    <a href="index.php">Cancelar</a>
</form>

<hr>

<h3>🎥 Filmes Cadastrados</h3>

<?php
// Mostrar a tabela com todos os filmes
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
    echo "Nenhum filme cadastrado.";
}

$conn->close();
?>

</body>
</html>



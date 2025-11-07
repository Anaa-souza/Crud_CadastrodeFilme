<?php
include 'conexao.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") { // verifica se o formulário foi enviado
    $titulo = $_POST['titulo'];  // recebe o título
    $diretor = $_POST['diretor']; // recebe o diretor
    $genero = $_POST['genero']; // recebe o gênero
    $ano = $_POST['ano']; // recebe o ano

    // prepara a consulta SQL
    $sql = "INSERT INTO filmes (titulo, diretor, genero, ano) VALUES ('$titulo', '$diretor', '$genero', '$ano')";

    // executa a consulta e verifica se foi bem sucedida
    if ($conn->query($sql) === TRUE) {
        header("Location: index.php"); // redireciona para a página principal
        exit;
    } else {
        echo "Erro: " . $conn->error; // mostra o erro, se houver
    }
}

$conn->close();
?>



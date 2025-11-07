<?php
include 'conexao.php';

if (isset($_GET['id'])) { // verifica se o id foi passado 
    $id = $_GET['id']; // recebe o id
    $sql = "DELETE FROM filmes WHERE id=$id"; // prepara a exclusão 

    if ($conn->query($sql) === TRUE) {
        header("Location: index.php"); // redireciona se a exclusão for bem-sucedida
        exit;
    } else {
        echo "Erro: " . $conn->error; // mostra o erro, se houver
    }
}


?>

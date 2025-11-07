<?php
include 'conexao.php';

$sql = "SELECT * FROM filmes"; //consuta todos os usuarios
$result = $conn->query($sql); //executa a consuta

if ($result->num_rows > 0){//se tem resultados
    echo "<table border ='1'><tr><th>id</th><th>titulo</th><th>diretor</th><th>genero</th><th>ano</th><tr>";
    while ($row = $result->fetch_assoc()){
        echo "<tr>
        <td> ". $row["id"] ."</td>
        <td> ". $row["titulo"] ."</td>
        <td> ". $row["diretor"] ."</td>
         <td> ". $row["genero"] ."</td>
          <td> ". $row["ano"] ."</td>
        <td>
        <a href= 'update.php?id=" . $row["id"] ."'>Editar</a>
          <a href= 'delete.php?id=" . $row["id"] ."'>Excluir</a>
        </td>
        </tr>";

    }
    echo "</table>"; //fecha a tabela
}else{
    echo "Nenhum usuário encontrado."; //mensagem se não houver 
}


?>
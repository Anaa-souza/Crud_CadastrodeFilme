<?php
//definir o endereço do servidor onde o mysql está sendo executado
$servername = "localhost";

//nome do usuario do banco de dados mysql
$username = "root";

//senha do usuario do banco de dados mysql 
$password = "Senai@118";

//nome do banco de dados que sera usado na conexao
$dbname = "teste_conexao";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error){
    echo "erro de conexão" .
    $conn->connect_error; 
}else{
    echo "";
}
?>
<?php 

// Informações de conexão
$servername = "localhost:8081";
$username = "root";
$password = "";
$dbname = "bank";

// Cria a conexão
$conn = mysqli_connect($nome, $email, $telefone, $genero, $data_nasc, $endereco, $cidade, $estado);

// Verifica a conexão
if (!$conn) {
  die("Falha na conexão: " . mysqli_connect_error());
}
echo "Conexão estabelecida com sucesso!";

// Fecha a conexão
mysqli_close($conn);

?>
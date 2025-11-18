<?php

// Informações de conexão com o MySQL do XAMPP
$servername = "localhost";      // Host padrão do XAMPP
$username = "root";              // Usuário padrão do MySQL
$password = "";                  // Senha padrão (vazia)
$dbname = "bank";                // Nome do banco de dados

// Cria a conexão
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Verifica se a conexão foi bem-sucedida
if (!$conn) {
    die("Falha na conexão: " . mysqli_connect_error());
}

// Define o charset para UTF-8
mysqli_set_charset($conn, "utf8mb4");

echo "Conexão estabelecida com sucesso!";

// Nota: mysqli_close($conn) será chamado automaticamente ao final do script
// Ou você pode descomentar a linha abaixo se desejar fechar explicitamente:
// mysqli_close($conn);

?>

<?php 
$dbHost = 'guest@localhost';
$dbUsername = 'root';
$dbPassword = 'CSdAC@2006';
$dbName = 'bank';

$conexao = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

if($conexao->connect_error)
{
    echo "Erro";
}
else
{
    echo "Conectado com sucesso!";
}
?>


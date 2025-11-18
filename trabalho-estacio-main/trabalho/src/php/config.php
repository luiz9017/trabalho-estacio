<?php 

if(isset($_POST['submit']))
{
    print_r('Nome Completo: ' . $_POST['nome']);
    print_r("<br>");
    print_r('Email: ' . $_POST['email']);
    print_r("<br>");
    print_r('Telefone: ' . $_POST['telefone']);
    print_r("<br>");
    print_r('Gênero: ' . $_POST['genero']);
    print_r("<br>");
    print_r('Data de Nascimento: ' . $_POST['data_nasc']);
    print_r("<br>");
    print_r('Endereço: ' . $_POST['endereco']);
    print_r("<br>");
    print_r('Cidade: ' . $_POST['cidade']);
    print_r("<br>");
    print_r('Estado: ' . $_POST['estado']);
    print_r("<br>");
    print_r('Senha: ' . $_POST['senha']);


    include_once('config.php');

    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];
    $genero = $_POST['genero'];
    $data = $_POST['data']; 
    $endereco = $_POST['endereco'];
    $cidade = $_POST['cidade'];
    $estado = $_POST['estado'];

    $result = mysqli_query($conexao, "INSERT INTO clientes(nome, email, telefone, genero, data_nascimento, endereco, cidade, estado) 
        VALUES ('$nome', '$email', '$telefone', '$genero', '$data_nasc', '$endereco', '$cidade', '$estado')");
}
?>

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
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../images/Icons-Land-Transporter-Car-Left-Red.ico" type="image/x-icon">
    <title>Concessionária Texmex | Carros de Qualidade</title>
    <script src="../../src/js/script.js" defer></script>
    <link rel="stylesheet" href="../../src/css/style.css">
</head>
<body>
    <header>
    <nav>
    <img class="logo" src="../../src/images/concessionaria t (3).png" alt=" imagem da concessioraria" style="height: 120px; width: 190px;">
    <ul>
    <li><a href="../../index.html">Início</a></li>
    <li><a href="../../src/pages/login.html">Login</a></li>
    </ul>
    </nav>
    </header>

    <div class="box">
        <form action="form.php" method="post">
            <fieldset>
                <legend><b>Formulário de Cadastro de Clientes</b></legend>
                <br>
                <div class="inputBox">
                    <input type="text" name="nome" id="nome" class="inputUser" required>
                    <label for="nome" class="labelInput">Nome completo</label>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="text" name="email" id="email" class="inputUser" required>
                    <label for="email" class="labelInput">Email</label>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="password" name="senha" id="senha" class="inputUser" required>
                    <label for="senha" class="labelInput">Senha</label>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="tel" name="telefone" id="telefone" class="inputUser" required>
                    <label for="telefone" class="labelInput">Telefone</label>
                </div>
                <br>
                <p>Sexo:</p>
                <input type="radio" id="masculino" name="genero" value="masculino" required>
                <label for="masculino">Masculino</label>
                <br>
                <input type="radio" id="feminino" name="genero" value="feminino" required>
                <label for="feminino">Feminino</label>
                <br>
                <input type="radio" id="outro" name="genero" value="outro" required>
                <label for="outro">Outro</label>
                <br><br>
                <div class="inputBox">
                    <label for="data_nasc" class="labelInput">Data de Nascimento:</label>
                    <br><input type="date" name="data_nasc" id="data_nasc" class="inputUser" required>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="text" name="endereco" id="endereco" class="inputUser" required>
                    <label for="endereco" class="labelInput">Endereço</label>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="text" name="cidade" id="cidade" class="inputUser" required>
                    <label for="cidade" class="labelInput">Cidade</label>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="text" name="estado" id="estado" class="inputUser" required>
                    <label for="estado" class="labelInput">Estado</label>
                </div>
                <br><br>
                <input type="submit" name="submit" id="submit">
            </fieldset>
        </form>
    </div>
     <footer>
        &copy; 2025 Concessionária Texmex - Todos os direitos reservados
    </footer>   
    
</body>

</html>
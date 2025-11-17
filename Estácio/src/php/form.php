<?php
// Inclui o arquivo de conexão com o banco de dados
include_once('conexao.php');

if(isset($_POST['submit'])) {
    // Recebe os dados do formulário
    $nome = mysqli_real_escape_string($conn, $_POST['nome']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $telefone = mysqli_real_escape_string($conn, $_POST['telefone']);
    $genero = mysqli_real_escape_string($conn, $_POST['genero']);
    $data_nasc = mysqli_real_escape_string($conn, $_POST['data_nasc']);
    $endereco = mysqli_real_escape_string($conn, $_POST['endereco']);
    $cidade = mysqli_real_escape_string($conn, $_POST['cidade']);
    $estado = mysqli_real_escape_string($conn, $_POST['estado']);
    $senha = mysqli_real_escape_string($conn, $_POST['senha']);

    // Valida se todos os campos foram preenchidos
    if(empty($nome) || empty($email) || empty($telefone) || empty($genero) || empty($data_nasc) || empty($endereco) || empty($cidade) || empty($estado) || empty($senha)) {
        echo "<script>alert('Por favor, preencha todos os campos!'); history.back();</script>";
        exit;
    }

    // Verifica se o email já existe
    $check_email = mysqli_query($conn, "SELECT * FROM clientes WHERE email = '$email'");
    if(mysqli_num_rows($check_email) > 0) {
        echo "<script>alert('Este email já está cadastrado!'); history.back();</script>";
        exit;
    }

    // Insere os dados no banco de dados
    $sql = "INSERT INTO clientes(nome, email, telefone, genero, data_nascimento, endereco, cidade, estado, senha) 
            VALUES ('$nome', '$email', '$telefone', '$genero', '$data_nasc', '$endereco', '$cidade', '$estado', '$senha')";

    if(mysqli_query($conn, $sql)) {
        echo "<script>alert('Cadastro realizado com sucesso!'); window.location.href='../../index.html';</script>";
    } else {
        echo "Erro ao cadastrar: " . mysqli_error($conn);
    }

    mysqli_close($conn);
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../../src/images/Icons-Land-Transporter-Car-Left-Red.ico" type="image/x-icon">
    <title>Concessionária Texmex | Cadastro</title>
    <script src="../../src/js/script.js" defer></script>
    <link rel="stylesheet" href="../../src/css/style.css">
</head>
<body>
    <header>
        <nav>
            <img class="logo" src="../../src/images/concessionaria t (3).png" alt="imagem da concessionária" style="height: 120px; width: 190px;">
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
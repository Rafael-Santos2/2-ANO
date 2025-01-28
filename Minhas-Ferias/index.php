<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Login de Usuário</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
<header>
        <h1>Minhas Férias</h1>
        <p>Essa foi as minhas férias, na qual eu fui para a academia e para o parque</p>
    </header>
    <div class="container">
        <h1>Faça o login com o usuário cadastrado</h1>
        <form method="post" action="">
            <label for="email">Email:</label>
            <input type="email" name="email" required><br>
            <label for="senha">Senha:</label>
            <input type="password" name="senha" required><br>
            <button type="submit">Entrar</button>
        </form>
    </div>

    <?php
    include('conexao.php');

    // Verifica se o formulario foi enviado
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // recebe os valores enviados
        $email = $_POST['email'];
        $senha = $_POST['senha'];

        $sql = "SELECT * FROM usuarios WHERE email = '$email'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // Obtém os dados do usuário
            $row = $result->fetch_assoc();


            // Verifica a senha (hash)
            if ($senha == $row['senha']) {
                // Login bem-sucedido
                header("Location: ferias.html");
                exit;
            }
        }
    }
    ?>
</body>

</html>
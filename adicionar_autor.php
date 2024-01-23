<!-- formulario_autor.php -->
<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar Autor</title>
    <link rel="stylesheet" href="estilo.php"/>
</head>
<body>

<form method="post" action="adicionar_autor.php">
    <h2>Adicionar Autor</h2>
    Nome do Autor: <input type="text" name="nome_autor" required><br>
    <input type="submit" name="adicionarAutor" value="Adicionar Autor">
</form>

<?php
	include('db_connection.php');
	
	function adicionarAutor($conn, $nomeAutor) {
    $sql = "INSERT INTO autor (nome_autor) VALUES ('$nomeAutor')";
    if ($conn->query($sql) === TRUE) {
        echo "Autor adicionado com sucesso.";
    } else {
        echo "Erro ao adicionar autor: " . $conn->error;
    }
}

// Verifica se o formulário de adição de usuário foi submetido
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["adicionarAutor"])) {
    $nomeAutor = $_POST["nome_autor"];

    $conn = conectarBanco();
    adicionarAutor($conn, $nomeAutor);
    fecharConexao($conn);

    // Redireciona para a listagem após adicionar o usuário
    header("Location: index.php?acao=listarAutores");
    exit();
}
?>


</body>
</html>
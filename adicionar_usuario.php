<?php
include('db_connection.php');

function adicionarUsuario($conn, $nomeUsuario) {
    $sql = "INSERT INTO usuario (nome_usuario) VALUES ('$nomeUsuario')";
    if ($conn->query($sql) === TRUE) {
        echo "Usuário adicionado com sucesso.";
    } else {
        echo "Erro ao adicionar usuário: " . $conn->error;
    }
}

// Verifica se o formulário de adição de usuário foi submetido
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["adicionarUsuario"])) {
    $nomeUsuario = $_POST["nome_usuario"];

    $conn = conectarBanco();
    adicionarUsuario($conn, $nomeUsuario);
    fecharConexao($conn);

    // Redireciona para a listagem após adicionar o usuário
    header("Location: index.php?acao=listarUsuarios");
    exit();
}
?>

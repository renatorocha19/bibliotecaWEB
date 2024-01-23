<?php
include('db_connection.php');

function adicionarLivro($conn, $titulo, $autor_id, $qtd) {
    $sql = "INSERT INTO livro (titulo, autor_id, qtd) VALUES ('$titulo', $autor_id, $qtd)";
    if ($conn->query($sql) === TRUE) {
        echo "Livro adicionado com sucesso.";
    } else {
        echo "Erro ao adicionar livro: " . $conn->error;
    }
}

// Verifica se o formulário de adição de livro foi submetido
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["adicionarLivro"])) {
    $titulo = $_POST["titulo"];
    $autor_id = $_POST["autor_id"];
    $qtd = $_POST["qtd"];

    $conn = conectarBanco();
    adicionarLivro($conn, $titulo, $autor_id, $qtd);
    //fecharConexao($conn);

    // Redireciona o usuário após adicionar o livro
	//echo "<script>window.alert(Livro adicionado com sucesso);</script>";
    header("Location: index.php?acao=listarLivros");
    exit();
}

?>

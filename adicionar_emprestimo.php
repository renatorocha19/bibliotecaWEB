<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biblioteca Web</title>	
</head>
<body>
<link rel="stylesheet" href="estilo_tabela.php"/>
<?php
include('db_connection.php');

$conn = conectarBanco();
$livro_id = $_POST["livro_id"];
$usuario_id = $_POST["usuario_id"];
$data_emp = $_POST["data_emp"];
$data_devolucao = $_POST["data_devolucao"];

function adicionarEmprestimo($conn, $livro_id, $usuario_id, $data_emp, $data_devolucao) {
    $sql = "INSERT INTO emprestimo (livro_id, usuario_id, data_emp, data_devolucao) 
            VALUES (?, ?, ?, ?)";
    
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("iiss", $livro_id, $usuario_id, $data_emp, $data_devolucao);

    if ($stmt->execute()) {
        echo "Empréstimo adicionado com sucesso.";
    } else {
		http_response_code(500);
		//echo "<script>";
		//echo "alert('Erro ao adicionar empréstimo: " . addslashes($stmt->error) . "');";
		//echo "</script>";
		header("Location: index.php?acao=adicionarEmprestimo");
    }

    $stmt->close();
}

// Verifica se o formulário de adição de empréstimo foi submetido
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["adicionarEmprestimo"])) {
    adicionarEmprestimo($conn, $livro_id, $usuario_id, $data_emp, $data_devolucao);

    header("Location: index.php?acao=listarEmprestimos");
    exit();
}
?>
</body>
</html>
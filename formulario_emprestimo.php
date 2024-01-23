<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar Empréstimo</title>
</head>
<body>

<form method="post" action="adicionar_emprestimo.php">
    <h2>Adicionar Empréstimo</h2>
    Livro:
	<select name="livro_id" required>
        <?php
        //include('db_connection.php');
        
        $conn = conectarBanco();
        $sql = "SELECT livro_id, titulo FROM livro";
        $result = $conn->query($sql);
        
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<option value=\"{$row['livro_id']}\">{$row['titulo']}</option>";
            }
        }
        fecharConexao($conn);
        ?>
    </select><br>

    Usuário:
    <select name="usuario_id" required>
        <?php
        $conn = conectarBanco();
        $sql = "SELECT usuario_id, nome_usuario FROM usuario";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<option value=\"{$row['usuario_id']}\">{$row['nome_usuario']}</option>";
            }
        }
        //fecharConexao($conn);
        ?>
    </select><br>

    Data de Empréstimo: <input type="date" name="data_emp" required><br>
    Data de Devolução: <input type="date" name="data_devolucao" required><br>
    <input type="submit" name="adicionarEmprestimo" value="Adicionar Empréstimo">
</form>

</body>
</html>

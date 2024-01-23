<!-- formulario_livro.php -->
<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar Livro</title>
	
    
</head>
<body>
<link rel="stylesheet" href="estilo_tabela.php"/>

<form method="post" action="adiciona_livro.php">
    <h2>Adicionar Livro</h2>
    Título: <input type="text" name="titulo" required><br>
    Autor:
    <select name="autor_id" required>
        <?php
        //include('db_connection.php');
        
        $conn = conectarBanco();
        $sql = "SELECT autor_id, nome_autor FROM autor";
        $result = $conn->query($sql);
        
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<option value=\"{$row['autor_id']}\">{$row['nome_autor']}</option>";
            }
        }
        fecharConexao($conn);
        ?>
    </select><br>
    Quantidade: <input type="number" name="qtd" min="0" required><br>
    <input type="submit" name="adicionarLivro" value="Adicionar Livro">
</form>

</body>
</html>
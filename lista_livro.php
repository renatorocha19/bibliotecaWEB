<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biblioteca Web</title>
	
	<link rel="stylesheet" type="text/css" href="estilo.css" media="screen" />
	
</head>
<body>
<link rel="stylesheet" href="estilo_tabela.php"/>

<?php
//include('db_connection.php');

//$conn = conectarBanco();

function listarLivros() {
    //$sql = "SELECT livro_id, titulo, nome_autor, qtd FROM livro, autor";
	$sql = "SELECT livro.livro_id, livro.titulo, autor.nome_autor, livro.qtd
				FROM livro
					JOIN autor ON livro.autor_id = autor.autor_id;";
    
	//$result = $conn->query($sql);
	$result = conectarBanco()->query($sql);

    echo "<h2>Lista de Livros</h2>";
    echo "<table>
            <tr>
                <th>Código</th>
                <th>Título</th>
                <th>Autor</th>
                <th>Quantidade</th>
            </tr>";

    if ($result->num_rows > 0) {
		//echo "retornou os livros:\n";
        while($row = $result->fetch_assoc()) {
			//echo "retornou os livros:\n";
            echo "<tr>
                    <td>{$row['livro_id']}</td>
                    <td>{$row['titulo']}</td>
                    <td>{$row['nome_autor']}</td>
                    <td>{$row['qtd']}</td>
                  </tr>";
        }
    } else {
        echo "<tr><td colspan='4'>Nenhum livro encontrado.</td></tr>";
    }

    echo "</table>";
}

?>

</body>
</html>
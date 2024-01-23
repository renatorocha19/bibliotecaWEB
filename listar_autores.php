<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biblioteca Web</title>
	
	<!--<link rel="stylesheet" type="text/css" href="estilo.css" media="screen" />-->
	
</head>
<body>
<link rel="stylesheet" href="estilo_tabela.php"/>

<?php
//include('db_connection.php');

$conn = conectarBanco();

function listarAutores($conn) {
    $sql = "SELECT autor_id, nome_autor FROM autor";
    $result = $conn->query($sql);

	echo "<h2>Lista de Autores</h2>";
    echo "<table>
            <tr>
                <th>Código</th>
                <th>Autor</th>
            </tr>";
	
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
			echo 	"<tr>
					<td>{$row['autor_id']}</td>
					<td>{$row['nome_autor']}</td>
					</tr>";
        }
    } else {
        echo "<tr><td colspan='4'>Nenhum autor encontrado.</td></tr>";
    }
    echo "</table>";
}


//listarAutores($conn);
//fecharConexao($conn);


?>

</body>
</html>
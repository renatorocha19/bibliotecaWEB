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

function listarUsuarios($conn) {
    $sql = "SELECT * FROM usuario";
    $result = $conn->query($sql);
	
	echo "<h2>Listagem de Usuários</h2>";
    echo "<table>
            <tr>
                <th>Código</th>
                <th>Nome</th>
            </tr>";

    if ($result->num_rows > 0) {    
        while ($row = $result->fetch_assoc()) {
			echo "<tr>
				<td>{$row['usuario_id']}</td>
				<td>{$row['nome_usuario']}</td>";
        }echo "</tr>";
   
    } else {
        echo "Nenhum usuário encontrado.";
    }
	    echo "</table>";
}

$conn = conectarBanco();
//listarUsuarios($conn);
//fecharConexao($conn);
?>

</body>
</html>
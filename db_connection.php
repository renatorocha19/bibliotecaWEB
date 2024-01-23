<?php
function conectarBanco() {
    $servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "biblioteca";

	$conn = new mysqli($servername, $username, $password, $dbname);

	if ($conn->connect_errno) {
        echo "Conexão falhou: (" . $conn->connect_errno . ")" . $conn->connect_errno;
	}else
		//echo "\nA conexão deu bom viado \n";

    return $conn;
}

function fecharConexao($conn) {
    mysqli_close($conn);
}
	// Conexão sem a função (caso precise testar)
	
	/*$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "biblioteca";

	$conn = new mysqli($servername, $username, $password, $dbname);

	if ($conn->connect_errno) {
        echo "Conexão falhou: (" . $conn->connect_errno . ")" . $conn->connect_errno;
	} else
		echo "deu bom viado";

    return $conn;*/
?>

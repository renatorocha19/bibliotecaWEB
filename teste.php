<?php
$servername = "localhost:3306";
	$username = "root";
	$password = "Renato1!";
	$dbname = "biblioteca";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT livro_id, titulo, autor_id, qtd FROM livro";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "id: " . $row["livro_id"];
  }
} else {
  echo "0 results";
}
$conn->close();
?>
<!-- formulario_autor.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar Autor</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        form {
            max-width: 400px;
            margin: auto;
        }
        input {
            width: 100%;
            padding: 10px;
            margin: 5px 0;
        }
        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            cursor: pointer;
        }
    </style>
</head>
<body>

<form method="post" action="adicionar_autor.php">
    <h2>Adicionar Autor</h2>
    Nome do Autor: <input type="text" name="nome_autor" required><br>
    <input type="submit" name="adicionarAutor" value="Adicionar Autor">
</form>

</body>
</html>

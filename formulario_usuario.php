<!-- formulario_usuario.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar Usuário</title>
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

<form method="post" action="adicionar_usuario.php">
    <h2>Adicionar Usuário</h2>
    Nome do Usuário: <input type="text" name="nome_usuario" required><br>
    <input type="submit" name="adicionarUsuario" value="Adicionar Usuário">
</form>

</body>
</html>

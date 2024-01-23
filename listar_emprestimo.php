<?php
//include('db_connection.php');

function listarEmprestimos($conn) {
    $emprestimos = [];
    $sql = "SELECT emprestimo.emp_id, livro.titulo AS livro_titulo, usuario.nome_usuario, emprestimo.data_emp, emprestimo.data_devolucao
            FROM emprestimo
            INNER JOIN livro ON emprestimo.livro_id = livro.livro_id
            INNER JOIN usuario ON emprestimo.usuario_id = usuario.usuario_id
            ORDER BY emprestimo.data_emp DESC";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $emprestimos[] = $row;
        }
    }

    return $emprestimos;
}

$conn = conectarBanco();
$emprestimos = listarEmprestimos($conn);
//fecharConexao($conn);
?>



<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listar Empréstimos</title>
    <link rel="stylesheet" href="estilo_tabela.php"/>
</head>
<body>

<!--<h2>Listar Empréstimos</h2>-->

<?php if (count($emprestimos) > 0): ?>
    <table>
        <thead>
            <tr>
                <th>Código do Empréstimo</th>
                <th>Livro</th>
                <th>Solicitante</th>
                <th>Data de Empréstimo</th>
                <th>Data de Devolução</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($emprestimos as $emprestimo): ?>
                <tr>
                    <td><?php echo $emprestimo['emp_id']; ?></td>
                    <td><?php echo $emprestimo['livro_titulo']; ?></td>
                    <td><?php echo $emprestimo['nome_usuario']; ?></td>
                    <td><?php echo $emprestimo['data_emp']; ?></td>
                    <td><?php echo $emprestimo['data_devolucao']; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php else: ?>
    <p>Nenhum empréstimo encontrado.</p>
<?php endif; ?>

</body>
</html>

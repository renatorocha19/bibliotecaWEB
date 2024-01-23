<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biblioteca</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            overflow: hidden;
            background-color: #333;
        }
        li {
            float: left;
        }
        li a {
            display: block;
            color: white;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
        }
        li a:hover {
            background-color: #111;
        }
    </style>
	<link rel="stylesheet" href="estilo_tabela.php"/>
</head>
<body>

<ul id="menu_principal">
    <li class= "subitem"><a href="?acao=listarLivros">Lista Livro</a></li>
    <li class= "subitem"><a href="?acao=adicionarLivro">ADC Livro</a></li>
    <li class= "subitem"><a href="?acao=listarAutores">Lista Autor</a></li>
    <li class= "subitem"><a href="?acao=adicionarAutor">ADC Autor</a></li>
    <li class= "subitem"><a href="?acao=listarUsuarios">Lista Usuário</a></li>
    <li class= "subitem"><a href="?acao=adicionarUsuario">ADC Usuário</a></li>
    <li class= "subitem"><a href="?acao=listarEmprestimos">Lista Empréstimo</a></li>
    <li class= "subitem"><a href="?acao=adicionarEmprestimo">ADC Empréstimo</a></li>
</ul>

<?php
include('db_connection.php');
//include('listar_emprestimo.php');
//listarEmprestimos($conn);

//limpar a tela, mas não funciona como esperado
//echo "<script>document.body.innerHTML=''</script>"; 

if (isset($_GET['acao'])) {
    $acao = $_GET['acao'];

    switch ($acao) {
        case 'listarLivros':
            // Lógica para listar livros
			include('lista_livro.php');
			listarLivros();
            break;
        case 'adicionarLivro':
			//include('adiciona_livro.php');    não precisa
            include('formulario_livro.php');
			//adicionarLivro();
            break;
        case 'listarAutores':
            // Lógica para listar autores
			include('listar_autores.php');
			listarAutores($conn);
            break;
        case 'adicionarAutor':
			include('formulario_autor.php');
			//adicionarAutor($conn, $nomeAutor);
            break;
        case 'listarUsuarios':
            // Lógica para listar usuários
			include('listar_usuarios.php');
			listarUsuarios($conn);
            break;
        case 'adicionarUsuario':
            include('formulario_usuario.php');
            break;
        case 'listarEmprestimos':
            // Lógica para listar empréstimos
			include('listar_emprestimo.php');
			listarEmprestimos($conn);
            break;
        case 'adicionarEmprestimo':
            include('formulario_emprestimo.php');
			//adicionarEmprestimo($conn, $livro_id, $usuario_id, $data_emp, $data_devolucao);
            break;
        default:
            //echo "Ação não reconhecida.";
			//include('lista_livro.php');
			listarLivros();
            break;
    }
}
?>

</body>
</html>

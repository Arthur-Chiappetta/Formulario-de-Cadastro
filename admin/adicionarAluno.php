<?php

require "../config.php";
require "../src/CadastroAluno.php";
require "../src/redireciona.php";


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $cadastro = new CadastroAluno($mysql);
    $cadastro->adicionar($_POST['nome'], $_POST['numero']);

    redireciona('../index.php');
}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Aluno</title>
</head>

<body>
    <div id="container">
        <h1>Adicionar Aluno</h1>
        <form action="adicionarAluno.php" method="POST">
            <p>
                <label for="">Digite o nome do aluno</label>
                <input class="campo-form" type="text" name="nome" id="nome" />
            </p>
            <p>
                <label for="">Digite o celular do aluno</label>
                <input class="campo-form" type="text" name="numero" id="numero"></input>
            </p>
            <p>
                <a><button>Finalizar Cadastro</button></a>
            </p>
        </form>
    </div>
</body>

</html>
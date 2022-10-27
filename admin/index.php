<?php

require '../config.php';
include '../src/CadastroAluno.php';

$cadastro = new CadastroAluno($mysql);
$cadastros = $cadastro->exibirTodos();

?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title>Página administrativa</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="../style.css">
</head>

<body>
    <div id="container">
        <h1>Página Administrativa</h1>
        <div>
            <?php foreach ($cadastros as $cadastro) : ?>
                <div id="cadastro-admin">
                    <p><?php echo $cadastro['nome']; ?></p>
                    <nav>
                        <a class="botao" href="editarAluno.php?id=<?php echo $cadastro['id']; ?>">Editar</a>
                        <a class="botao" href="excluirAluno.php?id=<?php echo $cadastro['id']; ?>">Excluir</a>
                    </nav>
                </div>
            <?php endforeach; ?>

        </div>
        <br />
        <a href="adicionarAluno.php"><button>Cadastrar Aluno</button></a>
    </div>
</body>

</html>
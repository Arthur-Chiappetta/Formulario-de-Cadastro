<?php 

require '../config.php';
require '../src/CadastroAluno.php';
require '../src/redireciona.php';

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $cadastro = new CadastroAluno($mysql);
    $cad = $cadastro->remover($_POST['id']);

    redireciona('../index.php');
}

?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Excluir Aluno</title>
</head>
<body>
    <div id="container">
        <h1>Você realmente deseja excluir o aluno?</h1>
        <form method="post" action="excluirAluno.php">
            <p>
                <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>" />
                <button class="botao">Excluir</button>
            </p>
        </form>
    </div>
</body>
</html>
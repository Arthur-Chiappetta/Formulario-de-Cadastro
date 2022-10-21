<?php 

require '../config.php';
require '../src/CadastroAluno.php';
require '../src/redireciona.php';

if($_SERVER['REQUEST_METHOD'] === 'POST'){

    $cadastro = new CadastroAluno($mysql);
    $cadastro->editar($_POST['id'], $_POST['nome'], $_POST['numero']);

    redireciona('../index.php');
}else{

    $cadastro = new CadastroAluno($mysql);
    $cad = $cadastro->encontrarPorId($_GET['id']);
}
?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar dados</title>
</head>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <link rel="stylesheet" type="text/css" href="../style.css">
    <meta charset="UTF-8">
    <title>Editar dados</title>
</head>

<body>
    <div id="container">
        <h1>Editar dados</h1>
        <form action="editarAluno.php" method="post">
            <p>
                <label for="nome">Redefinir nome</label>
                <input class="campo-form" type="text" name="nome" id="nome" value="<?php echo $cad['nome']; ?>" />
            </p>
            <p>
                <label for="numero">Redefinir número de celular</label>
                <input class="campo-form" type="text" name="numero" id="numero" value="<?php echo $cad['numero']; ?>">
            
            
                </input>
            </p>
            <p>
                <input type="hidden" name="id" value="<?php echo $cad['id']; ?>" />
            </p>
            <p>
                <button class="botao">Editar dados</button>
            </p>
        </form>
    </div>
</body>
</html>
<?php

include 'config.php';
require 'src/CadastroAluno.php';
require 'src/BuscaEspecifica.php';

$cadastro = new CadastroAluno($mysql);
$cadastros = $cadastro->exibirTodos();

$tipoBusca = '';

if (isset($_GET['buscaEspecifica'])) {
  $tipoBusca = $_GET['buscaEspecifica'];
}


$buscaEspecifica = new BuscaEspecifica($mysql);
if (isset($_GET['busca'])) {
  if ($tipoBusca == 'dupla') {
    $buscaNome = $buscaEspecifica->buscaEspecifica($_GET['busca'], 'nome');
    $buscaNumero = $buscaEspecifica->buscaEspecifica($_GET['busca'], 'numero');

    $busca = array_merge($buscaNome, $buscaNumero);
  } else {
    $busca = $buscaEspecifica->buscaEspecifica($_GET['busca'], $tipoBusca);
  }
}

?>

<!doctype html>
<html lang="pt-br">

<head>
  <title>Listagem de Aluno</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>

  <center>
    <h1>Alunos Cadastrados</h1>
  </center>

  <form action="">
    <!--<input type="radio" name="buscaEspecifica" value="nome"><label>Nome</label>
    <input type="radio" name="buscaEspecifica" value="numero"><label>Celular</label>-->

    <div class="col-md-2">
      <select class="form-control" name="buscaEspecifica">
        <option value="nome">Nome</option>
        <option value="numero">Celular</option>
        <option value="dupla">Nome e Celular</option>
      </select>
    </div>

    <br />

    <p>
      <input type="text" name="busca" placeholder="Pesquisar">
      <input type="submit" value="pesquisar">
    </p>
  </form>

  <br />
  <table class="table" border="1">
    <thead>
      <tr>
        <th>id</th>
        <th>Nome</th>
        <th>Celular</th>
      </tr>
    </thead>
    <tbody>
      <?php if (isset($_GET['busca'])) {
        foreach ($busca as $buscaEspecifica) : ?>
          <tr>
            <td scope="row"><?php echo $buscaEspecifica['id'] ?></td>
            <td><?php echo $buscaEspecifica['nome'] ?></td>
            <td><?php echo $buscaEspecifica['numero'] ?></td>
          </tr>
        <?php endforeach;
      } else { ?>

        <?php foreach ($cadastros as $cadastro) : ?>
          <tr>
            <td scope="row"><?php echo $cadastro['id'] ?></td>
            <td><?php echo $cadastro['nome'] ?></td>
            <td><?php echo $cadastro['numero'] ?></td>
          </tr>
      <?php endforeach;
      } ?>
    </tbody>
  </table>

  <center>
    <a href="admin/index.php"><button>Pagina Administrativa</button></a>
  </center>
  </div>
</body>

</html>
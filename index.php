<?php

include 'config.php';
require 'src/CadastroAluno.php';
require 'src/BuscaEspecifica.php';

$cadastro = new CadastroAluno($mysql);
$cadastros = $cadastro->exibirTodos();

$buscaEspecifica = new BuscaEspecifica($mysql);
if(isset($_GET['search'])){
$busca = $buscaEspecifica->buscaEspecifica($_GET['search']);

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

    
    <div class="box-serch">
      <input type="search" class="form-control w-25" placeholder="Pesquisar" id="pesquisar">
      <button onclick="searchData()">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
            </svg>
        </button>
    </div>
    <br/>
      <table class="table" border="1">
          <thead>
              <tr>
                  <th>id</th>
                  <th>Nome</th>
                  <th>Celular</th>
              </tr>
          </thead>
          <tbody>
          <?php if(isset($_GET['search'])){
          foreach($busca as $buscaEspecifica): ?>
              <tr>
                  <td scope="row"><?php echo $buscaEspecifica['id'] ?></td>
                  <td><?php echo $buscaEspecifica['nome'] ?></td>
                  <td><?php echo $buscaEspecifica['numero'] ?></td>
              </tr>
            <?php endforeach;
            } else { ?> 
          
            <?php foreach($cadastros as $cadastro): ?>
              <tr>
                  <td scope="row"><?php echo $cadastro['id'] ?></td>
                  <td><?php echo $cadastro['nome'] ?></td>
                  <td><?php echo $cadastro['numero'] ?></td>
              </tr>
            <?php endforeach; 
            }?>  
          </tbody>
      </table>

      
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  
    <br/>
      
    <div>
      <center>
        <a href="admin/index.php"><button>Pagina Administrativa</button></a>
      </center>
    </div>
  </body>
  <script>
    var search = document.getElementById('pesquisar');

    search.addEventListener("keydown", function(event) {
        if (event.key === "Enter") 
        {
            searchData();
        }
    });

    function searchData()
    {
      window.location = 'index.php?search='+search.value;
    }

  </script>
</html>
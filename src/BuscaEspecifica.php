<?php 

class BuscaEspecifica
{

    private $mysql;

    public function __construct(mysqli $mysql)
    {
        $this->mysql = $mysql;
    }

    function buscaEspecifica(string $pesquisa):array
    {
        $busca = $this->mysql->query("SELECT * FROM alunos WHERE nome LIKE '%$pesquisa%' OR numero LIKE '%$pesquisa%'");
        $resultado = $busca->fetch_all(MYSQLI_ASSOC);
        return $resultado;

    }

}


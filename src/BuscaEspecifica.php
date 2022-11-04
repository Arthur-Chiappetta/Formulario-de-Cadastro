<?php

class BuscaEspecifica
{

    private $mysql;

    public function __construct(mysqli $mysql)
    {
        $this->mysql = $mysql;
    }

    function buscaEspecifica(string $pesquisa, string $tipoBusca): array
    {

        $campoPesquisa = 'nome';

        if ($tipoBusca == 'nome') {
            $campoPesquisa = 'nome';
        }

        if ($tipoBusca == 'numero') {
            $campoPesquisa = 'numero';
        }

        $busca = $this->mysql->query("SELECT * FROM alunos WHERE " . $campoPesquisa . " LIKE '%$pesquisa%'");
        $resultado = $busca->fetch_all(MYSQLI_ASSOC);
        return $resultado;
    }
}

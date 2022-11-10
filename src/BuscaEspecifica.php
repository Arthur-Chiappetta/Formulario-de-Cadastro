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

        switch ($tipoBusca) {
            case 'nome':
                $campoPesquisa = 'nome';
                break;
            case 'numero':
                $campoPesquisa = 'numero';
                break;
        }

        $busca = $this->mysql->query("SELECT * FROM alunos WHERE " . $campoPesquisa . " LIKE '%$pesquisa%'");
        $resultado = $busca->fetch_all(MYSQLI_ASSOC);
        return $resultado;
    }
}

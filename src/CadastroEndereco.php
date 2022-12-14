<?php

class CadastroEndereco
{

    private $mysql;

    public function __construct(mysqli $mysql)
    {
        $this->mysql = $mysql;
    }

    public function exibirTodos(): array
    {

        $resultado = $this->mysql->query('SELECT id, cidade, rua FROM enderecos');
        $enderecos = $resultado->fetch_all(MYSQLI_ASSOC);

        return $enderecos;
    }
}

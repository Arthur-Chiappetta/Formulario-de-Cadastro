<?php


class CadastroAluno
{
    private $mysql;

    public function __construct(mysqli $mysql)
    {
        $this->mysql = $mysql;
    }

    public function adicionar(string $nome, string $numero): void
    {
        $insereArtigo = $this->mysql->prepare('INSERT INTO alunos (nome, numero) VALUES(?,?);');
        $insereArtigo->bind_param('ss', $nome, $numero);
        $insereArtigo->execute();
    }

    public function editar(string $id, string $nome, string $numero): void
    {
        $editaArtigo = $this->mysql->prepare('UPDATE alunos SET nome = ?, numero = ? WHERE id = ?');
        $editaArtigo->bind_param('sss', $nome, $numero, $id);
        $editaArtigo->execute();
    }

    public function remover(string $id): void
    {
        $removerArtigo = $this->mysql->prepare('DELETE FROM alunos WHERE id = ?');
        $removerArtigo->bind_param('s', $id);
        $removerArtigo->execute();
    }

    public function exibirTodos(): array
    {

        $resultado = $this->mysql->query('SELECT id, nome, numero FROM alunos');
        $cadastros = $resultado->fetch_all(MYSQLI_ASSOC);

        return $cadastros;
    }

    public function encontrarPorId(string $id): array
    {
        $selecionarAluno = $this->mysql->prepare("SELECT id, nome, numero FROM alunos WHERE id = ?");
        $selecionarAluno->bind_param('s', $id);
        $selecionarAluno->execute();
        $aluno = $selecionarAluno->get_result()->fetch_array();

        return $aluno;
    }
}

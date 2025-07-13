<?php

require_once __DIR__ . '/Entidade.php';

class Produto extends Entidade
{
    private string $nome;
    private ?string $descricao;
    private float $preco;
    private ?Categoria $categoria;
    private ?string $imagemUrl;

    public function __construct(
        ?int $id,
        string $nome,
        ?string $descricao,
        float $preco,
        ?Categoria $categoria,
        ?string $imagemUrl = null,
        bool $ativo = true,
        ?string $dataCriacao = null,
        ?string $dataAtualizacao = null,
        ?Usuario $usuarioAtualizacao = null,
    ) {
        parent::__construct($id, $ativo, $dataCriacao, $dataAtualizacao, $usuarioAtualizacao);
        $this->nome = $nome;
        $this->descricao = $descricao;
        $this->preco = $preco;
        $this->categoria = $categoria;
        $this->imagemUrl = $imagemUrl;
    }

    public function getNome(): string
    {
        return $this->nome;
    }
    public function getDescricao(): ?string
    {
        return $this->descricao;
    }
    public function getPreco(): float
    {
        return $this->preco;
    }
    public function getCategoria(): ?Categoria
    {
        return $this->categoria;
    }
    public function getImagemUrlDb(): ?string
    {
        return $this->imagemUrl;
    }

    public function getImagemUrlExibicao(): string 
    {
        return $this->imagemUrl ?? '/sistema_vendas_tii09/public/img/produto_default.png';
    }
}

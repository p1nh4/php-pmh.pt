<?php

namespace App\Model;

use App\DAO\ProdutoDAO;
use Exception;

final class Produto extends Model
{
    public ?int $id = null;
    
    private ?string $_nome = null;
    public ?string $nome
    {
        set 
        {
            if (strlen($value) < 3)
                throw new Exception("Nome tem que ter min. 3 caracteres");
            
            $this->_nome = $value;
        }
        get => $this->_nome;
    }

    private ?string $_descricao = null;
    public ?string $descricao
    {
        set 
        {
            if (strlen($value) < 3)
                throw new Exception("Descrição tem que ter min. 3 caracteres");
            
            $this->_descricao = $value;
        }
        get => $this->_descricao;
    }

    private ?float $_preco = null;
    public ?float $preco
    {
        set 
        {
            if ($value === null || $value <= 0)
                throw new Exception("Preço tem de ser maior que zero");
            
            $this->_preco = $value;
        }
        get => $this->_preco;
    }
    
    public ?string $validade = null;
    public ?int $estoque = null;
    public ?int $categoria_id = null;
    public ?int $marca_id = null;
    public ?int $fornecedor_id = null;

    function save(): Produto
    {
        return new ProdutoDAO()->save($this);
    }

    function getById(int $id): ?Produto
    {
        return new ProdutoDAO()->selectById($id);
    }

    function getAllRows(): array
    {
        $this->rows = new ProdutoDAO()->select();
        return $this->rows;
    }

    function delete(int $id): bool
    {
        return new ProdutoDAO()->delete($id);
    }
}
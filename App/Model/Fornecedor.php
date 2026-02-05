<?php

namespace App\Model;

use App\DAO\FornecedorDAO;
use Exception;

final class Fornecedor extends Model
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

    public ?string $contato = null;

    private ?string $_telefone = null;
    public ?string $telefone
    {
        set 
        {
            if (empty($value))
                throw new Exception("Telefone tem de ser preenchido");
            
            $this->_telefone = $value;
        }
        get => $this->_telefone;
    }

    public ?string $email = null;
    public ?string $senha = null;

    function save(): Fornecedor
    {
        return new FornecedorDAO()->save($this);
    }

    function getById(int $id): ?Fornecedor
    {
        return new FornecedorDAO()->selectById($id);
    }

    function getAllRows(): array
    {
        $this->rows = new FornecedorDAO()->select();
        return $this->rows;
    }

    function delete(int $id): bool
    {
        return new FornecedorDAO()->delete($id);
    }
}
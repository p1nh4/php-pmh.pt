<?php

namespace App\Model;

use App\DAO\CategoriaDAO;
use Exception;

final class Categoria extends Model
{
    public ?int $id = null;
    
    private ?string $_nome = null;
    public ?string $nome
    {
        set 
        {
            if (strlen($value) < 2)
                throw new Exception("Nome tem que ter min. 2 caracteres");
            
            $this->_nome = $value;
        }
        get => $this->_nome;
    }

    public ?string $descricao = null;

    function save(): Categoria
    {
        return new CategoriaDAO()->save($this);
    }

    function getById(int $id): ?Categoria
    {
        return new CategoriaDAO()->selectById($id);
    }

    function getAllRows(): array
    {
        $this->rows = new CategoriaDAO()->select();
        return $this->rows;
    }

    function delete(int $id): bool
    {
        return new CategoriaDAO()->delete($id);
    }
}
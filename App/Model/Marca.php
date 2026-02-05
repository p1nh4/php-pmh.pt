<?php

namespace App\Model;

use App\DAO\MarcaDAO;
use Exception;

final class Marca extends Model
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

    private ?string $_pais_origem = null;
    public ?string $pais_origem
    {
        set 
        {
            if (strlen($value) < 2)
                throw new Exception("País de origem tem que ter min. 2 caracteres");
            
            $this->_pais_origem = $value;
        }
        get => $this->_pais_origem;
    }

    function save(): Marca
    {
        return new MarcaDAO()->save($this);
    }

    function getById(int $id): ?Marca
    {
        return new MarcaDAO()->selectById($id);
    }

    function getAllRows(): array
    {
        $this->rows = new MarcaDAO()->select();
        return $this->rows;
    }

    function delete(int $id): bool
    {
        return new MarcaDAO()->delete($id);
    }
}
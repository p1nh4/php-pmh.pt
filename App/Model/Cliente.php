<?php

namespace App\Model;

use App\DAO\ClienteDAO;
use Exception;

final class Cliente extends Model
{
    public ?int $id = null;
    public ?string $nome
    {
        set 
        {
            if (strlen($value) < 3)
                throw new Exception("Nome tem que ter min. 3 caracteres");

                $this->nome = $value;

        }

        get => $this->nome ?? null;
    }

    public ?string $endereco
    {
        set 
        {
            if (strlen($value) < 3)
                throw new Exception("Endereço tem que ter min. 3 caracteres");

                $this->endereco = $value;
        }

        get => $this->endereco ?? null;
    }

    public ?string $telefone
    {
        set 
        {
            if (empty($value))
                throw new Exception("Telefone tem de ser preenchido");

                $this->telefone = $value;
        }

        get => $this->telefone ?? null;
    }
    public ?string  $email = null;
    public ?string  $senha = null;

    function save(): Cliente
    {
        return new ClienteDAO()->save($this);
    }

    function getById(int $id): ?Cliente
    {
        return new ClienteDAO()->selectById($id);
    }

    function getAllRows(): array
    {
        $this->rows = new ClienteDAO()->select();
        return $this->rows;
    }

    function delete(int $id): bool
    {
        return new ClienteDAO()->delete($id);
    }
}

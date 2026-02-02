<?php

namespace App\Model;

use App\DAO\ClienteDAO;

final class Cliente
{
    public $id, $nome, $endereco, $telefone, $email, $senha;

    function save() : Cliente
    {
        return new ClienteDAO()->save($this);
    }

    function getById(int $id) : ?Cliente
    {
        return new ClienteDAO()->selectById($id);
    }

    function getAllRows() : array
    {
        return new ClienteDAO()->select();
    }

    function delete(int $id) : bool
    {
        return new ClienteDAO()->delete($id);
    }
}
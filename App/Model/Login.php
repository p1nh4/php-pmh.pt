<?php

namespace App\Model;

use App\DAO\LoginDAO;

final class Login
{

    public $email, $senha;

    public function logar() : ?Login
    {
        return new LoginDAO()->autenticar($this);
    }
}
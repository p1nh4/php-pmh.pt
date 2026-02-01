<?php

namespace App\Controller;

use App\Model\Cliente;

final class ClienteController
{
    public static function listar() : void
    {
        echo "Listagem de Clientes";
        $cliente = new Cliente();
        $lista = $cliente->getAllRows();

        var_dump($lista);
    }
    
    public static function cadastro() : void
    {
        //echo "Cadastro de Cliente";
        
        $model = new Cliente();
        //$model->id = 1;
        $model->nome = "Cliente Exemplo";
        $model->endereco = "Rua Exemplo, 123";
        $model->telefone = "42969781774";
        $model->email = "mebedo3791@okexbit.com"; 
        $model->senha = "senha123";
        $model->save();

        echo "Cliente inserido";
    }
}
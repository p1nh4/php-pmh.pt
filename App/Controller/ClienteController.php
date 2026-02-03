<?php

namespace App\Controller;

use App\Model\Cliente;

final class ClienteController extends Controller
{
    public static function cadastro(): void
    {
        parent::isProtected();
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $model = new Cliente();
            $model->id = !empty($_POST['id']) ? $_POST['id'] : null;
            $model->nome = $_POST['nome'];
            $model->endereco = $_POST['endereco'];
            $model->telefone = $_POST['telefone'];
            $model->email = $_POST['email'];
            $model->senha = $_POST['senha'];
            $model->save();

            header("Location: /cliente");
        } else {
            $model = new Cliente();

            if (isset($_GET['id'])) {
                $model = $model->getById((int) $_GET['id']);
            }
            include VIEWS . '/cliente/form_cliente.php';
        }


        //echo "Cadastro de Cliente";
        //$model = new Cliente();
        // //$model->id = 1;
        // $model->nome = "Cliente Exemplo";
        // $model->endereco = "Rua Exemplo, 123";
        // $model->telefone = "42969781774";
        // $model->email = "mebedo3791@okexbit.com"; 
        // $model->senha = "senha123";
        // $model->save();
        //echo "Cliente inserido";
    }
    public static function listar(): void
    {
        parent::isProtected();
        // echo "Listagem de Clientes";
        $cliente = new Cliente();
        $lista = $cliente->getAllRows();

        //   var_dump($lista);
        include VIEWS . '/Cliente/lista_cliente.php';
    }

    public static function delete(): void
    {
        parent::isProtected();
        $cliente = new Cliente();
        $cliente->delete((int) $_GET['id']);

        header("Location: /cliente");
    }
}

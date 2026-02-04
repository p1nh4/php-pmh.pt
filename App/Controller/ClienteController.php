<?php

namespace App\Controller;

use App\Model\Cliente;
use Exception;

final class ClienteController extends Controller
{

    public static function index(): void
    {
        parent::isProtected();
        // echo "Listagem de Clientes";
        $model = new Cliente();

        try {
            $model->getAllRows();
        } catch (Exception $e) {
            $model->setError("Erro ao buscar na BD");
            $model->setError($e->getMessage());
        }
        parent::render('Cliente/lista_cliente.php', $model);
        //   var_dump($lista);
        //include VIEWS . '/Cliente/lista_cliente.php';
    }

    public static function cadastro(): void
    {
        parent::isProtected();
        $model = new Cliente();
        try {
            if (parent::isPost()) {
                $model->id = !empty($_POST['id']) ? $_POST['id'] : null;
                $model->nome = $_POST['nome'];
                $model->endereco = $_POST['endereco'];
                $model->telefone = $_POST['telefone'];
                $model->email = $_POST['email'];
                $model->senha = $_POST['senha'];
                $model->save();
                parent::redirect("/cliente");
            } else {

                if (isset($_GET['id'])) {
                    $model = $model->getById((int) $_GET['id']);
                }
            }
        } catch (Exception $e) {
            $model->setError($e->getMessage());
        }
        parent::render('Cliente/form_cliente.php', $model);
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

    public static function delete(): void
    {
        parent::isProtected();
        $model = new Cliente();
        try {
            $model->delete((int) $_GET['id']);
            parent::redirect("/cliente");
        } catch (Exception $e) {
            $model->setError("Erro ao deletar cliente");
            $model->setError($e->getMessage());
        }
        parent::render('Cliente/lista_cliente.php', $model);
    }
}

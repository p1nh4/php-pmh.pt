<?php

namespace App\Controller;

use App\Model\Fornecedor;
use Exception;

final class FornecedorController extends Controller
{

    public static function index(): void
    {
        parent::isProtected();
        $model = new Fornecedor();

        try {
            $model->getAllRows();
        } catch (Exception $e) {
            $model->setError("Erro ao buscar na BD");
            $model->setError($e->getMessage());
        }
        parent::render('Fornecedor/lista_fornecedor.php', $model);
    }

    public static function cadastro(): void
    {
        parent::isProtected();
        $model = new Fornecedor();
        try {
            if (parent::isPost()) {
                $model->id = !empty($_POST['id']) ? $_POST['id'] : null;
                $model->nome = $_POST['nome'];
                $model->contato = $_POST['contato'];
                $model->telefone = $_POST['telefone'];
                $model->email = $_POST['email'];
                $model->senha = $_POST['senha'];
                $model->save();
                parent::redirect("/fornecedor");
            } else {
                if (isset($_GET['id'])) {
                    $model = $model->getById((int) $_GET['id']);
                }
            }
        } catch (Exception $e) {
            $model->setError($e->getMessage());
        }
        parent::render('Fornecedor/form_fornecedor.php', $model);
    }

    public static function delete(): void
    {
        parent::isProtected();
        $model = new Fornecedor();
        try {
            $model->delete((int) $_GET['id']);
            parent::redirect("/fornecedor");
        } catch (Exception $e) {
            $model->setError("Erro ao deletar fornecedor");
            $model->setError($e->getMessage());
        }
        parent::render('Fornecedor/lista_fornecedor.php', $model);
    }
}
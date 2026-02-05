<?php

namespace App\Controller;

use App\Model\Categoria;
use Exception;

final class CategoriaController extends Controller
{

    public static function index(): void
    {
        parent::isProtected();
        $model = new Categoria();

        try {
            $model->getAllRows();
        } catch (Exception $e) {
            $model->setError("Erro ao buscar na BD");
            $model->setError($e->getMessage());
        }
        parent::render('Categoria/lista_categoria.php', $model);
    }

    public static function cadastro(): void
    {
        parent::isProtected();
        $model = new Categoria();
        try {
            if (parent::isPost()) {
                $model->id = !empty($_POST['id']) ? $_POST['id'] : null;
                $model->nome = $_POST['nome'];
                $model->descricao = $_POST['descricao'];
                $model->save();
                parent::redirect("/categoria");
            } else {
                if (isset($_GET['id'])) {
                    $model = $model->getById((int) $_GET['id']);
                }
            }
        } catch (Exception $e) {
            $model->setError($e->getMessage());
        }
        parent::render('Categoria/form_categoria.php', $model);
    }

    public static function delete(): void
    {
        parent::isProtected();
        $model = new Categoria();
        try {
            $model->delete((int) $_GET['id']);
            parent::redirect("/categoria");
        } catch (Exception $e) {
            $model->setError("Erro ao deletar categoria");
            $model->setError($e->getMessage());
        }
        parent::render('Categoria/lista_categoria.php', $model);
    }
}
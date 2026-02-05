<?php

namespace App\Controller;

use App\Model\Marca;
use Exception;

final class MarcaController extends Controller
{

    public static function index(): void
    {
        parent::isProtected();
        $model = new Marca();

        try {
            $model->getAllRows();
        } catch (Exception $e) {
            $model->setError("Erro ao buscar na BD");
            $model->setError($e->getMessage());
        }
        parent::render('Marca/lista_marca.php', $model);
    }

    public static function cadastro(): void
    {
        parent::isProtected();
        $model = new Marca();
        try {
            if (parent::isPost()) {
                $model->id = !empty($_POST['id']) ? $_POST['id'] : null;
                $model->nome = $_POST['nome'];
                $model->pais_origem = $_POST['pais_origem'];
                $model->save();
                parent::redirect("/marca");
            } else {
                if (isset($_GET['id'])) {
                    $model = $model->getById((int) $_GET['id']);
                }
            }
        } catch (Exception $e) {
            $model->setError($e->getMessage());
        }
        parent::render('Marca/form_marca.php', $model);
    }

    public static function delete(): void
    {
        parent::isProtected();
        $model = new Marca();
        try {
            $model->delete((int) $_GET['id']);
            parent::redirect("/marca");
        } catch (Exception $e) {
            $model->setError("Erro ao deletar marca");
            $model->setError($e->getMessage());
        }
        parent::render('Marca/lista_marca.php', $model);
    }
}
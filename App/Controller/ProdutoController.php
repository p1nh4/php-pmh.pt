<?php

namespace App\Controller;

use App\Model\Produto;
use Exception;

final class ProdutoController extends Controller
{

    public static function index(): void
    {
        parent::isProtected();
        $model = new Produto();

        try {
            $model->getAllRows();
        } catch (Exception $e) {
            $model->setError("Erro ao buscar na BD");
            $model->setError($e->getMessage());
        }
        parent::render('Produto/lista_produto.php', $model);
    }

    public static function cadastro(): void
    {
        parent::isProtected();
        $model = new Produto();
        try {
            if (parent::isPost()) {
                $model->id = !empty($_POST['id']) ? $_POST['id'] : null;
                $model->nome = $_POST['nome'];
                $model->descricao = $_POST['descricao'];
                $model->preco = $_POST['preco'];
                $model->validade = $_POST['validade'];
                $model->estoque = $_POST['estoque'];
                $model->categoria_id = !empty($_POST['categoria_id']) ? $_POST['categoria_id'] : null;
                $model->marca_id = !empty($_POST['marca_id']) ? $_POST['marca_id'] : null;
                $model->fornecedor_id = !empty($_POST['fornecedor_id']) ? $_POST['fornecedor_id'] : null;
                $model->save();
                parent::redirect("/produto");
            } else {
                if (isset($_GET['id'])) {
                    $model = $model->getById((int) $_GET['id']);
                }
            }
        } catch (Exception $e) {
            $model->setError($e->getMessage());
        }
        parent::render('Produto/form_produto.php', $model);
    }

    public static function delete(): void
    {
        parent::isProtected();
        $model = new Produto();
        try {
            $model->delete((int) $_GET['id']);
            parent::redirect("/produto");
        } catch (Exception $e) {
            $model->setError("Erro ao deletar produto");
            $model->setError($e->getMessage());
        }
        parent::render('Produto/lista_produto.php', $model);
    }
}
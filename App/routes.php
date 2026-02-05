<?php

use App\Controller\{
    ClienteController,
    InicialController,
    LoginController,
    ProdutoController,
    MarcaController,
    CategoriaController,
    FornecedorController
};

new App\Controller\ClienteController();

$url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

switch ($url) {
    case '/':
        InicialController::index();
        break;

    case '/login':
        LoginController::index();
        break;

    case '/logout':
        LoginController::logout();
        break;

    case '/cliente':
        ClienteController::index();
        break;

    case '/cliente/cadastro':
        ClienteController::cadastro();
        break;

    case '/cliente/delete':
        ClienteController::delete();
        break;

    case '/produto':
        ProdutoController::index();
        break;

    case '/produto/cadastro':
        ProdutoController::cadastro();
        break;

    case '/produto/delete':
        ProdutoController::delete();
        break;
    case '/marca':
        MarcaController::index();
        break;

    case '/marca/cadastro':
        MarcaController::cadastro();
        break;

    case '/marca/delete':
        MarcaController::delete();
        break;

    case '/categoria':
        CategoriaController::index();
        break;

    case '/categoria/cadastro':
        CategoriaController::cadastro();
        break;

    case '/categoria/delete':
        CategoriaController::delete();
        break;

    case '/fornecedor':
        FornecedorController::index();
        break;

    case '/fornecedor/cadastro':
        FornecedorController::cadastro();
        break;

    case '/fornecedor/delete':
        FornecedorController::delete();
        break;

    default:
        echo "Pagina nao encontrada";
        break;
}

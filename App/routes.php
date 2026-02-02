<?php

use App\Controller\{
    ClienteController,
    InicialController
};

new App\Controller\ClienteController();

$url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

switch ($url) {
    case '/':
        InicialController::index();
        break;

    case '/cliente':
        ClienteController::listar();
        break;

    case '/cliente/cadastro':
        ClienteController::cadastro();
        break;

    case '/cliente/delete':
        ClienteController::delete();
        break;

    default:
        echo "Pagina nao encontrada";
        break;
}

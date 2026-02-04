<?php

use App\Controller\{
    ClienteController,
    InicialController,
    LoginController
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

    default:
        echo "Pagina nao encontrada";
        break;
}

<?php

use App\Controller\ClienteController;

new App\Controller\ClienteController();

$url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

switch($url)
{
    case '/':
        echo "Pagina Inicial";
        break;

    case '/cliente':
        ClienteController::listar();
        break;
        
    case '/cliente/cadastro':
        ClienteController::cadastro();
        break;

    default:
        echo "Pagina nao encontrada";
        break;
}


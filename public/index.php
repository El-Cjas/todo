<?php
include_once "../vendor/autoload.php";

// Configuración de headers para API REST en PHP
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Authorization");
//header("Cache-Control: no-cache, no-store, must-revalidate");
header("Expires: 0");

// Tu lógica de API aquí
use App\Controllers\Controller;


$metodo = $_SERVER['REQUEST_METHOD'];
$controlador = new Controller();

switch ($metodo) {
    case 'GET':
        $controlador->index();
        break;

    case 'POST':
        $controlador->guardar();
        break;
    
    case 'PUT':
        echo 'put';
        break;
    
    case 'DELETE':
        echo 'delete';
        break;
    
    default:
        echo 'esto se ejecuta cuando no hay un metodo http compatible';
        break;
}


?>

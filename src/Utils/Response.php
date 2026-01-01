<?php

namespace App\Utils;

class Response
{
    public static function enviar($data,$codigo = 200)
    {
        // Establecer cabeceras para JSON
        header('Content-Type: application/json; charset=UTF-8');

        // Establecer código de respuesta HTTP
        http_response_code($codigo);

        // Convertir array a JSON y mostrar
        echo json_encode($data);
        exit(); // Terminar ejecución
    }

    private static function error($message, $code = 400)
    {
        self::enviar([
            "status" => "error",
            "message" => $message
        ], $code);
    }
}

// $xd = [
//     "cedula" => 30677549,
//     "nombre" => "Eberth",
//     "apellido"=> "Henriquez"
// ];

// Response::enviar($xd);

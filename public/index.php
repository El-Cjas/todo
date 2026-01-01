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
echo json_encode(["status" => "ok", "message" => "API funcionando"]);
?>

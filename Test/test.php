<?php
require_once "../vendor/autoload.php";

use App\Models\Tarea;


$xd = new Tarea();
echo "{json : xd}";

header("Content-Type: application/json; charset=UTF-8");
http_response_code();



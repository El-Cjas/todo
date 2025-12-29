<?php
require_once "../vendor/autoload.php";

use App\Models\Tarea;


$xd = new Tarea();
$xd->id = -30;
echo $xd->id;


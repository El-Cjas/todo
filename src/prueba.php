<?php

// src/helpers.php

// Definir una constante
define('MI_VERSION', '1.0.0');

// Definir una función global
if (!function_exists('saludar')) {
    function saludar($nombre) {
        echo "Hola, $nombre!";
    }
}

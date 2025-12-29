<?php
namespace App\Models\Interfaces;
interface crudInterface {
    public function crear(): bool;
    public function leer(): array;
    public function leer1(): array;
    public function actualizar(): bool;
    public function eliminar(): bool;
}

?>
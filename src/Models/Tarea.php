<?php

namespace App\Models;

use Exception;
use App\Models\Interfaces\crudInterface;


class Tarea implements crudInterface
{
    public int $id {
        set {
            if ($value < 0) {
                throw new Exception("el id no puede ser menor a cero", 1);
            }
            $this->id = $value;
        }
    }
    public $titulo;
    public $fecha;
    public $importante;
    public $estado;

    public function __construct()
    {
        $this->titulo = "";
        $this->fecha = 0;
        $this->importante = false;
        $this->estado = 0;
    }

    public function leer(): array
    {
        $sql = "SELECT * FROM tareas";
        return seleccionar($sql);
    }
    public function leer1(): array
    {
        $sql = "SELECT * FROM tareas WHERE id = :ID";

        return seleccionar($sql, [":ID" => $this->id]);
    }
    public function crear(): bool
    {
        $sql = "INSERT INTO tareas(titulo) VALUES (:titulo)";
        $parametros = [
            ":titulo" => $this->titulo
        ];
        return ejecutarSQL($sql, $parametros);
    }
    public function actualizar(): bool
    {
        $sql = "UPDATE tareas
                SET titulo = :titulo
                WHERE id = :ID";

        $parametros = [
            ":ID" => $this->id,
            ":titulo" => $this->titulo
        ];

        return ejecutarSQL($sql, $parametros);
    }
    public function eliminar(): bool
    {
        $sql = "DELETE FROM tareas WHERE id = :ID";
        $parametros = [":ID" => $this->id];
        return ejecutarSQL($sql, $parametros);
    }
}

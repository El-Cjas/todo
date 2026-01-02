<?php
namespace App\Controllers;
//include_once "../../vendor/autoload.php";
use App\Models\Tarea;
use App\Utils\Response;

class Controller
{
    private $tarea{
        get => $this->tarea = new Tarea;
    }

    public function index()
    {
        $datos = $this->tarea->leer();
        $num_registros = count($datos);

        if($num_registros > 0){
            $datos["datos"] = $this->tarea->leer();
            Response::enviar($datos);
        
        }else{
            Response::error("no hay registros disponibles");
        }
    }



    function guardar() {
        //obtenemos los datos del json recibido
        $datos = json_decode(file_get_contents("php://input"));
        print_r($datos);
        $this->tarea->titulo = $datos->titulo;

        //Response::enviar($this->tarea->crear());
    }

    public function eliminar() {
        $this->tarea->eliminar();
        
    }

    public function actualizar() {
        $this->tarea->actualizar();
    }


}

// new Controller()->guardar();

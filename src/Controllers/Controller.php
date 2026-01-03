<?php
namespace App\Controllers;
//include_once "../../vendor/autoload.php";
use App\Models\Tarea;
use App\Utils\Response;

class Controller
{
    private Tarea $tarea { 
        get => $this->tarea ??= new Tarea();
        set => $this->tarea = $value;
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
        $this->tarea->titulo = $datos->titulo;
        //print_r($this->tarea->titulo);
        //validando si tiene algun valor
        if ($this->tarea->titulo) {
            $result = $this->tarea->crear();//aqui se realiza la consulta y devuelve si fue exitoso o no
            if ($result) {
                Response::enviar($result);
            }else {
                Response::error("ha ocurrido un error, intenta nuevamente");
            }
        }else {
            Response::error("El campo de tarea no puede estar vacio");
        }
        //Response::enviar($this->tarea->crear());
    }

    public function eliminar() {
        $datos = json_decode(file_get_contents("php://input"));
        $this->tarea->id = $datos->id;
        if (isset($datos->id)) {
            $resultado = $this->tarea->eliminar();
            if ($resultado) {
                Response::enviar($resultado);
            } else {
                Response::error("ha ocurrido un error, intenta nuevamente");
            }
        }else {
            Response::error("la tarea no existe");
        }
        
    }

    public function actualizar_titulo() {
        $datos = json_decode(file_get_contents("php://input"));
        $this->tarea->id = $datos->id;
        $this->tarea->titulo = $datos->titulo;
        if (isset($datos->id)) {
            $resultado = $this->tarea->actualizar();
            if ($resultado) {
                Response::enviar($resultado);
            }
            else {
                Response::error("ha ocurrido un error, intenta nuevamente");
            }
        }else {
            Response::error("El campo de tarea no puede estar vacio");
        }

    }


    public function actualizar_estado() {
        $datos = json_decode(file_get_contents("php://input"));
        $this->tarea->id = $datos->id;
        $this->tarea->estado = $datos->estado;
        if (isset($datos->id)) {
            $resultado = $this->tarea->actualizar();
            if ($resultado) {
                Response::enviar($resultado);
            }
            else {
                Response::error("ha ocurrido un error, intenta nuevamente");
            }
        }else {
            Response::error("El campo de tarea no puede estar vacio");
        }

    }
}

// new Controller()->guardar();

<?php
use App\Config\Conexion;

function ejecutarSQL($sql, array $parametros = []) {
	/*******************************************************************************************************************************/
	/*Propósito: Ejecuta una Inserción, Actualización o Eliminación.
	/*Parametros: Cadena de caracteres.
	/*Valor de Retorno: Cadena de caracteres con el id de la transacción del manejador de base de datos, vacio en caso de fallo.
	/*******************************************************************************************************************************/
    $conn = new Conexion();
    $conn->conectar();
    $resultado = $conn->ejecutarConsulta($sql, $parametros);//por si no recuerdas que hiciste ese cambio xd
    $conn->desconectar();
    return $resultado;
}

//esta funcion esta diseñada para ejecutar selects
function seleccionar($sql, array $parametros = []): array{
    $conn = new Conexion();
    $conn->conectar();
    $resultado = $conn->consultar($sql, $parametros );
    $conn->desconectar();
    return $resultado;
}

function validarRegistro($sql, $parametros = []){
    $conn = new Conexion();
    $conn->conectar();
    $resultado = $conn->consultar($sql, $parametros);//por si no recuerdas que hiciste ese cambio xd
    $conn->desconectar();

    if($resultado){
        return $resultado;
    }else{
        return 0;
    }
}


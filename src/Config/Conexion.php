<?php
//require_once "config.php";
namespace App\Config;
use Pdo, PDOException, RuntimeException;
class Conexion{
    private $conn;

    public function conectar(){
        try {
            $pdo = new PDO("mysql:host=".HOST.";dbname=".DB_NAME.";charset=utf8mb4", USER, PASS);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->conn = $pdo;
        } catch (PDOException $error) {
            // No imprimir texto plano: propagar para que la capa API responda JSON
            throw new RuntimeException("Error de conexión a la base de datos", 0, $error);
        }
    }

    public function desconectar(){
        $this->conn = null;
    }

    function ejecutarConsulta($sql, array $parametros=[]){
        $this->conectar();
        $stmt = $this->conn->prepare($sql);
        $this->desconectar();
        return $stmt->execute($parametros);
    }
    function consultar($sql, array $parametros = []): array{
        $this->conectar();
        $stmt = $this->conn->prepare($sql);
        $stmt->execute($parametros);
        $this->desconectar();
        return $stmt->fetchAll(PDO::FETCH_CLASS,);
    }
}


?>
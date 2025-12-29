<?php
class Usuario {
    public string $nombre {
        // Se ejecuta cuando alguien lee $user->nombre
        get => strtoupper($this->nombre); 

        // Se ejecuta cuando alguien asigna $user->nombre = "valor"
        set(string $valor) => strtolower($valor);
    }
}


class Rectangulo {
    public function __construct(
        public float $ancho,
        public float $alto 
    ) {}

    // Propiedad Virtual (no existe una variable $area en memoria)
    public float $area {
        get => $this->ancho * $this->alto;
    }
}
$xd = new Rectangulo(10,20);
$hola = new Rectangulo(20,50);


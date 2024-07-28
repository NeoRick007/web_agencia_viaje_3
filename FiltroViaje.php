<?php
class FiltroViaje {
    public $nombreHotel;
    public $ciudad;
    public $pais;
    public $fechaViaje;
    public $duracionViaje;

    public function __construct($nombreHotel, $ciudad, $pais, $fechaViaje, $duracionViaje) {
        $this->nombreHotel = $nombreHotel;
        $this->ciudad = $ciudad;
        $this->pais = $pais;
        $this->fechaViaje = $fechaViaje;
        $this->duracionViaje = $duracionViaje;
    }

    public function filtrarDestinos($destinos) {
        $resultados = array_filter($destinos, function($destino) {
            return ($this->ciudad == '' || $destino['ciudad'] == $this->ciudad) && 
                   ($this->pais == '' || $destino['pais'] == $this->pais) && 
                   ($this->fechaViaje == '' || $destino['fechaViaje'] == $this->fechaViaje) && 
                   ($this->duracionViaje == 0 || $destino['duracionViaje'] == $this->duracionViaje);
        });
        return $resultados;
    }
}
?>

<?php
include 'FiltroViaje.php';

$nombreHotel = isset($_POST['nombreHotel']) ? $_POST['nombreHotel'] : '';
$ciudad = isset($_POST['ciudad']) ? $_POST['ciudad'] : '';
$pais = isset($_POST['pais']) ? $_POST['pais'] : '';
$fechaViaje = isset($_POST['fechaViaje']) ? $_POST['fechaViaje'] : '';
$duracionViaje = isset($_POST['duracionViaje']) ? (int)$_POST['duracionViaje'] : 0;

$filtro = new FiltroViaje($nombreHotel, $ciudad, $pais, $fechaViaje, $duracionViaje);

$destinos = [
    ['nombreHotel' => 'Hotel Playa', 'ciudad' => 'Pucón', 'pais' => 'Chile', 'fechaViaje' => '2024-12-01', 'duracionViaje' => 7],
    ['nombreHotel' => 'Hotel Sol', 'ciudad' => 'Pucón', 'pais' => 'Chile', 'fechaViaje' => '2024-12-15', 'duracionViaje' => 5],
    ['nombreHotel' => 'Hotel Mar', 'ciudad' => 'Santiago', 'pais' => 'Chile', 'fechaViaje' => '2024-11-20', 'duracionViaje' => 3],
    // Agrega más destinos según sea necesario
];

$resultados = $filtro->filtrarDestinos($destinos);

function mostrarResultados($resultados) {
    if (empty($resultados)) {
        echo "<p>No se encontraron destinos que coincidan con su búsqueda.</p>";
    } else {
        echo "<ul>";
        foreach ($resultados as $destino) {
            echo "<li>{$destino['nombreHotel']} en {$destino['ciudad']}, {$destino['pais']} desde {$destino['fechaViaje']} por {$destino['duracionViaje']} días</li>";
        }
        echo "</ul>";
    }
}

mostrarResultados($resultados);
?>

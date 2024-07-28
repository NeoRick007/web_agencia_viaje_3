<?php
function mostrarNotificacion($mensaje) {
    echo "<script type='text/javascript'>alert('$mensaje');</script>";
}

$ofertaEspecial = "¡Oferta especial! 20% de descuento en todos los paquetes turísticos.";
mostrarNotificacion($ofertaEspecial);
?>

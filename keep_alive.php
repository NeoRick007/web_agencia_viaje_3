<?php
// keep_alive.php
session_start();
// Actualizar la última actividad de la sesión
$_SESSION['LAST_ACTIVITY'] = time();
?>

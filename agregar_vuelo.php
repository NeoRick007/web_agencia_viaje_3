<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "AGENCIA";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

$origen = $_POST['origen'];
$destino = $_POST['destino'];
$fecha = $_POST['fecha'];
$plazas_disponibles = $_POST['plazas_disponibles'];
$precio = $_POST['precio'];

$sql = "INSERT INTO VUELO (origen, destino, fecha, plazas_disponibles, precio) VALUES ('$origen', '$destino', '$fecha', $plazas_disponibles, $precio)";

if ($conn->query($sql) === TRUE) {
    echo "Nuevo vuelo agregado exitosamente";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>

<a href="Formulario_vuelos_hoteles.html"><input type="button" value="Volver a reservas"></a>
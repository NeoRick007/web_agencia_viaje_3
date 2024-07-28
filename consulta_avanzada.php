<?php
// Datos de conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "AGENCIA";

// Crear la conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Obtener el nombre del hotel desde el formulario
$hotel_nombre = $_POST['hotel_nombre'];

// Consulta SQL avanzada
$sql = "SELECT h.nombre, COUNT(r.id_reserva) AS num_reservas
        FROM HOTEL h
        JOIN RESERVA r ON h.id_hotel = r.id_hotel
        WHERE h.nombre LIKE ?
        GROUP BY h.id_hotel
        HAVING num_reservas > 2";

$stmt = $conn->prepare($sql);
$hotel_param = "%$hotel_nombre%";
$stmt->bind_param("s", $hotel_param);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    echo "<div class='result-container'><h2>Resultados de la consulta</h2><ul>";
    while ($row = $result->fetch_assoc()) {
        echo "<li>Hotel: " . $row["nombre"] . " - Número de reservas: " . $row["num_reservas"] . "</li>";
    }
    echo "</ul></div>";
} else {
    echo "<div class='result-container'><h2>No se encontraron resultados</h2></div>";
}

$stmt->close();
$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Resultados de la Consulta Avanzada</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f9;
            color: #333;
        }

        .result-container {
            background-color: #fff;
            padding: 20px;
            margin: 20px auto;
            width: 90%;
            max-width: 600px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            text-align: center;
        }

        .result-container ul {
            list-style: none;
            padding: 0;
        }

        .result-container li {
            padding: 10px;
            border-bottom: 1px solid #ddd;
            background-color: #f9f9f9;
            margin-bottom: 10px;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .result-container li:last-child {
            border-bottom: none;
        }

        .result-container li:hover {
            background-color: #f1f1f1;
        }

        footer {
            text-align: center;
            padding: 10px 0;
            background-color: #4CAF50;
            color: white;
            position: fixed;
            width: 100%;
            bottom: 0;
            box-shadow: 0 -2px 4px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body>
    <footer>
        <p>&copy; 2024 Agencia de Viajes</p>
    </footer>
</body>
</html>

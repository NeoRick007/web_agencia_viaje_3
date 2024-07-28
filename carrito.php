<?php
session_start();

// Inicializa el carrito de compras si no existe
if (!isset($_SESSION['carrito'])) {
    $_SESSION['carrito'] = [];
}

// Procesa la adición de paquetes al carrito
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['package_id'])) {
    $package_id = $_POST['package_id'];
    $packages = [
        'Cartagena' => 500,
        'San Andrés' => 600,
        'Medellín' => 450,
        'Bogotá' => 550,
        'Lima' => 700,
        'Buenos Aires' => 800,
        'Santiago' => 650,
        'Montevideo' => 750,
        'Río de Janeiro' => 900,
        'La Paz' => 400
    ];

    if (isset($packages[$package_id])) {
        $_SESSION['carrito'][] = ['id' => $package_id, 'precio' => $packages[$package_id]];
    }
}

// Procesa la limpieza del carrito
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['action']) && $_POST['action'] == 'clear') {
    $_SESSION['carrito'] = [];
}

$total = 0;
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Estilos.css">
    <title>Carrito de Compras</title>
    <style>
        .cart-container {
            background-color: #fff;
            padding: 20px;
            margin: 20px auto;
            width: 90%;
            max-width: 600px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
        }

        .cart-container h2, .cart-container h3 {
            margin-top: 0;
        }

        .cart-container ul {
            list-style: none;
            padding: 0;
        }

        .cart-container li {
            padding: 10px;
            border-bottom: 1px solid #ddd;
            background-color: #f9f9f9;
            margin-bottom: 10px;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .cart-container li:last-child {
            border-bottom: none;
        }

        .cart-container button {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            margin-top: 10px;
        }

        .cart-container button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <header>
        <h1>Carrito de Compras</h1>
    </header>

    <main>
        <div class="cart-container">
            <h2>Paquetes en tu carrito</h2>
            <?php if (empty($_SESSION['carrito'])): ?>
                <p>Tu carrito está vacío.</p>
            <?php else: ?>
                <ul>
                    <?php foreach ($_SESSION['carrito'] as $item): ?>
                        <li><?php echo $item['id'] . " - $" . $item['precio']; ?></li>
                        <?php $total += $item['precio']; ?>
                    <?php endforeach; ?>
                </ul>
                <h3>Total: $<?php echo $total; ?></h3>
            <?php endif; ?>

            <h3>Destinos Disponibles:</h3>
            <div class="cinta-opciones">
                <button id="destino-cartagena" class="opcion" onclick="seleccionarDestinoCarrito('Cartagena')">Cartagena - $500</button>
                <button id="destino-san-andres" class="opcion" onclick="seleccionarDestinoCarrito('San Andrés')">San Andrés - $600</button>
                <button id="destino-medellin" class="opcion" onclick="seleccionarDestinoCarrito('Medellín')">Medellín - $450</button>
                <button id="destino-bogota" class="opcion" onclick="seleccionarDestinoCarrito('Bogotá')">Bogotá - $550</button>
                <button id="destino-lima" class="opcion" onclick="seleccionarDestinoCarrito('Lima')">Lima - $700</button>
                <button id="destino-buenos-aires" class="opcion" onclick="seleccionarDestinoCarrito('Buenos Aires')">Buenos Aires - $800</button>
                <button id="destino-santiago" class="opcion" onclick="seleccionarDestinoCarrito('Santiago')">Santiago - $650</button>
                <button id="destino-montevideo" class="opcion" onclick="seleccionarDestinoCarrito('Montevideo')">Montevideo - $750</button>
                <button id="destino-rio-de-janeiro" class="opcion" onclick="seleccionarDestinoCarrito('Río de Janeiro')">Río de Janeiro - $900</button>
                <button id="destino-la-paz" class="opcion" onclick="seleccionarDestinoCarrito('La Paz')">La Paz - $400</button>
            </div>

            <div class="add-to-cart">
                <h2>Agrega un paquete al carrito</h2>
                <form method="post" action="carrito.php">
                    <label for="package_id">Nombre del Paquete:</label>
                    <input type="text" name="package_id" id="package_id" required>
                    <button type="submit">Añadir al carrito</button>
                </form>
                <form method="post" action="carrito.php">
                    <button type="submit" name="action" value="clear">Limpiar Carrito</button>
                </form>
            </div>

            <a href="index.html">Seguir comprando</a>
        </div>
    </main>

    <script>
        function seleccionarDestinoCarrito(destino) {
            document.getElementById('package_id').value = destino;
        }
    </script>
</body>
</html>

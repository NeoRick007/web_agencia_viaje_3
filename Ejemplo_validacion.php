<?php
// Ejemplo de validación y escapado de entradas
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars(trim($_POST["name"]));
    $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
    $message = htmlspecialchars(trim($_POST["message"]));

    if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
        echo "Email inválido.";
    } else {
        // Proceder con el procesamiento seguro de datos
    }
}

// Configuración para almacenar sesiones de manera segura
session_save_path('/path/to/secure/directory');
session_start();

// Redirigir todas las solicitudes HTTP a HTTPS
if (!isset($_SERVER['HTTPS']) || $_SERVER['HTTPS'] !== 'on') {
    header("Location: https://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']);
    exit();
}

// Configurar la duración de la cookie de sesión a 1 hora (3600 segundos)
session_set_cookie_params(3600);
session_start();

session_start();

// Configurar la duración de la cookie de sesión
session_set_cookie_params(3600);

// Regenerar el ID de la sesión si ha pasado mucho tiempo desde la última actividad
if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 1800)) {
    session_regenerate_id(true);    // Regenerar la sesión para evitar la fijación de sesión
}
$_SESSION['LAST_ACTIVITY'] = time();










?>

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

?>
<?php
// Definir variables para los mensajes de éxito y error
$successMessage = '';
$errorMessage = '';

// Procesar los datos del formulario cuando se envíen
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recoger los datos del formulario
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $message = htmlspecialchars($_POST['message']);
    
    // Validar los datos del formulario
    if (empty($name) || empty($email) || empty($message)) {
        $errorMessage = 'Todos los campos son obligatorios.';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errorMessage = 'Por favor, introduce un correo electrónico válido.';
    } else {
        // Aquí puedes agregar la lógica para enviar el correo
        $to = 'tucorreo@dominio.com'; // Cambia esta dirección por la tuya
        $subject = 'Sugerencia del usuario';
        $headers = "From: $email\r\n";
        $headers .= "Reply-To: $email\r\n";
        $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";
        
        $mailBody = "Nombre: $name\n";
        $mailBody .= "Correo: $email\n\n";
        $mailBody .= "Mensaje:\n$message";
        
        // Enviar el correo
        if (mail($to, $subject, $mailBody, $headers)) {
            $successMessage = '¡Gracias por tu sugerencia! Nos pondremos en contacto contigo pronto.';
        } else {
            $errorMessage = 'Hubo un problema al enviar tu sugerencia. Por favor, intenta nuevamente más tarde.';
        }
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Sugerencias</title>
    <link rel="stylesheet" href="styles.css"> 
</head>
<body>
    <div class="container">
        <h1>Envía tu Sugerencia</h1>

        <!-- Mensajes de éxito o error -->
        <?php if ($successMessage): ?>
            <div class="success"><?php echo $successMessage; ?></div>
        <?php endif; ?>

        <?php if ($errorMessage): ?>
            <div class="error"><?php echo $errorMessage; ?></div>
        <?php endif; ?>

        <!-- Formulario de contacto -->
        <form action="contacto.php" method="POST">
            <div>
                <label for="name">Nombre:</label>
                <input type="text" id="name" name="name" required>
            </div>
            <div>
                <label for="email">Correo Electrónico:</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div>
                <label for="message">Sugerencia:</label>
                <textarea id="message" name="message" rows="5" required></textarea>
            </div>
            <div>
                <button type="submit">Enviar</button>
            </div>
        </form>
    </div>
</body>
</html>

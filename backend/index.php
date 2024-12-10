<?php

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Authorization");
// Verifica si se hace una solicitud GET para generar la contraseña
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['length'])) {
    $length = (int)$_GET['length'];
    $includeUppercase = isset($_GET['include-uppercase']) && $_GET['include-uppercase'] === 'true';
    $includeNumbers = isset($_GET['include-numbers']) && $_GET['include-numbers'] === 'true';
    $includeSymbols = isset($_GET['include-symbols']) && $_GET['include-symbols'] === 'true';

    $lowercaseChars = 'abcdefghijklmnopqrstuvwxyz';
    $uppercaseChars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $numberChars = '0123456789';
    $symbolChars = '!@#$%^&*()_+-=[]{}|;:,.<>?';

    // Combina los caracteres posibles según las opciones seleccionadas
    $charset = $lowercaseChars;
    if ($includeUppercase) $charset .= $uppercaseChars;
    if ($includeNumbers) $charset .= $numberChars;
    if ($includeSymbols) $charset .= $symbolChars;

    // Generar la contraseña
    $password = '';
    for ($i = 0; $i < $length; $i++) {
        $password .= $charset[rand(0, strlen($charset) - 1)];
    }

    // Devolver la contraseña como respuesta JSON
    echo json_encode(['password' => $password]);
    exit;
}

echo "Backend funcionando correctamente";
?>

<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $userInput = $_POST['captcha'];
    if (isset($_SESSION['captcha']) && $userInput == $_SESSION['captcha']) {
        echo "CAPTCHA verification successful!";
    } else {
        echo "CAPTCHA verification failed. <a href='index.php'>Try again</a>.";
    }
    // Limpiar la sesión del CAPTCHA después de la verificación
    unset($_SESSION['captcha']);
} else {
    echo "Invalid request.";
}
?>

<?php
session_start();
include 'conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Consulta para verificar las credenciales del administrador
    $sql = "SELECT * FROM Administradores WHERE email = '$email' AND contrasena = '$password'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        // Credenciales válidas
        $_SESSION['email'] = $email;
        $_SESSION['admin_logged_in'] = true;
        $_SESSION['welcome_message'] = "¡Bienvenido, " . $email . "!";
        header("Location: ../views/index.php");
        // Redireccionar a la página principal después del inicio de sesión exitoso
        exit();
    } else {
        // Credenciales inválidas
        $_SESSION['login_error'] = "Credenciales incorrectas. Por favor, inténtalo de nuevo.";
        header("Location: ../views/login.php"); // Redireccionar de nuevo a la página de inicio de sesión
        exit();
    }
}
?>

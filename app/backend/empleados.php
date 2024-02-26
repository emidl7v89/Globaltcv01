<?php
//empleados.php - Este archivo manejará las operaciones CRUD de empleados

session_start();

// Conexión a la base de datos
include 'conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validar si se ha enviado una solicitud POST

    // Crear un nuevo empleado
    if ($_POST['action'] == 'create') {
        $nombre = $_POST['nombre'];
        $apellido_paterno = $_POST['apellido_paterno'];
        $apellido_materno = $_POST['apellido_materno'];
        $correo = $_POST['correo'];
        $contrasena = $_POST['contrasena'];

        // Insertar el nuevo empleado en la base de datos
        $sql = "INSERT INTO Empleados (nombre, apellido_paterno, apellido_materno, correo, contrasena)
                VALUES ('$nombre', '$apellido_paterno', '$apellido_materno', '$correo', '$contrasena')";

        if ($conn->query($sql) === TRUE) {
            $_SESSION['success_message'] = "¡Empleado creado exitosamente!";
            header("Location: empleados.php");
            exit();
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
}
?>

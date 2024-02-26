<?php
$servername = "localhost"; 
$username = "globaltc_usuario"; 
$password = "global_password123";
$database = "globaltc"; 

// Crear conexión
$conn = new mysqli($servername, $username, $password, $database);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

echo "Conexión exitosa"; 
?>

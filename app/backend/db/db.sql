-- Crear la base de datos
CREATE DATABASE IF NOT EXISTS `globaltc`;

-- Usar la base de datos
USE `globaltc`;

-- Crear usuario y contraseña
CREATE USER 'globaltc_usuario'@'localhost' IDENTIFIED BY 'global_password123';

-- Otorgar todos los privilegios al usuario en la base de datos
GRANT ALL PRIVILEGES ON `globaltc`.* TO 'globaltc_usuario'@'localhost';

-- Aplicar los cambios
-- FLUSH PRIVILEGES;

-- Tabla para Administradores
CREATE TABLE Administradores (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(255) NOT NULL,
    apellido_paterno VARCHAR(255) NOT NULL,
    apellido_materno VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    contrasena VARCHAR(255) NOT NULL,
    UNIQUE(email)
);

-- Tabla para Empleados
CREATE TABLE Empleados (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(255) NOT NULL,
    apellido_paterno VARCHAR(255) NOT NULL,
    apellido_materno VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    contrasena VARCHAR(255) NOT NULL,
    status ENUM('activo', 'inactivo') DEFAULT 'activo',
    fecha_registro TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    UNIQUE(email)
);

-- Tabla para Servicios
CREATE TABLE Servicios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(255) NOT NULL,
    descripcion TEXT,
    costo DECIMAL(10, 2) NOT NULL,
    status ENUM('activo', 'inactivo') DEFAULT 'activo'
);

-- Tabla para Operaciones
CREATE TABLE Operaciones (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre_cliente VARCHAR(255) NOT NULL,
    telefono_cliente VARCHAR(20) NOT NULL,
    id_servicio INT,
    costo_servicio DECIMAL(10, 2) NOT NULL,
    descripcion TEXT,
    total DECIMAL(10, 2) NOT NULL,
    status ENUM('entregado', 'pendiente') DEFAULT 'pendiente',
    FOREIGN KEY (id_servicio) REFERENCES Servicios(id)
);

-- Tabla para Productos (Inventario)
CREATE TABLE Productos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre_producto VARCHAR(255) NOT NULL,
    descripcion TEXT,
    cantidad INT NOT NULL,
    precio DECIMAL(10, 2) NOT NULL,
    status ENUM('activo', 'inactivo') DEFAULT 'activo'
);

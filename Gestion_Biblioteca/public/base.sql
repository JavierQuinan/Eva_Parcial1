/*-- Crear la base de datos
CREATE DATABASE IF NOT EXISTS Biblioteca;

-- Usar la base de datos
USE Biblioteca;

-- Crear la tabla Libros
CREATE TABLE Libros (
    libro_id INT PRIMARY KEY AUTO_INCREMENT,
    titulo VARCHAR(255) NOT NULL,
    autor VARCHAR(255) NOT NULL,
    genero VARCHAR(100),
    anio_publicacion INT
);

-- Crear la tabla Miembros
CREATE TABLE Miembros (
    miembro_id INT PRIMARY KEY AUTO_INCREMENT,
    nombre VARCHAR(255) NOT NULL,
    apellido VARCHAR(255) NOT NULL,
    email VARCHAR(255) UNIQUE NOT NULL,
    fecha_suscripcion DATE NOT NULL
);

-- Crear la tabla Prestamos
CREATE TABLE Prestamos (
    prestamo_id INT PRIMARY KEY AUTO_INCREMENT,
    libro_id INT NOT NULL,
    miembro_id INT NOT NULL,
    fecha_prestamo DATE NOT NULL,
    fecha_devolucion DATE,
    FOREIGN KEY (libro_id) REFERENCES Libros(libro_id),
    FOREIGN KEY (miembro_id) REFERENCES Miembros(miembro_id)
);

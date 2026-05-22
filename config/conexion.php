<?php
$conexion = new mysqli("localhost", "root", "", "tarea4");

if ($conexion->connect_error) {
    die("Error de conexión");
}
?>
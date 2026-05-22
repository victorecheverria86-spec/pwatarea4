<?php
session_start();
include("../config/conexion.php");

$t = $_POST['tarea'];
$id = $_SESSION['usuario']['id'];

$conexion->query("INSERT INTO tareas (descripcion, estado, usuario_id)
VALUES ('$t','pendiente',$id)");

header("Location: dashboard.php");
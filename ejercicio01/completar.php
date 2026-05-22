<?php
include("../config/conexion.php");

$id = $_GET['id'];

$conexion->query("UPDATE tareas SET estado='completado' WHERE id=$id");

header("Location: dashboard.php");
<?php
session_start();
include("../config/conexion.php");

if(isset($_SESSION['usuario']) && $_SESSION['usuario']['rol']=="admin"){
    $id=$_GET['id'];
    $conexion->query("DELETE FROM tareas WHERE id=$id");
}

header("Location: dashboard.php");
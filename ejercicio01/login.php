<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

session_start();
include("../config/conexion.php");

if ($_POST) {
    $correo = $_POST['correo'];
    $clave = $_POST['clave'];

    $sql = "SELECT * FROM usuarios WHERE correo='$correo' AND clave='$clave'";
    $res = $conexion->query($sql);

    if ($res && $res->num_rows > 0) {
        $_SESSION['usuario'] = $res->fetch_assoc();
        header("Location: dashboard.php");
        exit();
    } else {
        echo "❌ Error login";
    }
}
?>

<h2>Tarea 4 - Login</h2>

<form method="POST">
<input name="correo" placeholder="Correo"><br><br>
<input type="password" name="clave" placeholder="Clave"><br><br>
<button>Entrar</button>
</form>
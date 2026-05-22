<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

session_start();
include("../config/conexion.php");

if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
    exit();
}

$user = $_SESSION['usuario'];
$id = $user['id'];

$tareas = $conexion->query("SELECT * FROM tareas WHERE usuario_id=$id");
?>

<h2>Bienvenido <?php echo $user['nombre']; ?></h2>

<form action="agregar.php" method="POST">
<input name="tarea" placeholder="Nueva tarea">
<button>Agregar</button>
</form>

<hr>

<?php while($t = $tareas->fetch_assoc()) { ?>
<p>
<?php echo $t['descripcion']; ?> (<?php echo $t['estado']; ?>)

<a href="completar.php?id=<?php echo $t['id']; ?>">✔</a>

<?php if($user['rol']=="admin") { ?>
<a href="eliminar.php?id=<?php echo $t['id']; ?>">❌</a>
<?php } ?>

</p>
<?php } ?>
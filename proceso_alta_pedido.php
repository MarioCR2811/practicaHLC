<?php
require_once("funcionesBD.php");
$conexion = obtenerConexion();

// Recuperar parámetros
$fecha = $_POST['txtFecha'];
$descripcion = $_POST['txtDescripcion'];
$total = $_POST['txtPrecio'];
$idCliente = $_POST['lstCliente'];

// No validamos, suponemos que la entrada de datos es correcta

// Definir insert
$sql = "INSERT INTO pedido(`order_id`, `order_date`, `order_description`, `order_total_amount`, `customer_id`) VALUES (null, '" . $fecha . "', '" . $descripcion . "', $total, $idCliente);"; 

// Ejecutar consulta
$resultado = mysqli_query($conexion, $sql);

// Verificar si hay error y almacenar mensaje
if (mysqli_errno($conexion) != 0) {
    $numerror = mysqli_errno($conexion);
    $descrerror = mysqli_error($conexion);
    $mensaje =  "<h2 class='text-center mt-5'>Se ha producido un error numero $numerror que corresponde a: $descrerror </h2>";
} else {
    $mensaje =  "<h2 class='text-center mt-5'>Pedido insertado</h2>"; 
}
// Redireccionar tras 5 segundos al index.
// Siempre debe ir antes de DOCTYPE
header("refresh:5;url=index.php"    );
?>

<?php
include_once("cabecera.html");

// Mostrar mensaje calculado antes
echo $mensaje;

?>
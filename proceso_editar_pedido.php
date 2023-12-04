<?php
require_once("funcionesBD.php");
$conexion = obtenerConexion();

// Recuperar parámetros del formulario
$idpedido = $_POST['idpedido'];
$descripcion = $_POST['txtModDescripcion'];
$fecha = $_POST['txtModFecha'];
$precio = $_POST['txtModPrecio'];
$idcliente = $_POST['lstClienteMod'];

// No validamos, suponemos que la entrada de datos es correcta

// Definir consulta de actualización
$sql = "UPDATE pedido SET order_description = '$descripcion', order_date = '$fecha', order_total_amount = $precio, customer_id = $idcliente WHERE order_id = $idpedido";

// Ejecutar consulta
$resultado = mysqli_query($conexion, $sql);

// Verificar si hay error y almacenar mensaje
if (mysqli_errno($conexion) != 0) {
    $numerror = mysqli_errno($conexion);
    $descrerror = mysqli_error($conexion);
    $mensaje = "<h2 class='text-center mt-5'>Se ha producido un error número $numerror que corresponde a: $descrerror </h2>";
} else {
    $mensaje = "<h2 class='text-center mt-5'>Pedido actualizado</h2>"; 
}

// Incluir la cabecera HTML
include_once("cabecera.html");

// Mostrar mensaje calculado antes
echo $mensaje;
?>

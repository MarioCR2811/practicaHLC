<?php
require_once("funcionesBD.php");
$conexion = obtenerConexion();

// Recuperar parámetro
$idpedido = $_GET['txtIDPedido'];

$sql = "SELECT * FROM pedido WHERE order_id = $idpedido;";

$resultado = mysqli_query($conexion, $sql);

// Pedir una fila
$fila = mysqli_fetch_assoc($resultado);

if($fila){ // Mostrar tabla de datos

    $mensaje = "<h2 class='text-center'>Pedido localizado</h2>";
    $mensaje .= "<table class='table'>";
    $mensaje .= "<thead><tr><th>ID PEDIDO</th><th>DESCRIPCION</th><th>FECHA</th><th>CANTIDAD TOTAL</th><th>ID CLIENTE</th></tr></thead>";
    $mensaje .= "<tbody><tr>";
    $mensaje .= "<td>" . $fila['order_id'] . "</td>";
    $mensaje .= "<td>" . $fila['order_description'] . "</td>";
    $mensaje .= "<td>" . $fila['order_date'] . "</td>";
    $mensaje .= "<td>" . $fila['order_total_amount'] . "</td>";
    $mensaje .= "<td>" . $fila['customer_id'] . "</td>";

    // Formulario en la celda para procesar borrado del registro
    $mensaje .= "<td><form action='proceso_borrar_pedido.php' method='post'>";
    // input hidden para enviar idcomponente a borrar
    $mensaje .= "<input type='hidden' name='idpedido' value='$idpedido'/>";  
    $mensaje .= "<input type='submit' value='Borrar' class='btn btn-primary'/> </form> </td>";

    $mensaje .= "</tr></tbody></table>";
    
} else { // No hay datos
   $mensaje = "<h2 class='text-center mt-5'>El pedido con id $idpedido no está registrado</h2>";
}

// Insertamos cabecera
include_once("cabecera.html");

// Mostrar mensaje calculado antes
echo $mensaje;

?>

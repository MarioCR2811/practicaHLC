<?php
require_once("funcionesBD.php");
$conexion = obtenerConexion();

$sql = "SELECT * FROM pedido;";

// Ejecutar consulta
$resultado = mysqli_query($conexion, $sql);

// Montar tabla
$mensaje = "<h2 class='text-center'>Listado de todos los pedidos</h2>";
$mensaje .= "<table class='table table-striped'>";
$mensaje .= "<thead><tr><th>ID PEDIDO</th><th>DESCRIPCION</th><th>FECHA</th><th>PRECIO TOTAL</th><th>ID CLIENTE</th><th>ACCIÓN</th></tr></thead>";
$mensaje .= "<tbody>";

// Recorrer filas
while ($fila = mysqli_fetch_assoc($resultado)) {
    $mensaje .= "<tr><td>" . $fila['order_id'] . "</td>";
    $mensaje .= "<td>" . $fila['order_description'] . "</td>";
    $mensaje .= "<td>" . $fila['order_date'] . "</td>";
    $mensaje .= "<td>" . $fila['order_total_amount'] . "</td>";
    $mensaje .= "<td>" . $fila['customer_id'] . "</td>";

    $mensaje .= "<td><form class='d-inline me-1' action='editar_pedido.php' method='post'>";
    $mensaje .= "<input type='hidden' name='pedido' value='" . htmlspecialchars(json_encode($fila), ENT_QUOTES) . "' />";
    $mensaje .= "<button name='Editar' class='btn btn-primary'><i class='bi bi-pencil-square'></i></button></form>";

    $mensaje .= "<form class='d-inline' action='proceso_borrar_pedido.php' method='post'>";
    $mensaje .= "<input type='hidden' name='idpedido' value='" . $fila['order_id']  . "' />";
    $mensaje .= "<button name='Borrar' class='btn btn-danger'><i class='bi bi-trash'></i></button></form>";

    $mensaje .= "</td></tr>";
}

// Cerrar tabla
$mensaje .= "</tbody></table>";

// Insertamos cabecera
include_once("cabecera.html");

// Mostrar mensaje calculado antes
echo $mensaje;
?>

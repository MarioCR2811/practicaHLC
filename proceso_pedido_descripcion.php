<?php
require_once("funcionesBD.php");
$conexion = obtenerConexion();

// Recuperar parámetro
$descripcion = $_GET['lstDescripcion'];

$sql = "SELECT * FROM pedido WHERE order_description = '$descripcion';";

$resultado = mysqli_query($conexion, $sql);

// Mostrar tabla de datos
if ($resultado) {
    $mensaje = "<h2 class='text-center'>Pedidos localizados</h2>";
    $mensaje .= "<table class='table'>";
    $mensaje .= "<thead><tr><th>ID PEDIDO</th><th>DESCRIPCION</th><th>FECHA</th><th>CANTIDAD TOTAL</th><th>ID CLIENTE</th><th>Acción</th></tr></thead>";
    $mensaje .= "<tbody>";

    while ($fila = mysqli_fetch_assoc($resultado)) {
        $mensaje .= "<tr>";
        $mensaje .= "<td>" . $fila['order_id'] . "</td>";
        $mensaje .= "<td>" . $fila['order_description'] . "</td>";
        $mensaje .= "<td>" . $fila['order_date'] . "</td>";
        $mensaje .= "<td>" . $fila['order_total_amount'] . "</td>";
        $mensaje .= "<td>" . $fila['customer_id'] . "</td>";

        // Formulario en la celda para procesar borrado del registro
        $mensaje .= "<td><form action='proceso_borrar_pedido.php' method='post'>";
        // input hidden para enviar idpedido a borrar
        $mensaje .= "<input type='hidden' name='idpedido' value='" . $fila['order_id'] . "'/>";
        $mensaje .= "<input type='submit' value='Borrar' class='btn btn-primary'/></form></td>";

        $mensaje .= "</tr>";
    }

    $mensaje .= "</tbody></table>";
} else {
    // No hay datos o hay un error en la consulta
    $mensaje = "<h2 class='text-center mt-5'>No se encontraron pedidos con la descripción: $descripcion</h2>";
}

// Insertamos cabecera
include_once("cabecera.html");

// Mostrar mensaje calculado antes
echo $mensaje;
?>

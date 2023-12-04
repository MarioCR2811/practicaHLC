<?php
require_once("funcionesBD.php");

$conexion = obtenerConexion();

$sql = "SELECT customer_id, customer_name FROM cliente;";

$resultado = mysqli_query($conexion, $sql);

$options = "";
while ($fila = mysqli_fetch_assoc($resultado)) {
    $options .= " <option value='" . $fila["customer_id"] . "'>" . $fila["customer_name"] . "</option>";
}

?>

<?php
include_once("cabecera.html");
?>

<div class="container" id="formularios">
    <div class="row">
        <form class="form-horizontal" name="frmAltaPedido" id="frmAltaPedido" action="proceso_alta_pedido.php" method="post">
            <fieldset>
                <!-- Form Name -->
                <legend>Alta de Pedido</legend>
                <!-- Text input-->
                <div class="form-group">
                    <label class="col-xs-4 control-label" for="txtDescripcion">Descripcion</label>
                    <div class="col-xs-4">
                        <input id="txtDescripcion" name="txtDescripcion" placeholder="Descripcion del pedido"
                            class="form-control input-md" type="text">
                    </div>
                </div>
                <!-- Text input-->
                <div class="form-group">
                    <label class="col-xs-4 control-label" for="txtFecha">Fecha</label>
                    <div class="col-xs-4">
                        <input id="txtFecha" name="txtFecha" placeholder="Fecha del pedido"
                            class="form-control input-md" type="date">
                    </div>
                </div>
                <!-- Text input-->
                <div class="form-group">
                    <label class="col-xs-4 control-label" for="txtPrecio">Precio Total</label>
                    <div class="col-xs-4">
                        <input id="txtPrecio" name="txtPrecio" placeholder="Precio total del pedido"
                            class="form-control input-md" type="number">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-4 control-label" for="lstCliente">Cliente</label>
                    <div class="col-xs-4">
                        <select class="form-select" name="lstCliente" id="lstCliente">
                            <?php echo $options; ?>
                        </select>
                    </div>
                </div>
                <!-- Button -->
                <div class="form-group">
                    <label class="col-xs-4 control-label" for="btnAceptarAltaPedido"></label>
                    <div class="col-xs-4">
                        <input type="submit" id="btnAceptarAltaPedido" name="btnAceptarAltaPedido"
                            class="btn btn-primary" value="Aceptar" />
                    </div>
                </div>
            </fieldset>
        </form>
    </div>
</div>
</body>

</html>
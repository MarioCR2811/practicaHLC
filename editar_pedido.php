<?php

// Recupero datos de parametro en forma de array asociativo
$pedido = json_decode($_POST['pedido'], true);

require_once("funcionesBD.php");
$conexion = obtenerConexion();

$sql = "SELECT customer_id, customer_name FROM cliente;";

$resultado = mysqli_query($conexion, $sql);

$options = "";
while ($fila = mysqli_fetch_assoc($resultado)) {
    // Si coincide el cliente con el del pedido es el que debe aparecer seleccionado (selected)
    if ($fila['customer_id'] == $pedido['customer_id']) {
        $options .= " <option selected value='" . $fila["customer_id"] . "'>" . $fila["customer_name"] . "</option>";
    } else {
        $options .= " <option value='" . $fila["customer_id"] . "'>" . $fila["customer_name"] . "</option>";
    }
}

// Cabecera HTML que incluye navbar
include_once("cabecera.html");
?>

<div class="container" id="formularios">
    <div class="row">
        <form class="form-horizontal" name="frmEditarPedido" id="frmEditarPedido" action="proceso_editar_pedido.php"
            method="post">
            <fieldset>
                <!-- Form Name -->
                <legend>Edición de Pedido</legend>
                <!-- Text input-->
                <input value="<?php echo $pedido['order_id']?>" type='hidden' name='idpedido' id='idpedido' />
                <!-- Text input-->
                <div class="form-group">
                    <label class="col-xs-4 control-label" for="txtModDescripcion">Descripción</label>
                    <div class="col-xs-4">
                        <input id="txtModDescripcion" name="txtModDescripcion" placeholder="Descripción del pedido"
                            class="form-control input-md" type="text"
                            value="<?php echo $pedido['order_description']; ?>">
                    </div>
                </div>
                <!-- Text input-->
                <div class="form-group">
                    <label class="col-xs-4 control-label" for="txtModFecha">Fecha</label>
                    <div class="col-xs-4">
                        <input id="txtModFecha" name="txtModFecha" placeholder="Fecha" class="form-control input-md"
                            type="date" value="<?php echo $pedido['order_date']; ?>">
                    </div>
                </div>
                <!-- Text input-->
                <div class="form-group">
                    <label class="col-xs-4 control-label" for="txtModPrecio">Precio</label>
                    <div class="col-xs-4">
                        <input id="txtModPrecio" name="txtModPrecio" placeholder="Precio total"
                            class="form-control input-md" type="number"
                            value="<?php echo $pedido['order_total_amount']; ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-4 control-label" for="lstClienteMod">Cliente</label>
                    <div class="col-xs-4">
                        <select class="form-select" name="lstClienteMod" id="lstClienteMod">
                            <?php echo $options; ?>
                        </select>
                    </div>
                </div>
                <!-- Button -->
                <div class="form-group">
                    <label class="col-xs-4 control-label" for="btnAceptarModificacionPedido"></label>
                    <div class="col-xs-4">
                        <input type="submit" id="btnAceptarModificacionPedido" name="btnAceptarModificacionPedido"
                            class="btn btn-primary" value="Modificar" />
                    </div>
                </div>
            </fieldset>
        </form>

    </div>
</div>
</body>

</html>
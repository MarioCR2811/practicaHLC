<?php
require_once("funcionesBD.php");

$conexion = obtenerConexion();

$sql = "SELECT DISTINCT(order_description) FROM pedido;";

$resultado = mysqli_query($conexion, $sql);

$options = "";
while ($fila = mysqli_fetch_assoc($resultado)) {
    $options .= " <option value='" . $fila["order_description"] . "'>" . $fila["order_description"] . "</option>";
}

?>

<?php
include_once("cabecera.html");
?>

<div class="container" id="formularios">
    <div class="row">
    <form class="form-horizontal" name="frmBuscarPedidoDescripcion" id="frmBuscarPedidoDescripcion" action="proceso_pedido_descripcion.php" method="get">
				<fieldset>
					<!-- Form Name -->
					<legend>Buscar pedidos por Descripcion</legend>
					<div class="form-group">
						<label class="col-xs-4 control-label" for="lstDescripcion">Descripcion</label>
						<div class="col-xs-4">
							<select  class="form-select" name="lstDescripcion" id="lstDescripcion">
								<?php echo $options; ?>
							</select>
						</div>
					</div>
					<!-- Button -->
					<div class="form-group">
						<label class="col-xs-4 control-label" for="btnAceptarBuscarPedidoDescripcion"></label>
						<div class="col-xs-4">
							<input type="submit" id="btnAceptarBuscarPedidoDescripcion" name="btnAceptarBuscarPedidoDescripcion"
								class="btn btn-primary" value="Aceptar" />
						</div>
					</div>
				</fieldset>
			</form>
    </div>
</div>
</body>

</html>
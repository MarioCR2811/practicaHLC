<?php
include_once("cabecera.html");
?>

<div class="container" id="formularios">
	<div class="row">
		<form class="form-horizontal" name="frmBuscarPedido" id="frmBuscarPedido" action="proceso_pedido_id.php">
			<fieldset>
				<!-- Form Name -->
				<legend>Buscar un pedido</legend>
				<!-- Text input-->
				<div class="form-group">
					<label class="col-xs-4 control-label" for="txtIDPedido">ID Pedido</label>
					<div class="col-xs-4">
						<input id="txtIDPedido" name="txtIDPedido" placeholder="Id del Pedido"
							class="form-control input-md" type="text">
					</div>
				</div>
				<!-- Button -->
				<div class="form-group">
					<label class="col-xs-4 control-label" for="btnBuscarPedido"></label>
					<div class="col-xs-4">
						<input type="submit" id="btnBuscarPedido" name="btnBuscarPedido" class="btn btn-primary"
							value="Aceptar" />
					</div>
				</div>
			</fieldset>
		</form>
	</div>
</div>
</body>

</html>
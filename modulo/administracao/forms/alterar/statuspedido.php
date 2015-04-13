<?php
/**
 * Formulario de status pedido
 *
stp_codigo
stp_descricao
 */

$TbStatusPedido = new \system\model\TbStatusPedido();
$StatusPedido = $TbStatusPedido->getForm($_SESSION['administracao/alterar/statuspedido']);

?>
<div class="panel panel-default">
	<div class="panel-heading">
		<h3 class="panel-title">Alterar: Status Pedido</h3>
	</div>
	<div class="panel-body">
		<form class="form-horizontal" method="post" action="action/statuspedido.php" role="form">
			
			<div class="form-group">
				<label for="tpr_descricao" class="col-sm-1 control-label">Descri&ccedil;&abreve;o:</label>
				<div class="col-sm-4">
					<input type="text" name="stp_descricao" value="<?php echo($StatusPedido['stp_descricao']); ?>" class="form-control" id="stp_descricao"
						placeholder="Descricao" required>
					<input type="hidden" name="stp_codigo" value="<?php echo($StatusPedido['stp_codigo']); ?>">
				</div>
			</div>
			
			<div class="form-group">
				<div class="col-sm-offset-1 col-sm-1">
					<button type="submit" class="btn btn-primary">
						<span class="glyphicon glyphicon-floppy-saved"></span> Salvar
					</button>
				</div>
			</div>
			
		</form>
	</div>
</div>
<?php
/**
 * Formulario de Forma de Pagamento
 *
stp_codigo
stp_descricao
 */

?>
<div class="panel panel-default">
	<div class="panel-heading">
		<h3 class="panel-title">Novo: Tipo de Pagamento</h3>
	</div>
	<div class="panel-body">
		<form class="form-horizontal" method="post" action="action/tipopagamento.php" role="form">
			
			<div class="form-group">
				<label for="tpr_descricao" class="col-sm-1 control-label">Descri&ccedil;&abreve;o:</label>
				<div class="col-sm-4">
					<input type="text" name="tpa_descricao" value="" class="form-control" id="tpa_descricao"
						placeholder="Descricao" required>
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
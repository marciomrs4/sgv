<?php
/**
 * Formulario de tipo de produto
 *
tb_tipo_produto
tpr_codigo
tpr_descricao
 */

$tbTipoProduto = new \system\model\TbTipoProduto();

$TipoProduto = $tbTipoProduto->getForm($_SESSION['administracao/alterar/tipoproduto']);

?>
<div class="panel panel-default">
	<div class="panel-heading">
		<h3 class="panel-title">Novo: Tipo Produto</h3>
	</div>
	<div class="panel-body">
		<form class="form-horizontal" method="post" action="action/tipoproduto.php" role="form">
			
			<div class="form-group">
				<label for="tpr_descricao" class="col-sm-1 control-label">Descri&ccedil;&abreve;o:</label>
				<div class="col-sm-4">
					<input type="text" name="tpr_descricao" value="<?php echo($TipoProduto['tpr_descricao']); ?>" class="form-control" id="tpr_descricao"
						placeholder="Descricao" required>
					<input type="hidden" name="tpr_codigo" value="<?php echo($TipoProduto['tpr_codigo']); ?>">


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
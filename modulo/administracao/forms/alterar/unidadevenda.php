<?php

/*
 * tb_unidade_venda
 * uve_codigo
uve_nome
uve_logradouro
 */

$tbUnidadeVenda = new \system\model\TbUnidadeVenda();
$UnidadeVenda = $tbUnidadeVenda->getUnidadeVendaForm($_SESSION['administracao/alterar/unidadevenda']);

?>

<div class="panel panel-default">
	<div class="panel-heading">
		<h3 class="panel-title">Alterar: Unidade Venda</h3>
	</div>
	<div class="panel-body">
		<form class="form-horizontal" method="post" action="action/unidadevenda.php" role="form">
			<div class="form-group">
				<label for="uve_nome" class="col-sm-1 control-label">Nome:</label>
				<div class="col-sm-4">
					<input type="text" name="uve_nome" value="<?php echo($UnidadeVenda['uve_nome']); ?>" class="form-control" id="uve_nome"
						placeholder="Descricao" required>
					<input type="hidden" name="uve_codigo" value="<?php echo($UnidadeVenda['uve_codigo']); ?>">
				</div>
			</div>

			<div class="form-group">
				<label for="" class="col-sm-1 control-label">Descri&sigmaf;&amacr;o</label>
				<div class="col-sm-4">
					<textarea name="uve_logradouro" class="form-control" rows="3" placeholder="Logradouro" required><?php echo($UnidadeVenda['uve_logradouro']); ?></textarea>
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
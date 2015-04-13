<?php

/*
 * tb_unidade_venda
 * uve_codigo
uve_nome
uve_logradouro
 */

?>

<div class="panel panel-default">
	<div class="panel-heading">
		<h3 class="panel-title">Novo: Unidade Venda</h3>
	</div>
	<div class="panel-body">
		<form class="form-horizontal" method="post" action="action/unidadevenda.php" role="form">
			
			<div class="form-group">
				<label for="uve_nome" class="col-sm-1 control-label">Nome:</label>
				<div class="col-sm-4">
					<input type="text" name="uve_nome" value="" class="form-control" id="uve_nome"
						placeholder="Descricao" required>
				</div>
			</div>

			<div class="form-group">
				<label for="" class="col-sm-1 control-label">Descri&sigmaf;&amacr;o</label>
				<div class="col-sm-4">
					<textarea name="uve_logradouro" class="form-control" rows="3" placeholder="Logradouro" required></textarea>
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
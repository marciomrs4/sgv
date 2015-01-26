<?php
/**
 *
Criacao do form de para Produto
pro_codigo
pro_titulo
pro_valor
pro_descricao
tpr_codigo



*/
?>

<div class="panel panel-default">
	<div class="panel-heading">
		<h3 class="panel-title">Novo: Produto</h3>
	</div>
	<div class="panel-body">
		<form class="form-horizontal" method="post" action="action/produto.php" role="form">
			
			<div class="form-group">
				<label for="pro_titulo" class="col-sm-1 control-label">Titulo:</label>
				<div class="col-sm-4">
					<input type="text" name="pro_titulo" value="" class="form-control" id="pro_titulo"
						placeholder="Titulo" required>
				</div>
			</div>

			<div class="form-group">
				<label for="pro_valor" class="col-sm-1 control-label">Valor:</label>
				<div class="col-sm-4">
					<input type="text" name="pro_valor" value="" class="form-control" id="pro_valor"
						   placeholder="Valor" required>
				</div>
			</div>


			<div class="form-group">
				<label for="pro_descricao" class="col-sm-1 control-label">Descrição:</label>
				<div class="col-sm-4">
					<input type="text" name="pro_descricao" value="" class="form-control" id="pro_descricao"
						   placeholder="Descricao" required>
				</div>
			</div>

			<div class="form-group">
				<label for="" class="col-sm-1 control-label">Tipo Produto</label>
				<div class="col-sm-2">
					<select name="tpr_codigo" class="form-control" required>

						<option></option>
						<option>allsjh</option>
						<option>2</option>
						<option>3</option>
						<option>4</option>
						<option>5</option>

					</select>
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
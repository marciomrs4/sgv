<?php

$tbUnidade = new \system\model\TbUnidadeVenda();

$tbStatusPedido = new \system\model\TbStatusPedido();

?>
<div class="panel panel-primary">
	<div class="panel-heading">
		<h3 class="panel-title">Filtros: <?php echo($RelatorioName);?></h3>
	</div>
	<div class="panel-body">

		<form class="form-horizontal" role="form" action="" method="post">

			<div class="form-group">
				<label for="inputEmail3" class="col-sm-1 control-label">Unidade de venda:</label>
				<div class="col-sm-2">

					<select class="form-control" name="uve_codigo">
						<option value="">Selecione</option>
						<?php
						foreach ($tbUnidade->listUnidadeVendaByName() as $campo):
							$check = ($acceptForm->getpost('uve_codigo') == $campo['uve_codigo']) ? 'selected' : '';
							?>
							<option <?php echo($check); ?> value="<?php echo($campo['uve_codigo']); ?>"><?php echo($campo['uve_nome']); ?></option>
						<?php endforeach;?>
					</select>
				</div>

<!--
				<label for="inputEmail3" class="col-sm-1 control-label">Status:</label>
				<div class="col-sm-2">

					<select class="form-control" name="stp_codigo">
						<option value="">Selecione</option>
						<?php
/*						foreach ($tbStatusPedido->listAllAssoc() as $campo): */?>
							<option value="<?php /*echo($campo['stp_codigo']); */?>"><?php /*echo($campo['stp_descricao']); */?></option>
						<?php /*endforeach;*/?>
					</select>
				</div>
-->
				<label for="inputEmail3" class="col-sm-1 control-label">Data Inicial:</label>
				<div class="col-sm-2">
					<input type="date" name="data1" class="form-control" value="<?php echo($acceptForm->getpost('data1')); ?>">
				</div>

				<label for="inputEmail3" class="col-sm-1 control-label">Data Final:</label>
				<div class="col-sm-2">
					<input type="date" name="data2" class="form-control" value="<?php echo($acceptForm->getpost('data2')); ?>">
				</div>


				<div class="col-sm-2">
					<button type="submit" class="btn btn-primary">
						<span class="glyphicon glyphicon-search"></span> Buscar
					</button>
				</div>

			</div>

		</form>
</div>
</div>

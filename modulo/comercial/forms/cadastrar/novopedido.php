<div class="panel panel-default">
	<div class="panel-heading">
		<h3 class="panel-title">Novo</h3>
	</div>
	<div class="panel-body">
	<?php
		use system\model\TbProduto;
		use system\model\TbPedido;

		$form = new system\core\Error();
		$form->validadeForm('cadastrar/doca')
			 ->showErrors();
		
		$tbPedido = new TbPedido();
		?>
		<form class="form-horizontal" method="post" action="action/addProduct.php">

			<div class="form-group">
				<label for="inputEmail3" class="col-sm-1 control-label">Pedido:</label>
				<div class="col-sm-1">

					<input type="text" name="ped_codigo" value="<?php echo $tbPedido->getPedNumber(); ?>"  class="form-control" id="inputEmail3"
						placeholder="Pedido" readonly="readonly">
				</div>
			
				<label for="inputEmail3" class="col-sm-1 control-label">Cliente:</label>
				<div class="col-sm-2">
					<input type="text" name="ped_cliente" value="<?php $name = (isset($_SESSION['pedido']['ped_cliente']) ? $_SESSION['pedido']['ped_cliente'] : null);
																	echo $name;
																	 ?>" class="form-control" id="inputEmail3"
						placeholder="Cliente">
				</div>
			</div>

			<div class="form-group">

				<label for="" class="col-sm-1 control-label">Produto:</label>
				<div class="col-sm-2">
					<select class="form-control" name="pro_codigo">
						<?php 
							$tbProduto = new TbProduto();
							foreach ($tbProduto->listProductScreenSale() as $campo): ?>
						<option value="<?php echo($campo['pro_codigo']); ?>"><?php echo($campo['pro_titulo']); ?></option>
						<?php endforeach;?>
					</select>
				</div>
			
				<label for="inputEmail3" class="col-sm-1 control-label">Valor:</label>
				<div class="col-sm-1">
					<input type="text" name="valor" value="15,00" class="form-control" id="inputEmail3"
						placeholder="Valor">
				</div>
				
				<label for="inputEmail3" class="col-sm-1 control-label">Quantidade:</label>
				<div class="col-sm-1">
					<input type="text" name="quantidade" value="1" class="form-control" id="inputEmail3"
						placeholder="Quantidade">
				</div>

			</div>


			<div class="form-group">
				<div class="col-sm-offset-1 col-sm-1">
					<button type="submit" class="btn btn-primary">
						<span class="glyphicon glyphicon-ok"></span> Adicionar
					</button>
				</div>
			</div>

		</form>

	</div>
</div>

<div class="panel panel-info">
	<div class="panel-heading">
		<h3 class="panel-title">Lista de Produtos</h3>
	</div>
	<div class="panel-body">

		<form class="form-horizontal" action="action/finalizarPedido.php" method="post" role="form">
			<input type="hidden" name="ped_cliente" value="<?php echo($name); ?>">
				<table class="table table-striped table-bordered table-condensed table-hover">
					<thead>
						<tr class="info">
							<th>#</th>
							<th>Produto</th>
							<th>Valor Unitário</th>
							<th>Quantidade</th>
							<th>Total</th>							
						</tr>
					</thead>
					<tbody>
					

					<?php 

					if(isset($_SESSION['itens_pedido']))
					{
					
					$total_geral = 0;
					
					foreach ($_SESSION['itens_pedido'] as $key => $array): ?>

						<tr>
							<td class="col-md-1">
							
								<div class="btn-group">
									<button type="button" class="btn btn-default btn-xs dropdown-toggle"
										data-toggle="dropdown">
										Opções <span class="caret"></span>
									</button>
									
									<ul class="dropdown-menu" role="menu">

										<li><a href="action/actionRemoveItem.php?idItem=<?php echo($key); ?>"><span class="glyphicon glyphicon-remove"></span>
												Remover</a>
										</li>
									</ul>
									
								</div>
								
							</td>
							

							<td><?php 
							
							echo $tbProduto->getDescriptionProduct($key);
							
							?></td>
							<td>R$ <?php echo $array['valor']; ?></td>
							<td><?php echo($array['quantidade']); ?></td>
							<td>R$ <?php echo($array['total']); ?></td>							
						</tr>
						
					<?php 
					$total_geral += system\core\NumberFormat::builder()->numberDataBase($array['total']);
					
					endforeach; 
					
					?>	
						<tr>
							<td>
							</td>
							<td>
							</td>
							<td>
							</td>
							<td>
								<strong>Total do Pedido</strong>
							</td>
							<td>
								<strong><?php echo 'R$ ',system\core\NumberFormat::builder()->numberClient($total_geral); ?></strong>
								<input type="hidden" name="ped_valor_total" value="<?php echo($total_geral); ?>">
							</td>
						</tr>
					<?php } ?>
					</tbody>
				</table>
			
			<div class="form-group">
				<div class="col-sm-offset-0 col-sm-1">
					<button type="submit" class="btn btn-primary">
						<span class="glyphicon glyphicon-floppy-saved"></span> Salvar
					</button>
				</div>
				
				<div class="col-sm-offset-0 col-sm-1">
					<button type="submit" name="clear" value="clear" class="btn btn-primary">
						<span class="glyphicon glyphicon-floppy-saved"></span> Limpar
					</button>
				</div>
				
				
			</div>
			
		</form>
	</div>
</div>

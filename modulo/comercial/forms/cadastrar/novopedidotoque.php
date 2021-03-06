<div class="panel panel-default" xmlns:div="http://www.w3.org/1999/html" xmlns="http://www.w3.org/1999/html">
	<div class="panel-heading">
		<h3 class="panel-title">Novo Pedido</h3>
	</div>
	<div class="panel-body">
	<?php
		use system\model\TbProduto;
		use system\model\TbPedido;
		use system\core\NumberFormat;
		
		$form = new system\core\Error();
		$form->validadeForm('cadastrar/novopedidotoque');


		$tbPedido = new TbPedido();
		$tbProduto = new TbProduto();
		
		?>
		<form class="form-inline" id="pedidotoque" method="post" action="action/createPedidoToque.php">

		<div class="form-group">		
			<label for="inputEmail3" class="col-sm-1 control-label">Cliente:</label>
				<div class="col-sm-2">
					<input type="text" name="ped_cliente" value="" class="form-control input-lg" placeholder="Cliente">
				</div>
								
			<label for="" class="col-sm-1 control-label">Pedido:</label>
				<div class="col-sm-2">
					<input type="text" name="" value="<?php echo $tbPedido->getPedNumber($_SESSION['uve_codigo']); ?>" class="form-control input-lg" readonly="readonly">
				</div>
		</div>			
		

		<?php foreach ($tbProduto->listProductScreenSale() as $product):?>
		<div class="form-group">		
		<label class="col-md-1 control-label" for="<?php echo $product['pro_titulo'] ?>"></label>
		  <div class="col-md-4">
		    <div class="btn btn-primary btn-lg"><?php echo($product['pro_titulo']); ?></div>
		    	<input name="<?php echo($product['pro_codigo']);?>" value="" size="3" class="input-lg">
			  <span style="display: none"><?php echo $tbProduto->getPriceProduct($product['pro_codigo']); ?></span>
			  <h4>R$ <?php echo(NumberFormat::builder()->numberClient($tbProduto->getPriceProduct($product['pro_codigo'])));?></h4>
		  </div>
  		</div>
		<?php endforeach; ?>

			<div class="form-group">

				<label for="" class="col-sm-1 control-label">Pagamento:</label>
				<div class="col-sm-2">
					<select class="form-control input-lg" name="tpa_codigo">
						<option value="">Selecione</option>

						<?php
						$tbTipoPgamento = new \system\model\TbTipoPagamento();
						foreach ($tbTipoPgamento->listScreenSale() as $campo): ?>
							<option value="<?php echo($campo['tpa_codigo']); ?>"><?php echo($campo['tpa_descricao']); ?></option>
						<?php endforeach;?>
					</select>
				</div>
			</div>

			<div class="form-group">
				<label for="" class="col-sm-1 control-label">Total: R$ </label>
				<div class="col-sm-2">
					<span id="valor" readonly="readonly" class="form-control input-lg"></span>
				</div>
			</div>

		<div class="form-group">	
			<div class="col-md-2 col-md-offset-1">
			     <button id="button2id" name="button2id" class="btn btn-primary btn-lg">
			     	<span class="glyphicon glyphicon-floppy-saved"></span> Salvar
			     </button>
			</div>
		</div>
					  
		</form>

	</div>
</div>

<div class="panel panel-default">
	<div class="panel-heading">
		<h3 class="panel-title">Novo Pedido</h3>
	</div>
	<div class="panel-body">
	<?php
		use system\model\TbProduto;
		use system\model\TbPedido;
use system\core\NumberFormat;
		$form = new system\core\Error();
		$form->validadeForm('cadastrar/novopedidotoque')
			 ->showErrors();

		$form->showMessages();

		$tbPedido = new TbPedido();
		$tbProduto = new TbProduto();
		
		?>
		<form class="form-horizontal" id="pedidotoque" method="post" action="action/createPedidoToque.php">

		<div class="form-group">		
			<label for="inputEmail3" class="col-sm-1 control-label">Cliente:</label>
				<div class="col-sm-2">
					<input type="text" name="ped_cliente" value="" class="form-control" placeholder="Cliente">
				</div>
								
			<label for="" class="col-sm-1 control-label">Pedido:</label>
				<div class="col-sm-2">
					<input type="text" name="" value="<?php echo $tbPedido->getPedNumber(); ?>" class="form-control" readonly="readonly">
				</div>
		</div>			
		


		<?php foreach ($tbProduto->listProductScreenSale() as $product):?>
		<div class="form-group">		
		<label class="col-md-1 control-label" for="<?php echo $product['pro_titulo'] ?>"></label>
		  <div class="col-md-4">
		    <div class="btn btn-info"><?php echo($product['pro_titulo']); ?></div>
		    	<input name="<?php echo($product['pro_codigo']);?>" value="" size="3" class="">
		    	<?php echo('R$ '.NumberFormat::builder()->numberClient($tbProduto->getPriceProduct($product['pro_codigo'])));?>
		  </div>
  		</div>
		<?php endforeach; ?>
		  		  		  
		<div class="form-group">	
			<div class="col-md-2 col-md-offset-1">
			     <button id="button2id" name="button2id" class="btn btn-primary">
			     	<span class="glyphicon glyphicon-floppy-saved"></span> Salvar
			     </button>
			</div>
		</div>
					  
		</form>

	</div>
</div>

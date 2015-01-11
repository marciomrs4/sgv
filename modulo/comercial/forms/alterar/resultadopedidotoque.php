<div class="panel panel-default">
	<div class="panel-heading">
		<h3 class="panel-title">Pedido Criado com sucesso!</h3>
	</div>
	<div class="panel-body">
		<?php 
			use system\model\TbPedido;		
			use system\model\TbItemPedido;
			
			$tbPedido = new TbPedido();
		
			$tbItemPedido = new TbItemPedido();
			
			echo 'Numero do Pedido:', $_SESSION['value'];
			
			echo '<pre>';
				print_r($tbPedido->getPedidoInformacao($_SESSION['value']));			
			echo '</pre>';
			
			echo '<pre>';
				print_r($tbItemPedido->getItensPedido($_SESSION['value']));
			echo '</pre>';
		
		?>
	</div>
</div>

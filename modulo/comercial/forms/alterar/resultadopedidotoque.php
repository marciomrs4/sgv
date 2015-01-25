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
			
			echo 'Numero do Pedido: ', $_SESSION['value'],' - ';
			

				$DadosPedido = $tbPedido->getPedidoInformacao($_SESSION['value']);

				echo 'Data do pedido: ',$DadosPedido['ped_data_venda'],' - ',
				     'Valor Total: ',$DadosPedido['ped_valor_total'],' - ',
					 'Cliente: ',$DadosPedido['ped_cliente'],'<br><br>';

				$DadosItensPedido = $tbItemPedido->getItensPedido($_SESSION['value']);

				foreach($DadosItensPedido as $linha){
					echo 'Produto: ',$linha['vpr_titulo_produto'],' - ',
						 'Valor UN: ',$linha['vpr_valor_unitario'],' - ',
					 	 'Quantidade: ',$linha['vpr_quantidade'],' - ',
						 'Valor Total: ',$linha['vpr_valor_total'],'<br>';
				}
		
		?>
	</div>
</div>

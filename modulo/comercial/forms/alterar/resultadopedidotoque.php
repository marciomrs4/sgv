<div class="panel panel-default">
	<div class="panel-heading">
		<h3 class="panel-title">Pedido Criado com sucesso!</h3>

				<input type="button" onclick="doPrinter()" value="Imprimir">

	</div>
	<div class="panel-body" id="print">
		<?php 
			use system\model\TbPedido;		
			use system\model\TbItemPedido;
			
			$tbPedido = new TbPedido();
		
			$tbItemPedido = new TbItemPedido();

            $tbPagamentoPedido = new \system\model\TbPagamentoPedido();

            $numberFormat = new \system\core\NumberFormat();


			echo 'Pedido: ', $_SESSION['value']['ped_numero'],'<br>';

				$DadosPedido = $tbPedido->getPedidoInformacao($_SESSION['value']['ped_codigo']);
                $tipoPagamento = $tbPagamentoPedido->getTipoPagamento($_SESSION['value']['ped_codigo']);

				echo 'Cliente: ',$DadosPedido['ped_cliente'],'<br>',
                      '****************<br>',
                     'Data: ',$DadosPedido['ped_data_venda'],'<br>',
				     'Valor Total: ', $numberFormat->numberClient($DadosPedido['ped_valor_total']),'<br>',
                     'Tipo Pagto: ',$tipoPagamento,'<br>',
                     '*****************<br><br>';


				$DadosItensPedido = $tbItemPedido->getItensPedido($_SESSION['value']['ped_codigo']);

				foreach($DadosItensPedido as $linha){
					echo  $linha['vpr_quantidade'],' - ',
                          $linha['vpr_titulo_produto'],' - ',
						  $linha['vpr_valor_total'],'<br>';
				}

                echo '<br><br><br>';

                //Segunda parte que é enviado para cozinha
               echo 'Pedido: ', $_SESSION['value']['ped_numero'],'<br>',
                    'Cliente: ',$DadosPedido['ped_cliente'],'<br>',
                    '****************<br>';

                foreach($DadosItensPedido as $linha){
                    echo  $linha['vpr_quantidade'],' - ',
                          $linha['vpr_titulo_produto'],' - ',
                          $linha['vpr_valor_total'],'<br>';
        }

		?>
	</div>
</div>

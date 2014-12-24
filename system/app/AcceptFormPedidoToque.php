<?php
namespace system\app;

use Respect\Validation\Validator as v;
use system\core\PostController;
use Respect\Validation\Validator;
use system\core\NumberFormat;
use system\model\TbProduto;
use system\model\TbPedido;
use system\model\TbItemPedido;


class AcceptFormPedidoToque extends PostController
{

	public function createPedido()
	{
		$tbProduto = new TbProduto();
		$tbPedido = new TbPedido();
		$tbItemPedido = new TbItemPedido();
		
		$totalPedido = 0;
		$dados;
		
		try{
		
			$this->conexao->beginTransaction();
			
			$dados['ped_cliente'] = filter_var($this->post['ped_cliente'],FILTER_SANITIZE_STRING);
				
				unset($this->post['ped_cliente']); // = $_SESSION['pedido']['ped_cliente'];

			$dados['usu_codigo'] = 1; //User da sessao
			$dados['ped_valor_total'] = $totalPedido; //Valor total já vem do form
			$dados['stp_codigo'] = 1; // Status do pedido
			$dados['ped_numero'] = $tbPedido->getPedNumber();
			$dados['uve_codigo'] = 1;
			
			$dados['ped_codigo'] = $tbPedido->save($dados); //grava o pedido no banco
			

			foreach ($this->post as $codigo => $quantidade){
				
				if($this->post[$codigo]){
					
					$valor = $tbProduto->getPriceProduct($codigo);
					
					$total = $valor * $quantidade;
					
					$dados['ped_valor_total'] += $total;
					
					$dados['vpr_titulo_produto'] = $tbProduto->getDescriptionProduct($codigo);
					$dados['vpr_valor_unitario'] = $valor;
					$dados['vpr_quantidade'] = $quantidade;
					$dados['vpr_valor_total'] = $total;
					
					$tbItemPedido->save($dados); //grava os itens do pedido no banco
					
				}
				
			}
			
			$tbPedido->updateValorTotal($dados);

			
			$this->conexao->commit();
			
			return($dados['ped_codigo']);
			
		}catch (\PDOException $e){
			
			$this->conexao->rollBack();
			
			throw new \PDOException($e->getMessage(), $e->getCode());
		}
		
	}	
	
}
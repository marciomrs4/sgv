<?php
namespace system\app;

use Respect\Validation\Validator as v;
use system\core\PostController;
use Respect\Validation\Validator;
use system\core\NumberFormat;
use system\model\TbPagamentoPedido;
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
		$tbPagamentoPedido = new TbPagamentoPedido();
		
		$totalPedido = 0;
		$dados = array();
		
		try {

			$dados['ped_cliente'] = filter_var($this->post['ped_cliente'],FILTER_SANITIZE_STRING);

			if($this->post['tpa_codigo'] == ''){
				throw new \Exception('Selecione a forma de pagamento');
			}

			$dados['tpa_codigo'] = $this->post['tpa_codigo'];

			$this->validateCreatePedidoToque();
			
		
			try{
			
				$this->conexao->beginTransaction();


				unset($this->post['ped_cliente'], $this->post['tpa_codigo']); // = $_SESSION['pedido']['ped_cliente'];
	
				$dados['usu_codigo'] = $_SESSION['usu_codigo']; //User da sessao
				$dados['ped_valor_total'] = $totalPedido; //Valor total j� vem do form
				$dados['stp_codigo'] = 1; // Status do pedido
				$dados['ped_numero'] = $tbPedido->getPedNumber($_SESSION['uve_codigo']);
				$dados['uve_codigo'] = $_SESSION['uve_codigo'];


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

				$dados['ppe_valor'] = $dados['ped_valor_total'];

				$tbPagamentoPedido->save($dados);

				$this->conexao->commit();

				#Retornoa o numero do pedido e o codigo do pedido
				#Usado em dois lugares, impressao do pedido e tela separada
				#onde o ped_numero é necessario
				return(array('ped_numero' => $dados['ped_numero'], 'ped_codigo' =>$dados['ped_codigo']));
					
			}catch (\PDOException $e){
				
				$this->conexao->rollBack();
				
				throw new \PDOException($e->getMessage(), $e->getCode());
			}
			
		} catch (\Exception $e) {
			throw new \Exception($e->getMessage());
		}
		
		
	}	
	
	private function validateCreatePedidoToque()
	{
		#Declaracao de das variaveis 	
		$TotalCampo = 0;
		
		#Removendo itens que nao precisao ser contados fo form
		unset($this->post['ped_cliente']);
		unset($this->post['tpa_codigo']);
		unset($this->post['button2id']);
		
		$QtdItens = count($this->post);
		
		#Passando por cada campo que foi enviado
		foreach ($this->post as $campo=> $valor){

			//Mostrando os campos que existem no formulario
			//echo 'Campo: ',$campo, ' Valor: ',$valor,'<br>';
			
			#Verficando cada valor se foi preenchido
			if(($valor == '') or ($valor == 0)){
				$TotalCampo++;
			}

		}

		#Verificando a quantidade de campos enviados
		//echo $QtdItens . ' - ' . $TotalCampo;

		#Verificando se a quantidade de campos vazios e o mesmo de itens enviados
		if($TotalCampo == $QtdItens){
			throw new \Exception(utf8_decode('É necessário informar um valor diferente de zero em ao menos um item'));
		}
		
	}
	
}
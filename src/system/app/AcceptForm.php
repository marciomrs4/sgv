<?php
namespace system\app;

use Respect\Validation\Validator as v;
use system\core\PostController;
use system\model\TbPagamentoPedido;
use system\model\TbUsuario;
use system\model\TbPedido;
use Respect\Validation\Validator;
use system\core\NumberFormat;
use system\model\TbVendasProdutos;
use system\model\TbItemPedido;
use system\model\TbProduto;

class AcceptForm extends PostController
{
	public function cadastrarComercial()
	{

		try {
			
 			v::string()->notEmpty()
					   ->setName('Doca')
					   ->setTemplate('O campo {{name}} � obrigat�rio')
					   ->assert($this->post['doca']);

			try {
				

				$tbUser = new TbUsuario();
				$dados = 1;
				return $tbUser->save($dados);
				
				
			} catch (Exception $e) {
				
				throw new \Exception();
			}		   
					   
		} catch (Exception $e) {
			
			throw new Exception();				
			
		}

		
	}
	
	public function createPedido()
	{
		try{
/*		v::string()->notEmpty()
				   ->setName('Cliente')
				   ->setTemplate('O campo {{name}} &eacute; obrigat&oacute;rio')
				   ->assert($this->post['ped_cliente']);*/

		v::notEmpty()->setName('Valor')
					 ->setTemplate('O campo {{name}} &eacute; obrigat&oacute;rio')
					 ->assert($this->post['valor']);

		v::notEmpty()->int()
					 ->setName('Quantidade')
					 ->setTemplate('O campo {{name}} &eacute; obrigat&oacute;rio')
					 ->assert($this->post['quantidade']);


		}catch (\Exception $e)
		{
			throw new \Exception($e);
			
			if(method_exists($e,'getMainMessage')){
				$_SESSION['erro'] =	$e->getMainMessage();
			
				$_SESSION['erros'] = $e->findMessages(array(
						'string' => 'Este campo deve conter um Texto {{input}}',
						'notEmpty' => 'O valor {{input}} n�o pode ser vazio'
				));
			}
					
		}
		
		$_SESSION['pedido'] = array('ped_codigo' => $this->post['ped_codigo'],
									'ped_cliente' => $this->post['ped_cliente']);
		return $this;
	}
	
	public function addProduct()
	{

		$valor = NumberFormat::builder()->numberDataBase($this->post['valor']);
		
		$total = $valor * $this->post['quantidade'];
		
		$total = NumberFormat::builder()->numberClient($total);
		
		
		$_SESSION['itens_pedido'][$this->post['pro_codigo']] = array('pro_codigo' => $this->post['pro_codigo'],
															'valor' => $this->post['valor'],
															'quantidade' => $this->post['quantidade'],
															'total' => $total);
		
	}
	
	public function removeProduct()
	{
		
	}
	
	public function finalizarPedido()
	{
		if(empty($_SESSION['itens_pedido'])){
			throw new \Exception('Sem itens no Pedido');
		}

		if($this->post['tpa_codigo'] == ''){
			throw new \Exception('Selecione a forma de pagamento');
		}

 		try {
 			
 			$this->conexao->beginTransaction();
 			
			$tbPedido = new TbPedido();

			$this->post['ped_numero'] = $tbPedido->getPedNumber($_SESSION['uve_codigo']);
			$this->post['ped_cliente']; // = $_SESSION['pedido']['ped_cliente']; 
			$this->post['usu_codigo'] = $_SESSION['usu_codigo']; //User da sessao
			$this->post['ped_valor_total']; //Valor total j� vem do form
			$this->post['stp_codigo'] = 1; // Status do pedido
			$this->post['uve_codigo'] = $_SESSION['uve_codigo']; //Unidade de venda
			

			$this->post['ped_codigo'] = $tbPedido->save($this->post); //Codigo do produto

			//Registra a forma de pagamento
			$tbPagamentoPedido = new TbPagamentoPedido();
			//tpa_codigo
			$this->post['ppe_valor'] = $this->post['ped_valor_total'];
			$tbPagamentoPedido->save($this->post);
			
			$tbProduto = new TbProduto();
			
			$tbItemPedido = new TbItemPedido();
			
			foreach ($_SESSION['itens_pedido'] as $key => $array){

				 $this->post['vpr_titulo_produto'] = $tbProduto->getDescriptionProduct($array['pro_codigo']); //Descricao do produto / Codigo do Produto
				 $this->post['vpr_valor_unitario'] = NumberFormat::builder()->numberDataBase($array['valor']); //Valdor Unitario,
				 $this->post['vpr_quantidade'] = $array['quantidade']; //Quantidade do item no pedido,
				 $this->post['vpr_valor_total'] = NumberFormat::builder()->numberDataBase($array['total']);//valor total do item no pedido
	
				 $tbItemPedido->save($this->post);
				 
			}
			
			$this->conexao->commit();

			//return $this->post['ped_codigo'];

            return(array('ped_numero' => $this->post['ped_numero'], 'ped_codigo' =>$this->post['ped_codigo']));
			
 		} catch (\Exception $e) {
 			$this->conexao->rollBack();
			throw new \Exception($e->getMessage());
		} 

	}
	
	
}
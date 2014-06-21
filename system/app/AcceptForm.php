<?php

namespace system\app;

use Respect\Validation\Validator as v;
use system\core\PostController;
use system\model\TbUsuario;
use Respect\Validation\Validator;
use system\core\NumberFormat;

class AcceptForm extends PostController
{
	public function cadastrarComercial()
	{

		try {
			
 			v::string()->notEmpty()
					   ->setName('Doca')
					   ->setTemplate('O campo {{name}} é obrigatório')
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
		if (!$_SESSION['pedido']) {
			
				$_SESSION['pedido'] = array('ped_codigo' => $this->post['ped_codigo'],
										  'ped_cliente' => $this->post['ped_cliente']);
		}
	}
	
	public function addProduct()
	{

		$this->createPedido();
		
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
		
	}
	
}
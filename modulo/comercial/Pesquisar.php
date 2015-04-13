<?php
include_once '../../bootstrap.php';
include_once 'config.php';

include '../../componente/topo.php';
include '../../componente/menuprincipal.php';


include '../../modulo/comercial/ModuloVendas.php';

use system\core\Grid;
use system\model\TbVendasProdutos;
use system\core\Painel;
use system\core\FormController;

	try {
		
		
	$tbVendasProdutos = new TbVendasProdutos();
	
	$coluns = array('Codigo Pedido','Descricao do Produto','Valor Unitario','Quantidade','Total');
	
	$grid = new Grid($coluns,$tbVendasProdutos->findAll());
	$grid->colunaoculta = 1;
	
	
	
	function numberClient($number)
	{ return('R$ '.number_format($number,2,',','.'));	}
	
	$grid->addFunctionColumn('numberClient', 3)
		 ->addFunctionColumn('numberClient', 5);
	
	$painel = new Painel();
	$painel->addGrid($grid)
		   ->setPainelTitle('Lista de Vendas')
		   ->show((!isset($_SESSION['action'])));
	
	} catch (Exception $e) {
		echo $e->getMessage();
	}
	


#Adciona um formulario dinamicamente em caso de ações.

$form = new FormController();
$form->setForm()->getForm();




include '../../componente/rodape.php';
?>
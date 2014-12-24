<?php
require_once '../../../bootstrap.php';


use system\app\AcceptForm as Post;
use system\core\FormController;
use system\app\AcceptFormPedidoToque;


try { 
	

$post = new AcceptFormPedidoToque();

 	$_SESSION['valueTemp'] = $post->setpost($_POST)->createPedido();


$form = new FormController();
$form->setModulo($_SESSION['moduloTemp'])
	 ->setAction('alterar/resultadoPedidoToque')
	 ->setValue($_SESSION['valueTemp']);
 	
	
} catch (Exception $e) {

	$_SESSION['erro'] = $e->getMessage();

if(method_exists($e,'getMainMessage')){
	$_SESSION['erro'] =	$e->getMainMessage();
	
	$_SESSION['erros'] = $e->findMessages(array(
			'string' => 'Este campo deve conter um Texto {{input}}',
			'email'  => 'O valor {{name}} não é um email valido',
			'notEmpty' => 'O valor {{input}} não pode ser vazio',
			'alnum' => 'o valor {{input}} tem ser alfanumerico'
	));

}



$form = new FormController();
$form->setModulo($_SESSION['moduloTemp'])
	 ->setAction($_SESSION['actionTemp'])
	 ->setValue($_SESSION['valueTemp']);

}

header('location: '.$_SERVER['HTTP_REFERER']);
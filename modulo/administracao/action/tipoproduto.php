<?php
require_once '../../../bootstrap.php';


use system\core\FormController;
use system\app\AcceptFormTipoProduto;


try {
	
	$post = new AcceptFormTipoProduto();
	
	$post->setPost($_POST)
		 ->AcceptForm();

	$post->clearPost();
	
} catch (Exception $e) {

	$_SESSION['erro'] = $e->getMessage();

	if(method_exists($e,'getMainMessage')){
		$_SESSION['erro'] =	$e->getMainMessage();

		$_SESSION['erros'] = $e->findMessages(array(
			'string' => 'Este campo deve conter um Texto {{input}}',
			'email'  => 'O valor {{name}} n�o � um email valido',
			'notEmpty' => 'O valor {{input}} n�o pode ser vazio',
			'alnum' => 'o valor {{input}} tem ser alfanumerico'
		));

	}



	$form = new FormController();
	$form->setModulo($_SESSION['moduloTemp'])
		->setAction($_SESSION['actionTemp'])
		->setValue($_SESSION['valueTemp']);

	header('location: '.$_SERVER['HTTP_REFERER']);
}



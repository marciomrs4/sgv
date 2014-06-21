<?php
require_once '../../../bootstrap.php';


use system\app\AcceptForm as Post;
use system\core\FormController;

$post = new Post();

try {
	
	$post->setPost($_POST);

	$clear = $post->getPost('clear');
	if($clear){
		unset($_SESSION['itens_pedido']);
		$post->clearPost("Lista limpa com sucesso");
		return false;		
	}
		
	$post->finalizarPedido();
	unset($_SESSION['pedido']);
	unset($_SESSION['itens_pedido']);
	$post->clearPost();

	
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
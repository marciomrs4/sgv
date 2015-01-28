<?php
require_once '../../../bootstrap.php';


use system\app\AcceptForm as Post;
use system\core\FormController;

$post = new Post();

try {
	
	$post->setPost($_POST);

	$clear = $post->getPost('clear');
	if($clear){
		unset($_SESSION['itens_pedido'],$_SESSION['pedido']['ped_cliente'],$_SESSION['pedido']['ped_codigo']);
		$_SESSION['action'] = $_SESSION['actionTemp'];
		$post->clearPost("Lista limpa com sucesso");
		return false;		
	}

	$_SESSION['ped_codigo'] = $post->finalizarPedido();
 	unset($_SESSION['pedido']);
	unset($_SESSION['itens_pedido']);

 	$post->clearPost('Pedido Efetuado com sucesso!','../PainelBusca.php');

	
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
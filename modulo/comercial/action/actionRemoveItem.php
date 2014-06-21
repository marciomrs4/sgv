<?php
require_once '../../../bootstrap.php';


use system\app\AcceptForm as Post;
use system\core\FormController;

$post = new Post();

try {
		
	
		unset($_SESSION['itens_pedido'][$_GET['idItem']]);
		

		$form = new FormController();
		$form->setModulo($_SESSION['moduloTemp'])
		->setAction($_SESSION['actionTemp'])
		->setValue($_SESSION['valueTemp']);
		
}catch(Exception $e){
	throw new Exception($e->getMessage());
}		

header('location: '.$_SERVER['HTTP_REFERER']);

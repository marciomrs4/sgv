<?php

require_once '../../../bootstrap.php';


use system\core\FormController;

try {

$post = new \system\app\AcceptFormUsuario();

$post->setPost($_POST)
	 ->AcceptForm();

$post->clearPost('Cadastrado com sucesso');

} catch (Exception $e) {

$_SESSION['erro'] = $e->getMessage();

if(method_exists($e,'getMainMessage')){
$_SESSION['erro'] =	$e->getMainMessage();

$_SESSION['erros'] = $e->findMessages(array(
'string' => 'Este campo deve conter um Texto {{name}}',
'email'  => 'O valor {{input}} não é um email valido',
'notEmpty' => 'O valor {{input}} não é valido para o campo {{name}} pode ser vazio',
'alnum' => 'o valor {{name}} tem ser alfanumerico',
'equals' => 'O valor {{name}} deve ser igual'
));

}



$form = new FormController();
$form->setModulo($_SESSION['moduloTemp'])
->setAction($_SESSION['actionTemp'])
->setValue($_SESSION['valueTemp']);

header('location: '.$_SERVER['HTTP_REFERER']);
}



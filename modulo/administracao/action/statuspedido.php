<?php
require_once '../../../bootstrap.php';

use system\core\FormController;


if ($_GET) {

	try {


		$delete = new \system\app\AcceptFormStatusPedido();

		$delete->setpost($_GET)
			   ->delete();

		$delete->clearPost('Status deletado com sucesso!', '../listarStatusPedido.php');


	} catch (Exception $e) {
		$_SESSION['erro'] = $e->getMessage();

		if (method_exists($e, 'getMainMessage')) {
			$_SESSION['erro'] = $e->getMainMessage();

			$_SESSION['erros'] = $e->findMessages(array(
				'string' => 'Este campo deve conter um Texto {{input}}',
				'email' => 'O valor {{name}} n�o � um email valido',
				'notEmpty' => 'O valor {{input}} n�o pode ser vazio',
				'alnum' => 'o valor {{input}} tem ser alfanumerico'
			));

		}

		header('location: ' . $_SERVER['HTTP_REFERER']);
	}

	return false;
}

###############################################################

if($_POST) {

	try {

		$post = new \system\app\AcceptFormStatusPedido();

		$post->setPost($_POST)
			->AcceptForm();

		$post->clearPost('Novo Status Pedido, cadastrado com sucesso!', '../listarStatusPedido.php');

	} catch (Exception $e) {

		$_SESSION['erro'] = $e->getMessage();

		if (method_exists($e, 'getMainMessage')) {
			$_SESSION['erro'] = $e->getMainMessage();

			$_SESSION['erros'] = $e->findMessages(array(
				'string' => 'Este campo deve conter um Texto {{input}}',
				'email' => 'O valor {{name}} n�o � um email valido',
				'notEmpty' => 'O valor {{input}} n�o pode ser vazio',
				'alnum' => 'o valor {{input}} tem ser alfanumerico'
			));

		}


		$form = new FormController();
		$form->setModulo($_SESSION['moduloTemp'])
			->setAction($_SESSION['actionTemp'])
			->setValue($_SESSION['valueTemp']);

		header('location: ' . $_SERVER['HTTP_REFERER']);
	}
}


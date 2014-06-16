<?php

namespace system\app;

use Respect\Validation\Validator as v;
use system\core\PostController;
use system\model\TbUsuario;

class AcceptFormAdministracao extends PostController
{
	public function cadastrarAdmin()
	{

		try {
			
			v::string()->email()
					   ->notEmpty()
					   ->setName('Doca Alterada')
					   ->setTemplate('O campo {{name}} é obrigatório')
					   ->assert($this->post['doca']);
					   
			try {

				$tbUser = new TbUsuario();
				$dados = $tbUser->save($this->post);
				return $dados;
			   } catch (Exception $e) {
			   }
					   
		} catch (Exception $e) {
			
			throw new Exception();				
			
		}

		
	}
	
}
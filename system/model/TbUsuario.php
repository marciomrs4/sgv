<?php

namespace system\model;

use system\core\DataBase;
class TbUsuario extends DataBase
{
	
	public function save($dados)
	{
		try {
			
			$stmt = $this->conexao->prepare('SELECT * FROM tb_usuario LIMIT 5');
			
			$stmt->execute();
			
			return $stmt;
			
		} catch (Exception $e) {
			throw new \Exception();
		}

		
	}
	
	
	
}
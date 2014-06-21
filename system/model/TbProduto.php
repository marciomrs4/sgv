<?php

namespace system\model;

use system\core\DataBase;
class TbProduto extends DataBase
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
	
	public function getProductTitle($idItem)
	{
		$productList = array('Escondidinho de Carne Seca' => '1',
							 'Escondidinho de Frango' => '2',
							 'Escondidinho de Carne' => '3',
							 'Escondidinho de Carne Moida' => '4',
							 'Escondidinho de Camarão' => '5'
							);
		
		$productTitle = array_search($idItem, $productList);
		return $productTitle;
	}
	
	
}
<?php

namespace system\model;

use system\core\DataBase;
class TbProduto extends DataBase
{
	private $tablename = 'tb_produto';

	public function save($dados)
	{
		try {

			$query = ("INSERT INTO $this->tablename
						(pro_titulo, pro_valor,
						 pro_descricao, tpr_codigo)
						VALUES(?, ?, ?, ?)");

			$stmt = $this->conexao->prepare($query);

			$stmt->bindParam(1,$dados['pro_titulo'],\PDO::PARAM_STR);
			$stmt->bindParam(2,$dados['pro_valor'],\PDO::PARAM_STR);
			$stmt->bindParam(3,$dados['pro_descricao'],\PDO::PARAM_STR);
			$stmt->bindParam(4,$dados['tpr_codigo'],\PDO::PARAM_INT);

			$stmt->execute();
			
			return $this->conexao->lastInsertId();
			
		} catch (\PDOException $e) {
			throw new \PDOException($e->getMessage(), $e->getCode());
		}

		
	}
	
	public function listProductScreenSale()
	{
		$query = ("SELECT * FROM tb_produto");
		
		try {
			
		
		$stmt = $this->conexao->prepare($query);
		
		$stmt->execute();
		
		return($stmt);
		
		} catch (Exception $e) {
			throw new \PDOException($e->getMessage(), $e->getCode());
		}
		
	}
	
	public function getPriceProduct($pro_codigo)
	{
		$query = ("SELECT pro_valor 
					FROM tb_produto
					WHERE pro_codigo = ?");
		
		try {
				
		
			$stmt = $this->conexao->prepare($query);
		
			$stmt->bindParam(1, $pro_codigo, \PDO::PARAM_INT);
			
			$stmt->execute();
			
			$pro_valor = $stmt->fetch(\PDO::FETCH_ASSOC);
			
			return($pro_valor['pro_valor']);
		
		} catch (Exception $e) {
			throw new \PDOException($e->getMessage(), $e->getCode());
		}
		
	}
	
	
	public function getDescriptionProduct($pro_codigo)
	{
		$query = ("SELECT pro_titulo
					FROM tb_produto
					WHERE pro_codigo = ?");
	
		try {
	
	
			$stmt = $this->conexao->prepare($query);
	
			$stmt->bindParam(1, $pro_codigo, \PDO::PARAM_INT);
				
			$stmt->execute();
				
			$pro_valor = $stmt->fetch(\PDO::FETCH_ASSOC);
				
			return($pro_valor['pro_titulo']);
	
		} catch (Exception $e) {
			throw new \PDOException($e->getMessage(), $e->getCode());
		}
	
	}
	
	public function getProductTitle($idItem)
	{
		$productList = array('Escondidinho de Carne Seca' => '1',
							 'Escondidinho de Frango' => '2',
							 'Escondidinho de Carne' => '3',
							 'Escondidinho de Carne Moida' => '4',
							 'Escondidinho de Camar�o' => '5'
							);
		
		$productTitle = array_search($idItem, $productList);
		return $productTitle;
	}
	
	
}
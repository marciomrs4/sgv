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
						 pro_descricao, tpr_codigo,
						 pro_status)
						VALUES(?, ?, ?, ?, ?)");

			$stmt = $this->conexao->prepare($query);

			$stmt->bindParam(1,$dados['pro_titulo'],\PDO::PARAM_STR);
			$stmt->bindParam(2,$dados['pro_valor']);
			$stmt->bindParam(3,$dados['pro_descricao'],\PDO::PARAM_STR);
			$stmt->bindParam(4,$dados['tpr_codigo'],\PDO::PARAM_INT);
			$stmt->bindParam(5,$dados['pro_status'],\PDO::PARAM_STR);

			$stmt->execute();
			
			return $this->conexao->lastInsertId();
			
		} catch (\PDOException $e) {
			throw new \PDOException($e->getMessage(), $e->getCode());
		}

		
	}
	
	public function listProductScreenSale()
	{
		$query = ("SELECT * FROM tb_produto
				   WHERE pro_status = '1'");
		
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

	/**
	 * @return array
	 * Metodo usado na tela de listagem de produto
	 */
	public function listAll()
	{
		$query = (" SELECT pro_codigo, pro_titulo,
 						   pro_valor,pro_descricao,
        				   tpr.tpr_descricao,
        				   (CASE WHEN pro_status = 1 THEN 'ATIVO' ELSE 'INATIVO' END)
					FROM tb_produto AS PRO
					INNER JOIN tb_tipo_produto AS tpr
					ON tpr.tpr_codigo = PRO.tpr_codigo
					ORDER BY 1;");

		$stmt = $this->conexao->prepare($query);

		$stmt->execute();

		return $stmt->fetchAll(\PDO::FETCH_NUM);

		try{


		}catch (\PDOException $e){
			throw new \PDOException($e->getMessage(), $e->getCode());
		}
	}

	/**
	 * @param $pro_codigo
	 * @return mixed
	 * Usado para carregar no form de alerar produto
	 */
	public function getProdutoForm($pro_codigo)
	{
		$query = ("SELECT pro_codigo, pro_titulo, pro_valor,
			       		  pro_descricao, tpr_codigo, pro_status
					FROM $this->tablename
					WHERE pro_codigo = ?");

		$stmt = $this->conexao->prepare($query);

		$stmt->bindParam(1,$pro_codigo,\PDO::PARAM_INT);

		$stmt->execute();

		return $stmt->fetch(\PDO::FETCH_ASSOC);

		try{


		}catch (\PDOException $e){
			throw new \PDOException($e->getMessage(), $e->getCode());
		}
	}

	/**
	 * @param $pro_codigo
	 * @return mixed
	 *
	 */
	public function update($dados)
	{
		$query = ("UPDATE $this->tablename
					SET  pro_titulo = ?,
						 pro_valor = ?,
			       		 pro_descricao = ?,
			       		 tpr_codigo = ?,
			       		 pro_status = ?
					WHERE pro_codigo = ?");
		try{

		$stmt = $this->conexao->prepare($query);

		$stmt->bindParam(1,$dados['pro_titulo'],\PDO::PARAM_STR);
		$stmt->bindParam(2,$dados['pro_valor'],\PDO::PARAM_STR);
		$stmt->bindParam(3,$dados['pro_descricao'],\PDO::PARAM_STR);
		$stmt->bindParam(4,$dados['tpr_codigo'],\PDO::PARAM_INT);
		$stmt->bindParam(5,$dados['pro_status'],\PDO::PARAM_STR);
		$stmt->bindParam(6,$dados['pro_codigo'],\PDO::PARAM_INT);


		$stmt->execute();

		return $stmt;




		}catch (\PDOException $e){
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
	
	/*public function getProductTitle($idItem)
	{
		$productList = array('Escondidinho de Carne Seca' => '1',
							 'Escondidinho de Frango' => '2',
							 'Escondidinho de Carne' => '3',
							 'Escondidinho de Carne Moida' => '4',
							 'Escondidinho de Camar�o' => '5'
							);
		
		$productTitle = array_search($idItem, $productList);
		return $productTitle;
	}*/
	
	
}
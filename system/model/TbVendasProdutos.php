<?php

namespace system\model;

use system\core\DataBase;
class TbVendasProdutos extends DataBase
{
	private $tablename = '';
	
	/**
	 * 
	 * @param unknown $dados
	 * @throws \Exception
	 * 
	 * @example VALUES(:ped_codigo, :vpr_titulo_produto, :vpr_valor_unitario,
						:vpr_quantidade, :vpr_valor_total)")
	 * 
	 */
	public function save($dados)
	{
			
		$query = ("INSERT INTO tb_vendas_produtos
				(ped_codigo, vpr_titulo_produto,
				vpr_valor_unitario, vpr_quantidade, vpr_valor_total)
				VALUES(:ped_codigo, :vpr_titulo_produto, :vpr_valor_unitario,
						:vpr_quantidade, :vpr_valor_total)");
		
		try {
			
			$stmt = $this->conexao->prepare($query);
			
			$stmt->bindParam(':ped_codigo', $dados['ped_codigo'],\PDO::PARAM_INT);
			$stmt->bindParam(':vpr_titulo_produto', $dados['vpr_titulo_produto'],\PDO::PARAM_STR);
			$stmt->bindParam(':vpr_valor_unitario', $dados['vpr_valor_unitario'],\PDO::PARAM_STR);
			$stmt->bindParam(':vpr_quantidade', $dados['vpr_quantidade'],\PDO::PARAM_INT);
			$stmt->bindParam(':vpr_valor_total', $dados['vpr_valor_total'],\PDO::PARAM_STR);															
			
			$stmt->execute();
			
			return $this->conexao->lastInsertId();
			
		} catch (\Exception $e) {
			throw new \Exception($e->getMessage());
		}
		

	}
	
	public function findAll()
	{

		try {
			$stmt = $this->conexao->prepare("select * from tb_vendas_produtos");
			
			$stmt->execute();
			
			return $stmt->fetchAll(\PDO::FETCH_ASSOC);
			
			//return $stmt->fetch(\PDO::FETCH_ASSOC);

			
		} catch (\Exception $e) {
			throw new \Exception($e->getMessage());
		}
	}
	
}
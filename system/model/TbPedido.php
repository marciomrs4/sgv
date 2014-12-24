<?php

namespace system\model;

use system\core\DataBase;
class TbPedido extends DataBase
{
	
	/**
	 * 
	 * @param unknown $dados
	 * @throws \Exception
	 * @return string
	 * 
	 * @example VALUES[ :ped_numero, :ped_cliente, :usu_codigo,
					   :ped_valor_total, :stp_codigo ];
	 */
	
	public function save($dados)
	{
		$query = ("INSERT INTO tb_pedido
					(ped_numero, ped_cliente,
					usu_codigo, ped_valor_total, stp_codigo, uve_codigo)
					VALUES(?, ?, ?, ?, ?, ?)");
		try {
			
			$stmt = $this->conexao->prepare($query);
			
			$cliente = mb_convert_encoding($dados['ped_cliente'],'UTF-8');
			
			$stmt->bindParam(1, $dados['ped_numero'],\PDO::PARAM_INT);
			$stmt->bindParam(2, $cliente);
			$stmt->bindParam(3, $dados['usu_codigo'],\PDO::PARAM_INT);
			$stmt->bindParam(4, $dados['ped_valor_total'],\PDO::PARAM_STR);
			$stmt->bindParam(5, $dados['stp_codigo'],\PDO::PARAM_INT);															
			$stmt->bindParam(6, $dados['uve_codigo'],\PDO::PARAM_INT);
						
			$stmt->execute();
			
			return $this->conexao->lastInsertId();
			
		} catch (\Exception $e) {
			throw new \Exception('Erro ao inserir na tabela '.$dados['ped_cliente'].' - '.$cliente. ' - ' .get_class($this).$e->getMessage());
		}

		
	}
	
	public function updateValorTotal($dados)
	{
		$query = ("UPDATE tb_pedido
					SET ped_valor_total = ?
					WHERE ped_codigo = ?");
		
		try {
			
			$stmt = $this->conexao->prepare($query);
			
			$stmt->bindParam(1,$dados['ped_valor_total'],\PDO::PARAM_INT);
			$stmt->bindParam(2,$dados['ped_codigo'],\PDO::PARAM_INT);			
			
			$stmt->execute();
			
			return $stmt;
			
		} catch (\PDOException $e) {
			throw new \PDOException($e->getMessage(), $e->getCode());
		}
	}
	
	public function getPedNumber()
	{
		$query = ("SELECT MAX(ped_codigo) FROM tb_pedido ");
		
		try {
			
			$stmt = $this->conexao->prepare($query);
			
			$stmt->execute();
			
			$number = $stmt->fetch(\PDO::FETCH_NUM);
			
			return $number[0] + 1;
			
		} catch (\PDOException $e) {
			throw new \PDOException($e->getMessage());
		}
	}
	
	public function getPedidoInformacao($ped_codigo)
	{
		$query = ("SELECT * FROM tb_pedido 
					WHERE ped_codigo = ?");
		
		try {
				
			$stmt = $this->conexao->prepare($query);

			$stmt->bindParam(1, $ped_codigo, \PDO::PARAM_INT);
			
			$stmt->execute();
				
			return $stmt->fetch(\PDO::FETCH_ASSOC);
				
		} catch (\PDOException $e) {
			throw new \PDOException($e->getMessage());
		}
		
		
	}
	
}
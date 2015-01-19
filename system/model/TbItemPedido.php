<?php

namespace system\model;

use system\core\DataBase;
class TbItemPedido extends DataBase
{
	
	private $table = 'tb_itens_pedido';
	
	private $vpr_codigo = 'vpr_codigo';
	private $ped_codigo = 'ped_codigo';
	private $vpr_titulo_produto = 'vpr_titulo_produto';
	private $vpr_valor_unitario = 'vpr_valor_unitario';
	private $vpr_quantidade = 'vpr_quantidade';
	private $vpr_valor_total = 'vpr_valor_total';
	
	public function save($dados)
	{
		
		$query = ("INSERT INTO tb_itens_pedido
						(ped_codigo, vpr_titulo_produto,
							vpr_valor_unitario, vpr_quantidade, vpr_valor_total)
						VALUES(?, ?, ?, ?, ?)");
		
		try {
			
			$stmt = $this->conexao->prepare($query);
			
			$stmt->bindParam(1, $dados['ped_codigo'],\PDO::PARAM_INT);
			$stmt->bindParam(2, $dados['vpr_titulo_produto'],\PDO::PARAM_STR);
			$stmt->bindParam(3, $dados['vpr_valor_unitario'],\PDO::PARAM_STR);
			$stmt->bindParam(4, $dados['vpr_quantidade'],\PDO::PARAM_INT);
			$stmt->bindParam(5, $dados['vpr_valor_total'],\PDO::PARAM_STR);															
			
			$stmt->execute();
			
			return $this->conexao->lastInsertId();
			
		} catch (\PDOException $e) {
			throw new \PDOException('Erro ao inserir em: '.get_class($this).' Erro: '.$e->getMessage());
		}
		
		
		
	}
	
	public function getItensPedido($ped_codigo)
	{
		$query = ("SELECT * FROM tb_itens_pedido
					WHERE ped_codigo = ?");
		
		try {
		
			$stmt = $this->conexao->prepare($query);
		
			$stmt->bindParam(1, $ped_codigo, \PDO::PARAM_INT);
				
			$stmt->execute();
		
			return $stmt->fetchAll(\PDO::FETCH_ASSOC);
		
		} catch (\PDOException $e) {
			throw new \PDOException($e->getMessage());
		}
		
	}

	public function getListarItensPedido($ped_codigo)
	{
		$query = ("SELECT vpr_codigo, vpr_titulo_produto, vpr_valor_unitario,
						  vpr_quantidade, vpr_valor_total
				   FROM tb_itens_pedido
				   WHERE ped_codigo = ?;");

		try {

			$stmt = $this->conexao->prepare($query);

			$stmt->bindParam(1, $ped_codigo, \PDO::PARAM_INT);

			$stmt->execute();

			return $stmt->fetchAll(\PDO::FETCH_ASSOC);

		} catch (\PDOException $e) {
			throw new \PDOException($e->getMessage());
		}

	}

}
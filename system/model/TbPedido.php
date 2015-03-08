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
					(ped_numero, ped_cliente, usu_codigo,
					 ped_valor_total, stp_codigo, uve_codigo)
					VALUES(?, ?, ?, ?, ?, ?)");
		try {
			
			$stmt = $this->conexao->prepare($query);
			
			$cliente = $dados['ped_cliente'];
			
			$stmt->bindParam(1, $dados['ped_numero'],\PDO::PARAM_INT);
			$stmt->bindParam(2, $cliente);
			$stmt->bindParam(3, $dados['usu_codigo'],\PDO::PARAM_INT);
			$stmt->bindParam(4, $dados['ped_valor_total'],\PDO::PARAM_STR);
			$stmt->bindParam(5, $dados['stp_codigo'],\PDO::PARAM_INT);															
			$stmt->bindParam(6, $dados['uve_codigo'],\PDO::PARAM_INT);
						
			$stmt->execute();
			
			return $this->conexao->lastInsertId();
			
		} catch (\Exception $e) {
			throw new \Exception('Erro ao inserir na tabela ' . get_class($this) .' - '. $e->getMessage());
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

	/*
	 * @use Obtem o numero do pedido gerado da unidade de venda e data do dia
	 *
	 */
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

	/**
	 * @param $ped_codigo
	 * @return mixed
	 * Usado para gerar informacoes para impressao na tela
	 * de resultado do pedido por toque
	 */
	public function getPedidoInformacao($ped_codigo)
	{
		$query = ("SELECT ped_data_venda, ped_valor_total, ped_cliente
 					FROM tb_pedido
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

	/**
	 * @param $ped_codigo
	 * @return array
	 * Lista pedido nas telas de buscar pedido: Comercial ou Adm
	 */
	public function getListarPedido($ped_codigo)
	{
		$query = ("select ped_codigo, ped_numero, ped_cliente,
						  (SELECT usu_nome FROM tb_usuario WHERE usu_codigo = PED.usu_codigo) AS usu_codigo,
						  date_format(ped_data_venda,'%d/%m/%Y %h:%i:%s') AS ped_data_venda, ped_valor_total,
						 (SELECT stp_descricao FROM tb_status_pedido WHERE stp_codigo = PED.stp_codigo) as stp_codigo,
    			         (SELECT uve_nome FROM tb_unidade_venda WHERE uve_codigo = PED.uve_codigo) AS uve_codigo
					from tb_pedido AS PED
					where ped_codigo = ?;
				 ");

		try {

			$stmt = $this->conexao->prepare($query);

			$stmt->bindParam(1, $ped_codigo, \PDO::PARAM_INT);

			$stmt->execute();

			return $stmt->fetchAll(\PDO::FETCH_ASSOC);

		} catch (\PDOException $e) {
			throw new \PDOException($e->getMessage());
		}


	}

	/**
	 * @param $stp_codigo
	 * @return array
	 * Pedidos painel por status
	 */
	public function listPedidoPainel($stp_codigo)
	{
		$query = ("select ped_numero, ped_cliente,
					date_format(ped_data_venda,'%d/%m/%Y %H:%i:%s') AS ped_data_venda
					from tb_pedido
					where stp_codigo = ?
					LIMIT 5;");


		try {

			$stmt = $this->conexao->prepare($query);

			$stmt->bindParam(1, $stp_codigo, \PDO::PARAM_INT);

			$stmt->execute();

			return $stmt->fetchAll(\PDO::FETCH_NUM);

		} catch (\PDOException $e) {
			throw new \PDOException($e->getMessage());
		}

	}

	/**
	 * @param $dados
	 * @return \PDOStatement
	 * Usado para alterar o status do pedido
	 */
	public function updaStatus($dados)
	{
		$query = ("UPDATE tb_pedido
					SET stp_codigo = ?
					WHERE ped_codigo = ?");

		try {

			$stmt = $this->conexao->prepare($query);

			$stmt->bindParam(1,$dados['stp_codigo'],\PDO::PARAM_INT);
			$stmt->bindParam(2,$dados['ped_codigo'],\PDO::PARAM_INT);

			$stmt->execute();

			return $stmt;

		} catch (\PDOException $e) {
			throw new \PDOException($e->getMessage(), $e->getCode());
		}
	}

}
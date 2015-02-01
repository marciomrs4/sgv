<?php

namespace system\model;

use system\core\DataBase;
class TbStatusPedido extends DataBase
{
	private $tablename = 'tb_status_pedido';

	/**
	 * @param $dados
	 * @return string
	 * stp_codigo
	   stp_descricao
	 */

	#Usado para gravar na tabela status_pedido
	public function save($dados)
	{
		try {

			$query = ("INSERT INTO $this->tablename
						(stp_descricao)
						VALUES(?)");

			$stmt = $this->conexao->prepare($query);

			$stmt->bindParam(1,$dados['stp_descricao'],\PDO::PARAM_STR);

			$stmt->execute();
			
			return $this->conexao->lastInsertId();
			
		} catch (\PDOException $e) {
			throw new \PDOException($e->getMessage(), $e->getCode());
		}

		
	}

	/**
	 * @return array
	 * Usado para listrar os dados na tela de listagem de status pedido
	 */
	public function listAll()
	{
		try {

			$query = ("SELECT stp_codigo, stp_descricao
						FROM $this->tablename");

			$stmt = $this->conexao->prepare($query);


			$stmt->execute();

			return $stmt->fetchAll(\PDO::FETCH_NUM);

		} catch (\PDOException $e) {
			throw new \PDOException($e->getMessage(), $e->getCode());
		}


	}

	/**
	 * @param $dados
	 * @return \PDOStatement
	 * Usado para atualizar os dados da tb_status_pedido
	 */
	public function update($dados)
	{
		try {

			$query = ("UPDATE $this->tablename
						SET stp_descricao = ?
						WHERE stp_codigo = ?");

			$stmt = $this->conexao->prepare($query);

			$stmt->bindParam(1,$dados['stp_descricao'],\PDO::PARAM_STR);
			$stmt->bindParam(2,$dados['stp_codigo'],\PDO::PARAM_INT);

			$stmt->execute();

			return $stmt;

		} catch (\PDOException $e) {
			throw new \PDOException($e->getMessage(), $e->getCode());
		}


	}

	/**
	 * @param $stp_codigo
	 * @return mixed
	 * Usado para carregar informacoes no form para alteracao
	 */
	public function getForm($stp_codigo)
	{
		try {

			$query = ("SELECT stp_codigo, stp_descricao
						FROM $this->tablename
						WHERE stp_codigo = ?");

			$stmt = $this->conexao->prepare($query);

			$stmt->bindParam(1,$stp_codigo,\PDO::PARAM_INT);

			$stmt->execute();

			return $stmt->fetch(\PDO::FETCH_ASSOC);

		} catch (\PDOException $e) {
			throw new \PDOException($e->getMessage(), $e->getCode());
		}


	}

	/**
	 * @param $stp_codigo
	 * @return \PDOStatement
	 *
	 * Deleta uma linha
	 */
	public function delete($stp_codigo)
	{
		try {

			$query = ("DELETE FROM $this->tablename
						WHERE stp_codigo = ?");

			$stmt = $this->conexao->prepare($query);

			$stmt->bindParam(1,$stp_codigo,\PDO::PARAM_INT);

			$stmt->execute();

			return $stmt;

		} catch (\PDOException $e) {
			throw new \PDOException($e->getMessage(), $e->getCode());
		}


	}

	/**
	 * @return array
	 *
	 * Lista os status de pedido para o Painel de Pedido
	 */
	public function listAllAssoc()
	{
		try {

			$query = ("SELECT stp_codigo, stp_descricao
						FROM $this->tablename");

			$stmt = $this->conexao->prepare($query);


			$stmt->execute();

			return $stmt->fetchAll(\PDO::FETCH_ASSOC);

		} catch (\PDOException $e) {
			throw new \PDOException($e->getMessage(), $e->getCode());
		}


	}


}
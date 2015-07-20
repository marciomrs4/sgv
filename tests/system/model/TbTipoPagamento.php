<?php

namespace system\model;

use system\core\DataBase;

class TbTipoPagamento extends DataBase
{
	private $tablename = 'tb_tipo_pagamento';
	
	public function save($dados)
	{
		try {

			$query = ("INSERT INTO $this->tablename
						(tpa_descricao, tpa_status )
						VALUES(?, ?)");

			$stmt = $this->conexao->prepare($query);

			$stmt->bindParam(1,$dados['tpa_descricao'],\PDO::PARAM_STR);
			$stmt->bindParam(2,$dados['tpa_status'],\PDO::PARAM_STR);

			$stmt->execute();
			
			return $this->conexao->lastInsertId();
			
		} catch (\PDOException $e) {
			throw new \PDOException($e->getMessage(), $e->getCode());
		}

		
	}

	public function listAll()
	{
		try {

			$query = ("SELECT tpa_codigo, tpa_descricao,
								(CASE WHEN tpa_status = 1 THEN 'ATIVO' ELSE 'INATIVO' END)
						FROM $this->tablename");

			$stmt = $this->conexao->prepare($query);


			$stmt->execute();

			return $stmt->fetchAll(\PDO::FETCH_ASSOC);

		} catch (\PDOException $e) {
			throw new \PDOException($e->getMessage(), $e->getCode());
		}


	}

	public function listScreenSale()
	{
		try {

			$query = ("SELECT tpa_codigo, tpa_descricao,
								(CASE WHEN tpa_status = 1 THEN 'ATIVO' ELSE 'INATIVO' END)
						FROM $this->tablename
						WHERE tpa_status = 1");

			$stmt = $this->conexao->prepare($query);


			$stmt->execute();

			return $stmt->fetchAll(\PDO::FETCH_ASSOC);

		} catch (\PDOException $e) {
			throw new \PDOException($e->getMessage(), $e->getCode());
		}


	}


	public function listFormProduto()
	{
		try {

			$query = ("SELECT tpr_codigo, tpr_descricao
						FROM $this->tablename");

			$stmt = $this->conexao->prepare($query);


			$stmt->execute();

			return $stmt->fetchAll(\PDO::FETCH_ASSOC);

		} catch (\PDOException $e) {
			throw new \PDOException($e->getMessage(), $e->getCode());
		}


	}


	public function update($dados)
	{
		try {

			$query = ("UPDATE $this->tablename
						SET tpa_descricao = ?,
							tpa_status = ?
						WHERE tpa_codigo = ?");

			$stmt = $this->conexao->prepare($query);

			$stmt->bindParam(1,$dados['tpa_descricao'],\PDO::PARAM_STR);
			$stmt->bindParam(2,$dados['tpa_status'],\PDO::PARAM_STR);
			$stmt->bindParam(3,$dados['tpa_codigo'],\PDO::PARAM_INT);

			$stmt->execute();

			return $stmt;

		} catch (\PDOException $e) {
			throw new \PDOException($e->getMessage(), $e->getCode());
		}


	}


	public function getForm($tpa_codigo)
	{
		try {

			$query = ("SELECT tpa_codigo, tpa_descricao, tpa_status
						FROM $this->tablename
						WHERE tpa_codigo = ?");

			$stmt = $this->conexao->prepare($query);

			$stmt->bindParam(1,$tpa_codigo,\PDO::PARAM_INT);

			$stmt->execute();

			return $stmt->fetch(\PDO::FETCH_ASSOC);

		} catch (\PDOException $e) {
			throw new \PDOException($e->getMessage(), $e->getCode());
		}


	}


}
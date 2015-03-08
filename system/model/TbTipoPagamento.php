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
						(tpr_descricao)
						VALUES(?)");

			$stmt = $this->conexao->prepare($query);

			$stmt->bindParam(1,$dados['tpr_descricao'],\PDO::PARAM_STR);

			$stmt->execute();
			
			return $this->conexao->lastInsertId();
			
		} catch (\PDOException $e) {
			throw new \PDOException($e->getMessage(), $e->getCode());
		}

		
	}

	public function listAll()
	{
		try {

			$query = ("SELECT tpa_codigo, tpa_descricao
						FROM $this->tablename");

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
						SET tpr_descricao = ?
						WHERE tpr_codigo = ?");

			$stmt = $this->conexao->prepare($query);

			$stmt->bindParam(1,$dados['tpr_descricao'],\PDO::PARAM_STR);
			$stmt->bindParam(2,$dados['tpr_codigo'],\PDO::PARAM_INT);

			$stmt->execute();

			return $stmt;

		} catch (\PDOException $e) {
			throw new \PDOException($e->getMessage(), $e->getCode());
		}


	}


	public function getForm($tpr_codigo)
	{
		try {

			$query = ("SELECT tpr_codigo, tpr_descricao
						FROM $this->tablename
						WHERE tpr_codigo = ?");

			$stmt = $this->conexao->prepare($query);

			$stmt->bindParam(1,$tpr_codigo,\PDO::PARAM_INT);

			$stmt->execute();

			return $stmt->fetch(\PDO::FETCH_ASSOC);

		} catch (\PDOException $e) {
			throw new \PDOException($e->getMessage(), $e->getCode());
		}


	}


}
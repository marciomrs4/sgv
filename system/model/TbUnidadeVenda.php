<?php

namespace system\model;

use system\core\DataBase;

class TbUnidadeVenda extends DataBase
{
	private $tablename = 'tb_unidade_venda';
	
	public function save($dados)
	{
		try {

			$query = ("INSERT INTO $this->tablename
						(uve_nome, uve_logradouro)
						VALUES(?, ?);");

			$stmt = $this->conexao->prepare($query);

			$stmt->bindParam(1,$dados['uve_nome'],\PDO::PARAM_STR);
			$stmt->bindParam(2,$dados['uve_logradouro'],\PDO::PARAM_STR);

			$stmt->execute();
			
			return $this->conexao->lastInsertId();
			
		} catch (\PDOException $e) {
			throw new \PDOException($e->getMessage(), $e->getCode());
		}

		
	}

	#Utilizado para listar unidade de venda na tela de
	#unidade de venda
	public function listUnidadeVenda()
	{
		$query = ("SELECT uve_codigo, uve_nome, uve_logradouro
					FROM $this->tablename");
		
		try {
			
		
		$stmt = $this->conexao->prepare($query);
		
		$stmt->execute();
		
		return($stmt->fetchAll(\PDO::FETCH_NUM));
		
		} catch (\PDOException $e) {
			throw new \PDOException($e->getMessage(), $e->getCode());
		}
		
	}

	#Utilizado para listar unidade de venda na tela de
	#Selecionar unidade de venda
	public function listUnidadeVendaByName()
	{
		$query = ("SELECT uve_codigo, uve_nome
					FROM $this->tablename");

		try {


			$stmt = $this->conexao->prepare($query);

			$stmt->execute();

			return($stmt->fetchAll(\PDO::FETCH_ASSOC));

		} catch (\PDOException $e) {
			throw new \PDOException($e->getMessage(), $e->getCode());
		}

	}

	public function getUnidadeVendaForm($uve_codigo)
	{
		$query = ("SELECT uve_codigo, uve_nome, uve_logradouro
					FROM $this->tablename
					WHERE uve_codigo = ?");

		try {


			$stmt = $this->conexao->prepare($query);

			$stmt->bindParam(1,$uve_codigo,\PDO::PARAM_INT);

			$stmt->execute();

			return($stmt->fetch(\PDO::FETCH_ASSOC));

		} catch (\PDOException $e) {
			throw new \PDOException($e->getMessage(), $e->getCode());
		}

	}


	public function update($dados)
	{
		try {

			$query = ("UPDATE $this->tablename
						SET uve_nome = ?,
							uve_logradouro = ?
						WHERE uve_codigo = ?;");

			$stmt = $this->conexao->prepare($query);

			$stmt->bindParam(1,$dados['uve_nome'],\PDO::PARAM_STR);
			$stmt->bindParam(2,$dados['uve_logradouro'],\PDO::PARAM_STR);
			$stmt->bindParam(3,$dados['uve_codigo'],\PDO::PARAM_INT);

			$stmt->execute();

			return $stmt;

		} catch (\PDOException $e) {
			throw new \PDOException($e->getMessage(), $e->getCode());
		}


	}

}
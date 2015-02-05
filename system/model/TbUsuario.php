<?php

namespace system\model;

use system\core\DataBase;
class TbUsuario extends DataBase
{

	private $tablename = 'tb_usuario';

	public function save($dados)
	{
		$query = ("INSERT INTO $this->tablename
					(usu_nome, usu_senha,
					usu_login, per_codigo)
					VALUES(?, ?, ?, ?)");

		try {
			
			$stmt = $this->conexao->prepare($query);

			$stmt->bindParam(1,$dados['usu_nome'],\PDO::PARAM_STR);
			$stmt->bindParam(2,$dados['usu_senha'],\PDO::PARAM_STR);
			$stmt->bindParam(3,$dados['usu_login'],\PDO::PARAM_STR);
			$stmt->bindParam(4,$dados['per_codigo'],\PDO::PARAM_STR);


			$stmt->execute();
			
			return $this->conexao->lastInsertId();
			
		} catch (\PDOException $e) {
			throw new \PDOException($e->getMessage(), $e->getCode());
		}

		
	}

	public function update($dados)
	{

		$query = ("UPDATE $this->tablename
					SET usu_nome = ?,
						usu_senha = ?,
						usu_login = ?,
						per_codigo = ?
					WHERE usu_codigo = ?");

		try {

			$stmt = $this->conexao->prepare($query);

			$stmt->bindParam(1,$dados['usu_nome'],\PDO::PARAM_STR);
			$stmt->bindParam(2,$dados['usu_senha'],\PDO::PARAM_STR);
			$stmt->bindParam(3,$dados['usu_login'],\PDO::PARAM_STR);
			$stmt->bindParam(4,$dados['per_codigo'],\PDO::PARAM_STR);
			$stmt->bindParam(5,$dados['usu_codigo'],\PDO::PARAM_INT);

			$stmt->execute();

			return $stmt;

		} catch (\PDOException $e) {
			throw new \PDOException($e->getMessage(), $e->getCode());
		}


	}

	public function listAll()
	{

		$query = ("SELECT usu_codigo, usu_nome, usu_senha,
						usu_login, per_codigo
					 FROM $this->tablename");

		try {

			$stmt = $this->conexao->prepare($query);

			$stmt->execute();

			return $stmt->fetchAll(\PDO::FETCH_NUM);

		} catch (\PDOException $e) {
			throw new \PDOException($e->getMessage(), $e->getCode());
		}


	}

	public function getFormUser($usu_codigo)
	{

		$query = ("SELECT usu_codigo, usu_nome, usu_senha,
						usu_login, per_codigo
					 FROM $this->tablename
					 WHERE usu_codigo = ?");

		try {

			$stmt = $this->conexao->prepare($query);

			$stmt->bindParam(1,$usu_codigo,\PDO::PARAM_INT);

			$stmt->execute();

			return $stmt->fetch(\PDO::FETCH_ASSOC);

		} catch (\PDOException $e) {
			throw new \PDOException($e->getMessage(), $e->getCode());
		}


	}

	/**
	 * @param $dados
	 * @return mixed
	 * Valida o login do usuario
	 */
	public function validateUser($dados)
	{

		$query = ("SELECT usu_codigo, usu_nome, usu_senha,
						usu_login, per_codigo
					 FROM $this->tablename
					 WHERE usu_login = ?
					 AND usu_senha = ?");

		try {

			$stmt = $this->conexao->prepare($query);

			$stmt->bindParam(1,$dados['usu_login'],\PDO::PARAM_STR);
			$stmt->bindParam(2,$dados['usu_senha'],\PDO::PARAM_STR);

			$stmt->execute();

			return $stmt;

		} catch (\PDOException $e) {
			throw new \PDOException($e->getMessage(), $e->getCode());
		}


	}

}
<?php

namespace system\model;

use system\core\DataBase;

class TbPagamentoPedido extends DataBase
{
	private $tablename = 'tb_pagamento_pedido';
	
	/**
	 * 
	 * @param unknown $dados
	 * @throws \Exception
	 * 
	 * @example VALUES(:ppe_codigo, ped_codigo
					    tpa_codigo, ppe_valor)")
	 * 
	 */
	public function save($dados)
	{
			
		$query = ("INSERT INTO $this->tablename
					(ped_codigo, tpa_codigo, ppe_valor)
					VALUES(?, ?, ?)");
		
		try {
			
			$stmt = $this->conexao->prepare($query);

			$stmt->bindParam(1, $dados['ped_codigo'],\PDO::PARAM_STR);
			$stmt->bindParam(2, $dados['tpa_codigo'],\PDO::PARAM_STR);
			$stmt->bindParam(3, $dados['ppe_valor'],\PDO::PARAM_INT);
			
			$stmt->execute();
			
			return $this->conexao->lastInsertId();
			
		} catch (\Exception $e) {
			throw new \Exception($e->getMessage());
		}
		

	}
	
	public function findAll()
	{

		try {
			$stmt = $this->conexao->prepare("select * from tb_itens_pedido");
			
			$stmt->execute();
			
			return $stmt->fetchAll(\PDO::FETCH_ASSOC);
			
			//return $stmt->fetch(\PDO::FETCH_ASSOC);

			
		} catch (\Exception $e) {
			throw new \Exception($e->getMessage());
		}
	}

    public function getTipoPagamento($ped_codigo)
    {
        try {

            $query = ("SELECT (SELECT tpa_descricao
                                  FROM tb_tipo_pagamento
                                  WHERE tpa_codigo = PAG.tpa_codigo) AS tipo_pagamento
                       FROM tb_pagamento_pedido AS PAG
                       WHERE ped_codigo = ?");

            $stmt = $this->conexao->prepare($query);

            $stmt->bindParam(1,$ped_codigo,\PDO::PARAM_INT);

            $stmt->execute();

            $tipoPagamento = $stmt->fetch(\PDO::FETCH_ASSOC);

            return $tipoPagamento['tipo_pagamento'];

        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
    }
	
}

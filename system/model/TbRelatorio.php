<?php

namespace system\model;

use system\core\DataBase;
class TbRelatorio extends DataBase
{

	/**
	 * @param $dados
	 * @return array
	 * @throws \Exception
	 * Pesquisa de valor de venda por produto
	 **************************************
	 */
	public function listarValorVendaPorProduto()
	{
		$query = ("Select b.ped_codigo, b.vpr_titulo_produto, sum(a.ped_valor_total)
					from sgv.tb_pedido a, sgv.tb_itens_pedido b
					where a.ped_codigo = b.ped_codigo
					group by b.vpr_titulo_produto
					order by 3 desc");
		
		try {
			
			$stmt = $this->conexao->prepare($query);
			
			$stmt->execute();
			
			return $stmt->fetchAll(\PDO::FETCH_NUM);
			
		} catch (Exception $e) {
			throw new \Exception();
		}

		
	}
	
	
	public function valordevendapordatavenda()
	{
		$query = ("Select sum(tb_pedido.ped_valor_total), 
						tb_pedido.ped_data_venda 
					from tb_pedido order by 
					tb_pedido.ped_data_venda");
	
		try {
				
			$stmt = $this->conexao->prepare($query);
				
			$stmt->execute();
				
			return $stmt->fetchAll(\PDO::FETCH_NUM);
				
		} catch (Exception $e) {
			throw new \Exception();
		}
	
	
	}

	/**
	 * @return array
	 * @throws \Exception
	 * Pesquisa de valor de venda por unidade de venda e data de venda
	 */
	public function listarValorVendaByUnidadeVendaData()
	{
		$query = ("select  b.uve_nome,
					date(a.ped_data_venda),
					sum(a.ped_valor_total)
					from sgv.tb_pedido a ,
					sgv.tb_unidade_venda b
					where a.uve_codigo = b.uve_codigo
					group by b.uve_nome,
					date(a.ped_data_venda)
					order by b.uve_nome,
					date(a.ped_data_venda);");
	
		try {
	
			$stmt = $this->conexao->prepare($query);
	
			$stmt->execute();
	
			return $stmt->fetchAll(\PDO::FETCH_NUM);
	
		} catch (Exception $e) {
			throw new \Exception();
		}
	
	
	}

	/**
	 * @return array
	 * @throws \Exception
	 * Pequisa de pedidos por unidade de venda
	 ***************************************
	 */
	public function listarPedidoPorUnidadeVenda()
	{
		$query = ("select c.uve_nome,
					a.ped_codigo,
						a.vpr_titulo_produto,
						a.vpr_quantidade,
						b.ped_valor_total
					from sgv.tb_itens_pedido a ,
						sgv.tb_pedido b,
						sgv.tb_unidade_venda c
					where a.ped_codigo = b.ped_codigo;");
	
		try {
	
			$stmt = $this->conexao->prepare($query);
	
			$stmt->execute();
	
			return $stmt->fetchAll(\PDO::FETCH_NUM);
	
		} catch (Exception $e) {
			throw new \Exception();
		}
	
	
	}
		
	
	
}
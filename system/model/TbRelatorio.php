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

	/**
	 * @return array
	 * @throws \Exception
	 *
	 * Quantidade de Pedidos e Valor Total do dia
	 ***************************************************
	Select	"Numero de Pedidos",
	count(*),
	"Valor Faturado" ,
	sum(ped_valor_total)
	from 	tb_pedido
	where 	date(ped_data_venda) =?
	and 	uve_codigo =?
	 */

	public function quantidadePedidosValorTotaldia($dados)
	{
		$query = ("SELECT 'Numero de Pedidos', COUNT(*),
						  'Valor Faturado', SUM(ped_valor_total)
					FROM	tb_pedido
					WHERE 	DATE(ped_data_venda) BETWEEN ? AND ?
					AND 	uve_codigo = ?");

		try {

			$stmt = $this->conexao->prepare($query);

			$stmt->bindParam(1,$dados['data1'],\PDO::PARAM_STR);
			$stmt->bindParam(2,$dados['data2'],\PDO::PARAM_STR);
			$stmt->bindParam(3,$dados['uve_codigo'],\PDO::PARAM_INT);

			$stmt->execute();

			return $stmt->fetchAll(\PDO::FETCH_NUM);

		} catch (Exception $e) {
			throw new \Exception();
		}


	}

	/**
	 * @param $dados
	 * @return array
	 * @throws \Exception
	 *
	 *  Totais por produto
	 **********************

	select	b.vpr_titulo_produto,
	count(b.vpr_quantidade),
	sum(b.vpr_valor_total)
	from 	tb_pedido a,
	tb_itens_pedido b
	where  	date(a.ped_data_venda) =?
	and 	a.uve_codigo =?
	and 	a.ped_codigo = b.ped_codigo
	group by b.vpr_titulo_produto
	order by sum(b.vpr_valor_total) desc
	 *
	 */
	public function totalPorProduto($dados)
	{
		$query = ("	select	b.vpr_titulo_produto,
					count(b.vpr_quantidade),
					sum(b.vpr_valor_total)
					from 	tb_pedido a,
					tb_itens_pedido b
					where  	date(a.ped_data_venda) BETWEEN ? AND ?
					and 	a.uve_codigo = ?
					and 	a.ped_codigo = b.ped_codigo
					group by b.vpr_titulo_produto
					order by sum(b.vpr_valor_total) desc");

		try {

			$stmt = $this->conexao->prepare($query);


			$stmt->bindParam(1,$dados['data1'],\PDO::PARAM_STR);
			$stmt->bindParam(2,$dados['data2'],\PDO::PARAM_STR);
			$stmt->bindParam(3,$dados['uve_codigo'],\PDO::PARAM_INT);

			$stmt->execute();

			return $stmt->fetchAll(\PDO::FETCH_NUM);

		} catch (Exception $e) {
			throw new \Exception();
		}


	}


	/**
	 * @param $dados
	 * @return array
	 * @throws \Exception
	 *
	 * Totais por tipo de pagamento
	 **********************************

	Select 	c.tpa_descricao,
	count(b.ped_codigo),
	sum(b.ped_valor_total)
	from 	tb_pedido b ,
	tb_pagamento_pedido a ,
	tb_tipo_pagamento c
	where  	date(b.ped_data_venda) =?
	and 	b.uve_codigo =?
	and 	a.ped_codigo=b.ped_codigo
	and 	a.tpa_codigo = c.tpa_codigo
	group by c.tpa_descricao
	order by sum(b.ped_valor_total) desc
	 */

	public function totaisPorTipoPagamento($dados)
	{
		$query = ("Select 	c.tpa_descricao,
					count(b.ped_codigo),
					sum(b.ped_valor_total)
					from 	tb_pedido b ,
					tb_pagamento_pedido a ,
					tb_tipo_pagamento c
					where  	date(b.ped_data_venda) BETWEEN ? AND ?
					and 	b.uve_codigo = ?
					and 	a.ped_codigo=b.ped_codigo
					and 	a.tpa_codigo = c.tpa_codigo
					group by c.tpa_descricao
					order by sum(b.ped_valor_total) desc");

		try {

			$stmt = $this->conexao->prepare($query);

			$stmt->bindParam(1,$dados['data1'],\PDO::PARAM_STR);
			$stmt->bindParam(2,$dados['data2'],\PDO::PARAM_STR);
			$stmt->bindParam(3,$dados['uve_codigo'],\PDO::PARAM_INT);

			$stmt->execute();

			return $stmt->fetchAll(\PDO::FETCH_NUM);

		} catch (Exception $e) {
			throw new \Exception();
		}
	}

	/**
	 * @param $dados
	 * @return array
	 * @throws \Exception
	 *
	Lista de Pedidos
	 ********************
	Select 	a.ped_numero,
	a.ped_cliente,
	a.ped_valor_total,
	c.tpa_descricao
	from 	tb_pedido a,
	tb_pagamento_pedido b,
	tb_tipo_pagamento c
	where  	date(a.ped_data_venda) =?
	and 	a.uve_codigo =?
	and 	a.ped_codigo=b.ped_codigo
	and 	b.tpa_codigo = c.tpa_codigo
	order by 1
	 *
	 */

	public function listaDePedido($dados)
	{
		$query = ("Select 	a.ped_numero,
						a.ped_cliente,
						a.ped_valor_total,
						c.tpa_descricao
					from 	tb_pedido a,
					tb_pagamento_pedido b,
					tb_tipo_pagamento c
					where  	date(a.ped_data_venda) BETWEEN ? AND ?
					and 	a.uve_codigo =?
					and 	a.ped_codigo=b.ped_codigo
					and 	b.tpa_codigo = c.tpa_codigo
					order by 1");

		try {

			$stmt = $this->conexao->prepare($query);

/*			$dados['data1'] = date('Y-m-d');
			$dados['data1'] = date('Y-m-d');*/

			$stmt->bindParam(1,$dados['data1'],\PDO::PARAM_STR);
			$stmt->bindParam(2,$dados['data2'],\PDO::PARAM_STR);
			$stmt->bindParam(3,$dados['uve_codigo'],\PDO::PARAM_INT);

			$stmt->execute();

			return $stmt->fetchAll(\PDO::FETCH_NUM);

		} catch (Exception $e) {
			throw new \Exception();
		}


	}


	public function getGraficTopProdutoVendido($dados)
	{
		$query = ("SELECT count(*), vpr_titulo_produto
					FROM tb_itens_pedido
					WHERE ped_codigo
						IN (SELECT ped_codigo FROM tb_pedido
								WHERE uve_codigo LIKE ?
								AND date(ped_data_venda)
								BETWEEN ? AND ?)
					GROUP BY vpr_titulo_produto
					ORDER BY 1 DESC
					LIMIT 10;");

		try{

			$stmt = $this->conexao->prepare($query);

			$stmt->bindParam(1,$dados['uve_codigo'],\PDO::PARAM_INT);
			$stmt->bindParam(2,$dados['data1'],\PDO::PARAM_STR);
			$stmt->bindParam(3,$dados['data2'],\PDO::PARAM_STR);

			$stmt->execute();

			return $stmt->fetchAll(\PDO::FETCH_NUM);

		}catch (\PDOException $e){
			throw new \PDOException($e->getMessage(), $e->getCode());
		}


	}
	
}

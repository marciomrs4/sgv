<?php

namespace system\model;

use system\core\DataBase;
class TbRelatorio extends DataBase
{
	
	public function qtdepedidospordatavenda($dados)
	{
		$query = ("Select count(tb_pedido.ped_codigo), 
					tb_pedido.ped_data_venda 
					from tb_pedido 
					order by tb_pedido.ped_data_venda");
		
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
	
	public function qtdpedidoportipoproduto()
	{
		$query = ("Select count(tb_pedido.ped_codigo), tb_pedido.ped_data_venda, tb_vendas_produtos.vpr_titulo_produto 
					from tb_pedido, tb_vendas_produtos 
					where tb_pedido.ped_codigo=tb_vendas_produtos.ped_codigo 
					order by tb_pedido.ped_data_venda, tb_vendas_produtos.vpr_titulo_produto");
	
		try {
	
			$stmt = $this->conexao->prepare($query);
	
			$stmt->execute();
	
			return $stmt->fetchAll(\PDO::FETCH_NUM);
	
		} catch (Exception $e) {
			throw new \Exception();
		}
	
	
	}
	
	
	public function valordepedidosportipoproduto()
	{
		$query = ("Select sum(tb_pedido.ped_valor_total), tb_pedido.ped_data_venda, tb_vendas_produtos.vpr_titulo_produto 
					from tb_pedido, tb_vendas_produtos 
					where tb_pedido.ped_codigo=tb_vendas_produtos.ped_codigo 
					order by tb_pedido.ped_data_venda, tb_vendas_produtos.vpr_titulo_produto");
	
		try {
	
			$stmt = $this->conexao->prepare($query);
	
			$stmt->execute();
	
			return $stmt->fetchAll(\PDO::FETCH_NUM);
	
		} catch (Exception $e) {
			throw new \Exception();
		}
	
	
	}
		
	
	
}
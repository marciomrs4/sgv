<!-- Inicio do Menu do Modulo -->		

	<div class="panel panel-primary">
			<div class="panel-heading">
				<h3 class="panel-title"><?php echo $config['moduloName']; ?></h3>
			</div>
			<div class="panel-body">

				<!-- Painel de a��es -->

				<ul class="nav nav-pills">
									
					<li class="dropdown">
						<div class="btn-group">
							<button type="button" class="btn btn-primary">
								<span class="glyphicon glyphicon-list-alt"></span> Relatorio
							</button>
							<button type="button" class="btn btn-primary dropdown-toggle"
								data-toggle="dropdown">
								<span class="caret"></span> <span class="sr-only">Toggle
									Dropdown</span>
							</button>
							<ul class="dropdown-menu" role="menu">

								<li><a href="QuantidadePedidoTotalDia.php"><span class="glyphicon glyphicon-list-alt"></span>
										Quantidade de Pedido e Valor Total do dia
									</a>
								</li>

								<li><a href="TotalPorProduto.php"><span class="glyphicon glyphicon-list-alt"></span>
										Total Por Produto
									</a>
								</li>

								<li><a href="TotaisPorTipoPagamento.php"><span class="glyphicon glyphicon-list-alt"></span>
										Totais por Tipo de Pagamento
									</a>
								</li>

								<li><a href="ListaDePedido.php"><span class="glyphicon glyphicon-list-alt"></span>
										Lista de Pedidos
									</a>
								</li>

<!--								<li><a href="PainelBusca.php"><span class="glyphicon glyphicon-list-alt"></span>
										Buscar Pedido
									</a>
								</li>
								<li><a href="listarValorVendaPorProduto.php"><span class="glyphicon glyphicon-list-alt"></span>
										Pesquisa de valor de venda por produto</a></li>
								<li><a href="valordevendapordatavenda.php"><span class="glyphicon glyphicon-list-alt"></span>
										Valor. de venda por Data de venda</a></li>
								<li><a href="listarPedidoPorUnidadeVenda.php"><span class="glyphicon glyphicon-list-alt"></span>
										Pequisa de pedidos por unidade de venda</a></li>
								<li><a href="listarValorVendaByUnidadeVendaData.php"><span class="glyphicon glyphicon-list-alt"></span>
										Pesquisa de valor de venda por unidade de venda e data de venda</a></li>-->


							</ul>
						</div>
					</li>
				</ul>
			</div>
		</div>
				
		<!-- Fim Painel de a��es / Painel do Modulo-->
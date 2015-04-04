<!-- Inicio do Menu do Modulo -->		

	<div class="panel panel-primary">
			<div class="panel-heading">
				<h3 class="panel-title"><?php echo $config['moduloName']; ?></h3>
			</div>
			<div class="panel-body">

				<!-- Painel de a��es -->

				<ul class="nav nav-pills">

<!--					Primeiro botao -->
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
							</ul>
						</div>
					</li>
<!--Fim Primeiro botao-->

					<li class="dropdown">
						<div class="btn-group">
							<button type="button" class="btn btn-primary">
								<span class="glyphicon glyphicon-list-alt"></span> Graficos
							</button>
							<button type="button" class="btn btn-primary dropdown-toggle"
									data-toggle="dropdown">
								<span class="caret"></span> <span class="sr-only">Toggle
									Dropdown</span>
							</button>
							<ul class="dropdown-menu" role="menu">
								<li><a href="GraficoTopProdutoVendido.php"><span class="glyphicon glyphicon-list-alt"></span>
										Produtos Mais Vendidos
									</a>
								</li>
								<li><a href="#"><span class="glyphicon glyphicon-list-alt"></span>
										Unidade de venda: Top Vendas
									</a>
								</li>
							</ul>
						</div>
					</li>


				</ul>
			</div>
		</div>
				
		<!-- Fim Painel de a��es / Painel do Modulo-->
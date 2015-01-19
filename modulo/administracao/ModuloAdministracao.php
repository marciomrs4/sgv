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
								<span class="glyphicon glyphicon-plus"></span> Novo
							</button>
							<button type="button" class="btn btn-primary dropdown-toggle"
								data-toggle="dropdown">
								<span class="caret"></span> <span class="sr-only">Toggle
									Dropdown</span>
							</button>
							<ul class="dropdown-menu" role="menu">
								<li><a href="<?php 
								use system\core\ActionController as A;
								A::actionUrl()->setProjecName($configGlobal['projectName'])->setUrlModulo('administracao')->setUrlAction('alterar/docaalterar')->setValue(rand(1,100))->getUrl();
								?>"><span class="glyphicon glyphicon-list-alt"></span>
										Novo
									</a>
								<li><a href="<?php 
								A::actionUrl()->setProjecName($configGlobal['projectName'])->setUrlModulo('administracao')->setUrlAction('Cadastrar/doca2')->getUrl();
								?>"><span class="glyphicon glyphicon-list-alt"></span>
										Novo 2
									</a>									
								</li>
								<li><a href="<?php 
								A::actionUrl()->setProjecName($configGlobal['projectName'])->setUrlModulo('administracao')->setUrlAction('Cadastrar/doca3')->getUrl();
								?>"><span class="glyphicon glyphicon-list-alt"></span>
										Novo 3
									</a>								
							</ul>
						</div>
					</li>
				
					<li class="dropdown">
						<div class="btn-group">
							<button type="button" class="btn btn-primary">
								<span class="glyphicon glyphicon-search"></span> Pesquisar
							</button>
							<button type="button" class="btn btn-primary dropdown-toggle"
								data-toggle="dropdown">
								<span class="caret"></span> <span class="sr-only">Toggle
									Dropdown</span>
							</button>
							<ul class="dropdown-menu" role="menu">
								<li>
									<a href="<?php 
									A::actionUrl()->setProjecName($configGlobal['projectName'])->setUrlModulo('administracao')->setUrlAction('/formdefault')->getUrl();
									?>"><span class="glyphicon glyphicon-list-alt">
										</span>
										listar Usu�rios
									</a>
										</li>
							</ul>
						</div>
					</li>
									
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
								<li>
									<a href="PainelBusca.php"><span class="glyphicon glyphicon-list-alt">
										</span>
										Buscar Pedido
										</a>
										</li>
								<li><a href="qtdepedidospordatavenda.php"><span class="glyphicon glyphicon-list-alt"></span>
										Qtde. de pedidos por Data de venda</a></li>
								<li><a href="valordevendapordatavenda.php"><span class="glyphicon glyphicon-list-alt"></span>
										Valor. de venda por Data de venda</a></li>
								<li><a href="qtdpedidoportipoproduto.php"><span class="glyphicon glyphicon-list-alt"></span>
										Qtde. de pedidos por tipo de produto</a></li>										
								<li><a href="valordepedidosportipoproduto.php"><span class="glyphicon glyphicon-list-alt"></span>
										Valor. de pedidos por tipo de produto</a></li>																				
							</ul>
						</div>
					</li>
				</ul>
			</div>
		</div>
				
		<!-- Fim Painel de a��es / Painel do Modulo-->
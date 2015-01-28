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
								use system\core\ActionController as L;
							
							echo L::actionUrl()->setProjecName($configGlobal['projectName'])
												->setUrlModulo($config['moduloName'])
												->setUrlAction('Cadastrar/NovoPedido')
												->getUrl();
								?>"><span class="glyphicon glyphicon-list-alt"></span>
										Novo Pedido
									</a>
								<li><a href="<?php 
							echo L::actionUrl()->setProjecName($configGlobal['projectName'])
												->setUrlModulo($config['moduloName'])
												->setUrlAction('Cadastrar/NovoPedidoToque')
												->getUrl();
								?>"><span class="glyphicon glyphicon-list-alt"></span>
										Novo Pedido (toque)
									</a>									
								</li>
								<li><a href="PedidoToqueNovaAba.php" target="_blank"><span class="glyphicon glyphicon-list-alt"></span>
										Novo Pedido (toque) Nova Aba
									</a>
								</li>
							</ul>
						</div>
					</li>
					
										
					<li class="dropdown">
						<div class="btn-group">
						<a href="PainelBusca.php" class="btn btn-primary pull-right">
							<span class="glyphicon glyphicon-search"></span> Pesquisar
						</a>
						</div>
					</li>
					
				</ul>
			</div>
		</div>
				
		<!-- Fim Painel de a��es / Painel do Modulo-->
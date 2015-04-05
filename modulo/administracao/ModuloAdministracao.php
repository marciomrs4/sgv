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

									echo A::actionUrl()->setProjecName($configGlobal['projectName'])->setUrlModulo('administracao')->setUrlAction('cadastrar/unidadevenda')->getUrl();
									?>"><span class="glyphicon glyphicon-list-alt"></span>
										Unidade Venda
									</a>
								</li>


								<li>
									<a href="<?php

									echo A::actionUrl()->setProjecName($configGlobal['projectName'])->setUrlModulo('administracao')->setUrlAction('cadastrar/tipoproduto')->getUrl();
									?>"><span class="glyphicon glyphicon-list-alt"></span>
										Tipo Produto
									</a>
								</li>
								<li>
									<a href="<?php
								echo A::actionUrl()->setProjecName($configGlobal['projectName'])->setUrlModulo('administracao')->setUrlAction('cadastrar/produto')->getUrl();
								?>"><span class="glyphicon glyphicon-list-alt"></span>
										Produto
									</a>
								</li>
								<li><a href="<?php
								echo A::actionUrl()->setProjecName($configGlobal['projectName'])->setUrlModulo('administracao')->setUrlAction('cadastrar/statuspedido')->getUrl();
								?>"><span class="glyphicon glyphicon-list-alt"></span>
										Status Pedido
									</a>
								</li>

								<li><a href="<?php
									echo A::actionUrl()->setProjecName($configGlobal['projectName'])->setUrlModulo('administracao')->setUrlAction('cadastrar/usuario')->getUrl();
									?>"><span class="glyphicon glyphicon-list-alt"></span>
										Usuario
									</a>
								</li>

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
									<a href="listarUnidadeVenda.php"><span class="glyphicon glyphicon-list-alt">
										</span>
										Listar Unidade de Venda
									</a>
								</li>
								<li>
									<a href="listarTipoProduto.php"><span class="glyphicon glyphicon-list-alt">
										</span>
										Listar Tipo Produto
									</a>
								</li>
								<li>
									<a href="listarProduto.php"><span class="glyphicon glyphicon-list-alt">
										</span>
										Listar Produto
									</a>
								</li>
								<li>
									<a href="listarStatusPedido.php"><span class="glyphicon glyphicon-list-alt">
										</span>
										Listar Status Pedido
									</a>
								</li>
								<li>
									<a href="listarUsuario.php"><span class="glyphicon glyphicon-list-alt">
										</span>
										Listar Usuario
									</a>
								</li>
							</ul>
						</div>
					</li>
				</ul>
			</div>
		</div>
				
		<!-- Fim Painel de a��es / Painel do Modulo-->
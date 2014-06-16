<!-- Inicio do Menu do Modulo -->		

	<div class="panel panel-primary">
			<div class="panel-heading">
				<h3 class="panel-title"><?php echo $config['moduloName']; ?></h3>
			</div>
			<div class="panel-body">

				<!-- Painel de ações -->

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
										listar Usuários
									</a>
										</li>
							</ul>
						</div>
					</li>
									
					<li class="dropdown">
						<div class="btn-group">
							<button type="button" class="btn btn-primary">
								<span class="glyphicon glyphicon-list-alt"></span> Relatório
							</button>
							<button type="button" class="btn btn-primary dropdown-toggle"
								data-toggle="dropdown">
								<span class="caret"></span> <span class="sr-only">Toggle
									Dropdown</span>
							</button>
							<ul class="dropdown-menu" role="menu">
								<li>
									<a href="RelatorioAdm.php"><span class="glyphicon glyphicon-list-alt">
										</span>
										Relatorio Um
										</a>
										</li>
								<li><a href="#"><span class="glyphicon glyphicon-list-alt"></span>
										Another action</a></li>
								<li><a href="#"><span class="glyphicon glyphicon-list-alt"></span>
										Something else here</a></li>
							</ul>
						</div>
					</li>
				</ul>
			</div>
		</div>
				
		<!-- Fim Painel de ações / Painel do Modulo-->
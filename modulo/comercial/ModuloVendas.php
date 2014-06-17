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
							<a href="<?php 
							use system\core\ActionController as L;
							L::actionUrl()->setProjecName($configGlobal['projectName'])
							->setUrlModulo($config['moduloName'])
							->setUrlAction('Cadastrar/NovoPedido')
							->getUrl();

							?>" type="button" class="btn btn-primary">
								<span class="glyphicon glyphicon-plus"></span> Novo
							</a>
						</div>
					</li>
					
					<li class="dropdown">
						<div class="btn-group">
						<a href="Pesquisar.php" class="btn btn-primary pull-right">
							<span class="glyphicon glyphicon-search"></span> Pesquisar
						</a>
						</div>
					</li>

				</ul>
			</div>
		</div>
				
		<!-- Fim Painel de ações / Painel do Modulo-->
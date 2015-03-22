<!-- Inicio da Barra de Tarefa Princiopal -->	
		<nav class="navbar navbar-inverse  navbar-fixed-top" role="navigation">

			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse"
					data-target="#navbar-collapse-1">
					<span class="sr-only">Toggle navigation</span> <span
						class="icon-bar"></span> <span class="icon-bar"></span> <span
						class="icon-bar"></span>
				</button>

				<div class="btn-group">
					<button class="btn btn-default btn-lg">
						<span class="glyphicon glyphicon-th-large"></span> <?php echo($configGlobal['projectName']);?>
					</button>
					<button data-toggle="dropdown"
						class="btn btn-default btn-lg dropdown-toggle">
						<span class="glyphicon glyphicon-arrow-down"></span>
					</button>
					<ul class="dropdown-menu">
						<li><a href="../comercial/"><span class="glyphicon glyphicon-sort"></span> <?php echo $configGlobal['comercial']?></a></li>
						<li><a href="../administracao/"><span class="glyphicon glyphicon-flash"></span> <?php echo $configGlobal['administracao']?></a></li>
						<li><a href="../relatorio/"><span class="glyphicon glyphicon-th-list"></span> Relatorio</a></li>
						<li class="divider"></li>
						<li><a href="../index/unidadevenda.php"><span class="glyphicon glyphicon-home"></span> Alterar Unidade Venda</a></li>
						<li class="divider"></li>
						<li><a href="#"><span class="glyphicon glyphicon-user"></span> Alterar Senha</a></li>
					</ul>
				</div>

			</div>



			<div class="nav navbar-left collapse navbar-collapse">
				<p class="navbar-text"><?php echo($configGlobal['systemName']);?></p>
				<p class="navbar-text"><?php
				
				if(!empty($_SESSION['uve_codigo'])){
 					
					$tbUnidadeVenda = new \system\model\TbUnidadeVenda();
 					$Unidade = $tbUnidadeVenda->getUnidadeVendaForm($_SESSION['uve_codigo']);
 					
						echo('Unidade Venda: '.$Unidade['uve_nome']);
					}	
			?>
					</p>
			</div>
			<div class="nav navbar-right collapse navbar-collapse"
				id="navbar-collapse-1">
				<button class="btn btn-default btn-lg ">
					<a href="/sgv/modulo/index/logout.php">
						<span class="glyphicon glyphicon-off"></span> Sair
					</a>
				</button>
			</div>
		</nav>

		<nav class="navbar navbar-default" role="navigation"></nav>
<!-- Fim do Menu Principal -->
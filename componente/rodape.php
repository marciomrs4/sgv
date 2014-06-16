<!-- Inicio Rodapé -->
		<footer>
			<nav class="navbar navbar-default navbar-fixed-bottom"
				role="navigation">
					
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse"
						data-target="#este">
						<span class="sr-only">Toggle navigation</span> <span
							class="icon-bar"></span> <span class="icon-bar"></span> <span
							class="icon-bar"></span>
					</button>


					<p class="navbar-text"><?php echo $configGlobal['tituloRodape']; ?></p>

				</div>
				<div class="nav navbar-right collapse navbar-collapse" id="este">
					<button class="btn btn-default btn-lg">
						<span class="glyphicon glyphicon-user"></span> Usuário
					</button>
				</div>


			</nav>
			<nav class="navbar navbar-default" role="navigation">
			<?php 
					use system\core\FormController as M;
					$Message = new M();
					$Message->showMessages();
					?>
			</nav>

		</footer>

	</div>




	<script src="../../js/jquery.js"></script>
	<script src="../../js/bootstrap.js"></script>
	<script src="../../js/jquery.dataTables.js"></script>	
	<script src="../../js/my-data-table.js"></script>
	<script src="../../js/my-alert.js"></script>	
			
		
</body>
</html>
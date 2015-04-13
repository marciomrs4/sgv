<!-- Inicio Rodap� -->
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
						<span class="glyphicon glyphicon-user"></span>
							<?php
							$tbUsuario = new \system\model\TbUsuario();
							$Usuario = $tbUsuario->getFormUser($_SESSION['usu_codigo']);
							echo $Usuario['usu_nome'];
							?>
					</button>
				</div>


			</nav>
			<nav class="navbar navbar-default" role="navigation">
			</nav>

		</footer>

	</div>

	<script src="../../js/jquery.js"></script>
	<script src="../../js/bootstrap.js"></script>
	<script src="../../js/jquery.dataTables.js"></script>
	<script src="../../js/maskMoney.min.js"></script>
	<script src="../../js/my-maskMoney.js"></script>
	<script src="../../js/my-data-table.js"></script>
	<script src="../../js/my-alert.js"></script>
	<script src="../../js/my-createitempedido.js"></script>
	<script src="../../js/jquery.validate.js"></script>
	<script src="../../js/my-printer.js"></script>
	<script src="../../js/my-addvalorpedido.js"></script>


</body>
</html>
<?php
/**
 *
Criacao do form de para Usuario

usu_codigo
usu_nome
usu_senha
usu_login
per_codigo


*/
?>

<div class="panel panel-default">
	<div class="panel-heading">
		<h3 class="panel-title">Novo: Usuario</h3>
	</div>
	<div class="panel-body">
		<form class="form-horizontal" method="post" action="action/usuario.php" role="form">
			
			<div class="form-group">
				<label for="usu_nome" class="col-sm-1 control-label">Nome:</label>
				<div class="col-sm-4">
					<input type="text" name="usu_nome" value="" class="form-control" id="usu_nome"
						placeholder="Nome" required>
				</div>
			</div>

			<div class="form-group">
				<label for="usu_senha" class="col-sm-1 control-label">Senha:</label>
				<div class="col-sm-4">
					<input type="password" name="usu_senha" value="" class="form-control" id="usu_senha"
						   placeholder="Senha" required>
				</div>
			</div>

			<div class="form-group">
				<label for="usu_senha2" class="col-sm-1 control-label">Senha 2:</label>
				<div class="col-sm-4">
					<input type="password" name="usu_senha2" value="" class="form-control" id="usu_senha2"
						   placeholder="Repetir Senha" required>
				</div>
			</div>


			<div class="form-group">
				<label for="usu_login" class="col-sm-1 control-label">Login:</label>
				<div class="col-sm-4">
					<input type="text" name="usu_login" value="" class="form-control" id="usu_login"
						   placeholder="Login" required>
				</div>
			</div>



			<div class="form-group">
				<div class="col-sm-offset-1 col-sm-1">
					<button type="submit" class="btn btn-primary">
						<span class="glyphicon glyphicon-floppy-saved"></span> Salvar
					</button>
				</div>
			</div>
			
		</form>
	</div>
</div>
<!doctype html>
<html>
<head>
<meta charset="ISO-8859-1">
<title>Login</title>
<link rel="stylesheet" href="../../css/bootstrap.css">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
	<div class="col-sm-6 col-sm-offset-3 container-fluid">
		
		<nav class="navbar navbar-default navbar-static-top" role="navigation"></nav>

	<div class="panel panel-primary">
		<div class="panel-heading panel-title">
		SGV - Login
		</div>
			<div class="panel-body well">
				<div class="row">
					<div class="col-sm-4 col-sm-offset-1">
						<form class="form-horizontal" id="formlogin" method="post" role="form">
							<div class="form-group">
					<label for="inputUsuario">Login</label>
	<input type="text" name="usu_login" class="form-control" id="inputUsuario" placeholder="Login" required>
								</div>
							<div class="form-group">
	<label for="inputSenha">Senha</label>
	<input type="password" name="usu_senha" class="form-control" id="inputSenha" placeholder="Senha" required>
						</div>
							<div class="form-group">
								<button type="submit" class="btn btn-primary">
									<span class="glyphicon glyphicon-log-in"></span> Acessar
								</button>
								<span id="carregando"></span>
							</div>
						</form>
					</div>
					<div class="col-sm-6 col-sm-offset-1">
						<div class="panel-body">
							<img src="../../img/logo-restaurante.png" class="img-responsive img-rounded" alt="Logotipo">
						</div>
					</div>
				</div>
				<div>
					<span id="dadosform"></span>
				</div>
			</div>
			<div class="panel-heading panel-title">
				 ..:: Tecnologia ao seu favor ::..
			</div>
		</div>
		
	</div>
	
	<script src="../../js/jquery.js"></script>
	<script src="../../js/jquery-form.js"></script>		
	<script src="../../js/my-jquery-form.js"></script>			
	
</body>
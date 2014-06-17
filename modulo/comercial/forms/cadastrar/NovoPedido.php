<div class="panel panel-default">
	<div class="panel-heading">
		<h3 class="panel-title">Novo</h3>
	</div>
	<div class="panel-body">
	<?php 
		use system\core\FormController;
		$form = new FormController();
		$form->validadeForm('cadastrar/doca')
			 ->showErros();
		?>
		<form class="form-horizontal" method="post" action="action/action.php">

			<div class="form-group">
				<label for="inputEmail3" class="col-sm-1 control-label">Pedido:</label>
				<div class="col-sm-1">
					<input type="text" class="form-control" id="inputEmail3"
						placeholder="Pedido">
				</div>
			
				<label for="inputEmail3" class="col-sm-1 control-label">Cliente:</label>
				<div class="col-sm-2">
					<input type="text" class="form-control" id="inputEmail3"
						placeholder="Cliente">
				</div>
			</div>

			<div class="form-group">

				<label for="" class="col-sm-1 control-label">Produto:</label>
				<div class="col-sm-2">
					<select class="form-control">
						<option>Escondidinho de Carne Seca</option>
						<option>Escondidinho de Frango</option>			
						<option>Escondidinho de Carne</option>
						<option>Escondidinho de Carne Moída</option>
						<option>Escondidinho de Camarão</option>
					</select>
				</div>
			
				<label for="inputEmail3" class="col-sm-1 control-label">Valor:</label>
				<div class="col-sm-1">
					<input type="text" class="form-control" id="inputEmail3"
						placeholder="Valor">
				</div>
				
				<label for="inputEmail3" class="col-sm-1 control-label">Quantidade:</label>
				<div class="col-sm-1">
					<input type="text" class="form-control" id="inputEmail3"
						placeholder="Quantidade">
				</div>

			</div>


			<div class="form-group">
				<div class="col-sm-offset-1 col-sm-1">
					<button type="submit" class="btn btn-primary">
						<span class="glyphicon glyphicon-ok"></span> Adicionar
					</button>
				</div>
			</div>

		</form>

	</div>
</div>

<div class="panel panel-info">
	<div class="panel-heading">
		<h3 class="panel-title">Lista de Produtos</h3>
	</div>
	<div class="panel-body">
		<form class="form-horizontal" action="action/action.php" method="post" role="form">
			
				<table class="table table-striped table-bordered table-condensed table-hover">
					<thead>
						<tr class="info">
							<th>#</th>
							<th>Produto</th>
							<th>Valor Unitário</th>
							<th>Quantidade</th>
							<th>Total</th>							
						</tr>
					</thead>
					<tbody>
					
						<tr>
							<td class="col-md-1">
							
								<div class="btn-group">
									<button type="button" class="btn btn-default btn-xs dropdown-toggle"
										data-toggle="dropdown">
										Opções <span class="caret"></span>
									</button>
									<ul class="dropdown-menu" role="menu">
										<li><a href="#"><span class="glyphicon glyphicon-remove"></span>
												Remover</a>
										</li>
									</ul>
								</div>
								
							</td>
							
							<td>Escondidinho de Carne Seca</td>
							<td>R$ 15,00</td>
							<td>1</td>
							<td>R$ 15,00</td>							
						</tr>
						

												<tr>
							<td class="col-md-1">
							
								<div class="btn-group">
									<button type="button" class="btn btn-default btn-xs dropdown-toggle"
										data-toggle="dropdown">
										Opções <span class="caret"></span>
									</button>
									<ul class="dropdown-menu" role="menu">
										<li><a href="#"><span class="glyphicon glyphicon-remove"></span>
												Remover</a>
										</li>
									</ul>
								</div>
								
							</td>
							
							<td>Escondidinho de Carne Seca</td>
							<td>R$ 15,00</td>
							<td>2</td>
							<td>R$ 30,00</td>							
						</tr>
						
												<tr>
							<td class="col-md-1">
							
								<div class="btn-group">
									<button type="button" class="btn btn-default btn-xs dropdown-toggle"
										data-toggle="dropdown">
										Opções <span class="caret"></span>
									</button>
									<ul class="dropdown-menu" role="menu">
										<li><a href="#"><span class="glyphicon glyphicon-remove"></span>
												Remover</a>
										</li>
									</ul>
								</div>
								
							</td>
							
							<td>Escondidinho de Carne Moída</td>
							<td>R$ 15,00</td>
							<td>1</td>
							<td>R$ 15,00</td>							
						</tr>
						
												<tr>
							<td class="col-md-1">
							
								<div class="btn-group">
									<button type="button" class="btn btn-default btn-xs dropdown-toggle"
										data-toggle="dropdown">
										Opções <span class="caret"></span>
									</button>
									<ul class="dropdown-menu" role="menu">
										<li><a href="#"><span class="glyphicon glyphicon-remove"></span>
												Remover</a>
										</li>
									</ul>
								</div>
								
							</td>
							
							<td>Escondidinho de Carne Moída</td>
							<td>R$ 15,00</td>
							<td>2</td>
							<td>R$ 30,00</td>							
						</tr>

					</tbody>
				</table>
			
			<div class="form-group">
				<div class="col-sm-offset-0 col-sm-1">
					<button type="submit" class="btn btn-primary">
						<span class="glyphicon glyphicon-floppy-saved"></span> Salvar
					</button>
				</div>
			</div>
			
		</form>
	</div>
</div>
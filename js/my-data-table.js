var $table = jQuery.noConflict();

$table(document).ready(function(){
	$table('#table-bootstrap').dataTable({
		"oLanguage": {
			"oPaginate":{
				"sPrevious": "Anterior ",
				"sNext": "Proximo"
			},
			"sLengthMenu": "Mostrar _MENU_ resultado(s)",
			"sSearch": "Pesquisar: ",
			"sInfo": "Mostrando _START_ a _END_ de _TOTAL_ resultado(s)",
			"sInfoFiltered": "(Total: _MAX_ )",
			"sZeroRecords": "Resultado nao encontrado",
			"sInfoEmpty": "Sem resultados"
		}
	});
});
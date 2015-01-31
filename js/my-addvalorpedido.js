var $valor = jQuery.noConflict();

$valor(document).ready(function(){

	$valor("select[name='pro_codigo']").change(function(){

		var codigo = $valor(this).val();

		$valor.post('action/addValorPedido.php',
			{pro_codigo: codigo},
		function(data){
				$valor("#valor").val(data);
			},'html');
		return false;

	});

});
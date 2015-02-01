var $click = jQuery.noConflict();

$click(document).ready(function(){

	$click('div.btn-info').click(function(){
		
	var	valor = $click(this).next().val();
	
	if(valor == ''){
		valor = 0;
	}
	
	valor = parseInt(valor) + parseInt(1);
	
		$click(this).next().val(valor);
	
	});

	
	function submitForm(form){			
		
		$click("#botaoSave").hide();
		$click(".botaoSave").css("visibility","visible");

		form.submit();
		
		}
		
		$click("#pedidotoque").validate({
			/* REGRAS DE VALIDA��O DO FORMUL�RIO */
			
			rules:{
				asd:{
					required: true, /* Campo obrigat�rio */
					minlength: 1    /* No m�nimo 5 caracteres */
				},
				asdf:{
					required: true
				}
			},
			/* DEFINI��O DAS MENSAGENS DE ERRO */
			messages:{
				asd:{
					required: "Preencha o campo ",
					minlength: "O campo deve conter no m�nimo 5 caracteres"
				},
				asdf:{
					required: "Campo Departamento � Obrigadorio"
				}
			},
			
			submitHandler: function(form){
				submitForm(form);
			}
		});

	
});
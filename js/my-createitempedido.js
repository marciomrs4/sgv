
$(document).ready(function(){

	$('div.btn-info').click(function(){
		
	var	valor = $(this).next().val();
	
	if(valor == ''){
		valor = 0;
	}
	
	valor = parseInt(valor) + parseInt(1);
	
		$(this).next().val(valor);
	
	});

	
	function submitForm(form){			
		
		$("#botaoSave").hide();
		$(".botaoSave").css("visibility","visible");

		form.submit();
		
		}
		
		$("#pedidotoque").validate({
			/* REGRAS DE VALIDA��O DO FORMUL�RIO */
			
			rules:{
				16:{
					required: true, /* Campo obrigat�rio */
					minlength: 1    /* No m�nimo 5 caracteres */
				},
				17:{
					required: true
				}
			},
			/* DEFINI��O DAS MENSAGENS DE ERRO */
			messages:{
				16:{
					required: "Preencha o campo <u>" +problema+ "</u>",
					minlength: "O campo <u>" +problema+ "</u> deve conter no m�nimo 5 caracteres"
				},
				17:{
					required: "Campo Departamento � Obrigadorio"
				}
			},
			
			submitHandler: function(form){
				submitForm(form);
			}
		});

	
});

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
			/* REGRAS DE VALIDAÇÃO DO FORMULÁRIO */
			
			rules:{
				16:{
					required: true, /* Campo obrigatório */
					minlength: 1    /* No mínimo 5 caracteres */
				},
				17:{
					required: true
				}
			},
			/* DEFINIÇÃO DAS MENSAGENS DE ERRO */
			messages:{
				16:{
					required: "Preencha o campo <u>" +problema+ "</u>",
					minlength: "O campo <u>" +problema+ "</u> deve conter no mínimo 5 caracteres"
				},
				17:{
					required: "Campo Departamento é Obrigadorio"
				}
			},
			
			submitHandler: function(form){
				submitForm(form);
			}
		});

	
});
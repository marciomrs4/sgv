var $click = jQuery.noConflict();


$click(document).ready(function(){



	$click('div.btn-primary').click(function(){

		var novototal = 0;

		var	valor = $click(this).next().val();

		if(valor == ''){
			valor = 0;
		}

		valor = parseInt(valor) + parseInt(1);

		$click(this).next().val(valor);



		$click('div.btn-primary').next().each(function(){

			var quantidade = $click(this).val();
			console.log('Quantidade: '+quantidade);

			var valorUnitario = $click(this).next().text();
			console.log('Valor Unitario: '+valorUnitario);

			var totalDeCadaCampo = quantidade * valorUnitario;
			console.log('Total do campo: '+totalDeCadaCampo);

			totalDeCadaCampo = Number(totalDeCadaCampo);

			novototal += totalDeCadaCampo;

			//console.log('Total de tudo: '+novototal.toFixed(2));


			});

		$click('#valor').html(novototal.toFixed(2));

	});

	$click('div.btn-primary').next().blur(function(){

		var novototal = 0;

		$click('div.btn-primary').next().each(function(){

			var quantidade = $click(this).val();
			//console.log('Quantidade: '+quantidade);

			var valorUnitario = $click(this).next().text();
			//console.log('Valor Unitario: '+valorUnitario);

			var totalDeCadaCampo = quantidade * valorUnitario;
			//console.log('Total do campo: '+totalDeCadaCampo);

			totalDeCadaCampo = Number(totalDeCadaCampo);

			novototal += totalDeCadaCampo;

			//console.log('Total de tudo: '+novototal.toFixed(2));


			 });

		$click('#valor').html(novototal.toFixed(2));

	});

	
	function submitForm(form){			
		
		$click("#botaoSave").hide();
		$click(".botaoSave").css("visibility","visible");

		form.submit();
		
		}
		
		$click("#pedidotoque").validate({
			/* REGRAS DE VALIDA��O DO FORMUL�RIO */
			
			rules:{
				tpa_codigo:{
					required: true /* Campo obrigat�rio */
				}			},
			/* DEFINI��O DAS MENSAGENS DE ERRO */
			messages:{
				tpa_codigo:{
					required: "Selecione a forma de pagamento",
				}			},
			
			submitHandler: function(form){
				submitForm(form);
			}
		});

	
});
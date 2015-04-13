/*
Função para fazer impressao de uma determinada regiao dentro da classe

 </script>
 function cont(){
 var conteudo = document.getElementById('print').innerHTML;
 tela_impressao = window.open('about:blank');
 tela_impressao.document.write(conteudo);
 tela_impressao.window.print();
 tela_impressao.window.close();
 }
 </script>

 <div id="print" class="conteudo">
 // conteúdo a ser impresso pode ser um form ou um table.
 </div>

 <input type="button" onclick="cont();" value="Imprimir Div separadamente">

 */



function doPrinter(){
	var conteudo = document.getElementById('print').innerHTML;
	tela_impressao = window.open('about:blank');
	tela_impressao.document.write(conteudo);
	tela_impressao.window.print();
	tela_impressao.window.close();
}
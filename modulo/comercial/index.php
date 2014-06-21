<?php
include_once '../../bootstrap.php';
include_once 'config.php';

include '../../componente/topo.php';
include '../../componente/menuprincipal.php';


include '../../modulo/comercial/ModuloVendas.php';

use system\core\FormController;


$controler = new FormController();

$controler->setForm()
          ->getForm();

echo '<pre>';
print_r($_SESSION);
echo '</pre>';

/* foreach ($_SESSION['itens_pedido'] as $key => $array){
	
	echo 'Chave: ',$key,
		 ' Pro_codigo: ', $array['pro_codigo'],
		 ' Valor Unit: ', $array['valor'],
		 ' Quantidade: ', $array['quantidade'],
		' Total: ',$array['total'] ,'<br />';
	
}
 */
include '../../componente/rodape.php';
?>
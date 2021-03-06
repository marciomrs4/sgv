<?php
require_once '../../bootstrap.php';

include_once 'config.php';
include '../../componente/topo.php';
include '../../componente/menuprincipal.php';

include '../../modulo/relatorio/ModuloRelatorio.php';


#Instancia da Class AcceptRelatorio
$acceptForm = new \system\app\AcceptRelatorio();
$acceptForm->setpost($_POST);

$RelatorioName = 'Lista de Pedido';

#Form usado para Filtro de Busca
include 'forms/BuscarPainelBusca.php';


$Grid = new \system\core\Grid();
$Grid->setDados($acceptForm->getListaDePedido());

/**
 * a.ped_numero,
a.ped_cliente,
a.ped_valor_total,
c.tpa_descricao
 */
$Grid->setCabecalho(array('Numero de Pedido','Cliente','Valor Total','Tipo De Pagamento'));

$Number = new \system\core\NumberFormat();
$Grid->addFunctionColumn(function($var) use ($Number){
    return $Number->numberClient($var);
},2);


$Painel = new \system\core\Painel();
$Painel->setPainelColor('primary');
$Painel->setPainelTitle('Resultado')->addGrid($Grid)->show();

include '../../componente/rodape.php';

?>
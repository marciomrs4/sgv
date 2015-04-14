<?php

require_once '../../bootstrap.php';

include_once 'config.php';
include '../../componente/topo.php';
include '../../componente/menuprincipal.php';


include '../../modulo/relatorio/ModuloRelatorio.php';


#Instancia da Class AcceptRelatorio
$acceptForm = new \system\app\AcceptRelatorio();
$acceptForm->setpost($_POST);

$RelatorioName = 'Quantidade e Total de Pedidos do Dia';
#Form usado para Filtro de Busca
include 'forms/BuscarPainelBusca.php';


$Grid = new \system\core\Grid();

$Grid->setDados($acceptForm->getQuantidadePedidoTotalDia());
//$Grid->setCabecalho(array('Numero de Pedido'));

$Number = new \system\core\NumberFormat();
$Grid->addFunctionColumn(function($var) use ($Number){
    return $Number->numberClient($var);
},3);

$Painel = new \system\core\Painel();
$Painel->setPainelColor('primary');
$Painel->setPainelTitle('Resultado')->addGrid($Grid)->show();

include '../../componente/rodape.php';

?>
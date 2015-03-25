<?php

require_once '../../bootstrap.php';

include_once 'config.php';
include '../../componente/topo.php';
include '../../componente/menuprincipal.php';


include '../../modulo/relatorio/ModuloRelatorio.php';

$tbRelatorio = new \system\model\TbRelatorio();

$dados['uve_codigo'] = $_SESSION['uve_codigo'];

$Grid = new \system\core\Grid();

$Grid->setDados($tbRelatorio->quantidadePedidosValorTotaldia($dados));
//$Grid->setCabecalho(array('Numero de Pedido'));

$Number = new \system\core\NumberFormat();
$Grid->addFunctionColumn(function($var) use ($Number){
    return 'R$ ' . $Number->numberClient($var);
},3);

$Painel = new \system\core\Painel();
$Painel->setPainelColor('primary');
$Painel->setPainelTitle('Quantidade e Total de Pedidos do Dia')->addGrid($Grid)->show();

include '../../componente/rodape.php';

?>
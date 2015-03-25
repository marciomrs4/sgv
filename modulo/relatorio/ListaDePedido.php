<?php

require_once '../../bootstrap.php';

include_once 'config.php';
include '../../componente/topo.php';
include '../../componente/menuprincipal.php';


include '../../modulo/relatorio/ModuloRelatorio.php';

$tbRelatorio = new \system\model\TbRelatorio();

$dados['uve_codigo'] = $_SESSION['uve_codigo'];

$Grid = new \system\core\Grid();

$Grid->setDados($tbRelatorio->listaDePedido($dados));

/**
 * a.ped_numero,
a.ped_cliente,
a.ped_valor_total,
c.tpa_descricao
 */
$Grid->setCabecalho(array('Numero de Pedido','Cliente','Valor Total','Tipo De Pagamento'));

$Number = new \system\core\NumberFormat();
$Grid->addFunctionColumn(function($var) use ($Number){
    return 'R$ ' . $Number->numberClient($var);
},2);


$Painel = new \system\core\Painel();
$Painel->setPainelColor('primary');
$Painel->setPainelTitle('Lista de Pedido')->addGrid($Grid)->show();

include '../../componente/rodape.php';

?>
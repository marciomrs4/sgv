<?php

require_once '../../bootstrap.php';

include_once 'config.php';
include '../../componente/topo.php';
include '../../componente/menuprincipal.php';


include '../../modulo/relatorio/ModuloRelatorio.php';

$tbRelatorio = new \system\model\TbRelatorio();

$dados['uve_codigo'] = $_SESSION['uve_codigo'];

$Grid = new \system\core\Grid();

$Grid->setDados($tbRelatorio->totalPorProduto($dados));
$Grid->setCabecalho(array('Produto','Quantidade','Valor'));

$Number = new \system\core\NumberFormat();
$Grid->addFunctionColumn(function($var) use ($Number){
    return 'R$ ' . $Number->numberClient($var);
},2);

$Painel = new \system\core\Painel();
$Painel->setPainelColor('primary');
$Painel->setPainelTitle('Total por Produto')->addGrid($Grid)->show();

include '../../componente/rodape.php';

?>
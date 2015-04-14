<?php

require_once '../../bootstrap.php';

include_once 'config.php';
include '../../componente/topo.php';
include '../../componente/menuprincipal.php';


include '../../modulo/relatorio/ModuloRelatorio.php';

#Instancia da Class AcceptRelatorio
$acceptForm = new \system\app\AcceptRelatorio();
$acceptForm->setpost($_POST);

$RelatorioName = 'Total por Produto';

#Form usado para Filtro de Busca
include 'forms/BuscarPainelBusca.php';



$dados['uve_codigo'] = $_SESSION['uve_codigo'];

$Grid = new \system\core\Grid();

$Grid->setDados($acceptForm->getTotalPorProduto());
$Grid->setCabecalho(array('Produto','Quantidade','Valor'));

$Number = new \system\core\NumberFormat();
$Grid->addFunctionColumn(function($var) use ($Number){
    return $Number->numberClient($var);
},2);

$Painel = new \system\core\Painel();
$Painel->setPainelColor('primary');
$Painel->setPainelTitle('Resultado')->addGrid($Grid)->show();

include '../../componente/rodape.php';

?>
<?php

require_once '../../bootstrap.php';

include_once 'config.php';
include '../../componente/topo.php';
include '../../componente/menuprincipal.php';


include '../../modulo/relatorio/ModuloRelatorio.php';

try {


    #Instancia da Class AcceptRelatorio
    $acceptForm = new \system\app\AcceptRelatorio();
    $acceptForm->setpost($_POST);

    $RelatorioName = 'Totais por Tipo de Pagamento';

    #Form usado para Filtro de Busca
    include 'forms/BuscarPainelBusca.php';


    $Grid = new \system\core\Grid();

    $Grid->setDados($acceptForm->getTotaisPorTipoPagamento());
    $Grid->setCabecalho(array('Forma de Pagamento','Quantidade','Valor'));


    $Number = new \system\core\NumberFormat();
    $Grid->addFunctionColumn(function($var) use ($Number){
        return 'R$ ' . $Number->numberClient($var);
    },2);

    $Painel = new \system\core\Painel();
    $Painel->setPainelColor('primary');
    $Painel->setPainelTitle('Resultado')->addGrid($Grid)->show();

}catch (Exception $e)
{
    echo $e->getMessage();
}

include '../../componente/rodape.php';

?>
<?php

require_once '../../bootstrap.php';

include_once 'config.php';
include '../../componente/topo.php';
include '../../componente/menuprincipal.php';


include '../../modulo/relatorio/ModuloRelatorio.php';

try {

    $tbRelatorio = new \system\model\TbRelatorio();

    $dados['uve_codigo'] = $_SESSION['uve_codigo'];

    $Grid = new \system\core\Grid();

    $Grid->setDados($tbRelatorio->totaisPorTipoPagamento($dados));
    $Grid->setCabecalho(array('Forma de Pagamento','Quantidade','Valor'));


    $Number = new \system\core\NumberFormat();
    $Grid->addFunctionColumn(function($var) use ($Number){
        return 'R$ ' . $Number->numberClient($var);
    },2);

    $Painel = new \system\core\Painel();
    $Painel->setPainelColor('primary');
    $Painel->setPainelTitle('Totais por Tipo de Pagamento')->addGrid($Grid)->show();

}catch (Exception $e)
{
    echo $e->getMessage();
}

include '../../componente/rodape.php';

?>
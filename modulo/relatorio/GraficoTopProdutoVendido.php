<?php

require_once '../../bootstrap.php';

include_once 'config.php';
include '../../componente/topo.php';
include '../../componente/menuprincipal.php';


include '../../modulo/relatorio/ModuloRelatorio.php';

#Instancia da Class AcceptRelatorio
$acceptForm = new \system\app\AcceptRelatorio();
$acceptForm->setpost($_POST);

$RelatorioName = 'Top Produto Vendido';

#Form usado para Filtro de Busca
include 'forms/BuscarPainelBusca.php';


$Grid = new \system\core\Grid();

$Grid->setDados($acceptForm->getGrafic());
$Grid->setCabecalho(array('Quantidade','Produto'));

$Number = new \system\core\NumberFormat();
$Grid->addFunctionColumn(function($var) use ($Number){
    return 'R$ ' . $Number->numberClient($var);
},2);

$Painel = new \system\core\Painel();
$Painel->setPainelColor('primary');
$Painel->setPainelTitle('Resultado')->addGrid($Grid)->show();


?>
<div class="panel panel-primary">
    <div class="panel-heading">
        <h3 class="panel-title">Produtos Mais Vendidos</h3>
    </div>
    <div class="panel-body">

        <!--<img src="teste.php" />-->

    </div>
</div>

<?php

include '../../componente/rodape.php';

?>
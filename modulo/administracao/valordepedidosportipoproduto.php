<?php
use system\model\TbRelatorio;
use system\core\Grid;
use system\core\FormController;
use system\core\NumberFormat;
require_once '../../bootstrap.php';
include '../../componente/topo.php';
include '../../componente/menuprincipal.php';
include_once 'config.php';

include '../../modulo/administracao/ModuloAdministracao.php';

$tbRelatorio = new TbRelatorio();

$dados = '';

$Grid = new Grid();

$Grid->setDados($tbRelatorio->valordepedidosportipoproduto());
$Grid->setCabecalho(array('Valor Total','Data Venda','Descricao do Produto'));


$Grid->addFunctionColumn(function ($var){
			return('R$ '.number_format($var,2,',','.'));
},0);

$Grid->show();

include '../../componente/rodape.php';
?>
<?php
use system\model\TbRelatorio;
use system\core\Grid;
use system\core\FormController;
use system\core\NumberFormat;
require_once '../../bootstrap.php';
include_once 'config.php';
include '../../componente/topo.php';
include '../../componente/menuprincipal.php';


include '../../modulo/administracao/ModuloAdministracao.php';

$tbRelatorio = new TbRelatorio();

$dados = '';

$Grid = new Grid();

$Grid->setDados($tbRelatorio->listarValorVendaByUnidadeVendaData());
$Grid->setCabecalho(array('Unidade de Venda','Data Venda','Valor Total'));

$Grid->addFunctionColumn(function ($var){
	$data = explode('-',$var);
	return $data['2'].'/'.$data['1'].'/'.$data['0'];
},1);

$Grid->addFunctionColumn(function ($var){
			return('R$ '.number_format($var,2,',','.'));
},2);

$Grid->show();

include '../../componente/rodape.php';
?>
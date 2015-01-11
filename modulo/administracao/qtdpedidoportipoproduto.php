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

$Grid->setDados($tbRelatorio->qtdpedidoportipoproduto());
$Grid->setCabecalho(array('QTD Pedido','Data Venda','Produto'));

$Grid->show();

include '../../componente/rodape.php';
?>
<?php
use system\model\TbRelatorio;
use system\core\Grid;
require_once '../../bootstrap.php';
include_once 'config.php';
include '../../componente/topo.php';
include '../../componente/menuprincipal.php';


include '../../modulo/administracao/ModuloAdministracao.php';

$tbRelatorio = new TbRelatorio();

$Grid = new Grid();

$Grid->setDados($tbRelatorio->listarValorVendaPorProduto());
$Grid->setCabecalho(array('Pedido','Descricao Produo','Valor total'));
$Grid->show();

include '../../componente/rodape.php';
?>
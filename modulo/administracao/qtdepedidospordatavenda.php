<?php
use system\model\TbRelatorio;
use system\core\Grid;
require_once '../../bootstrap.php';
include '../../componente/topo.php';
include '../../componente/menuprincipal.php';
include_once 'config.php';

include '../../modulo/administracao/ModuloAdministracao.php';

$tbRelatorio = new TbRelatorio();

$dados = '';

$Grid = new Grid();

$Grid->setDados($tbRelatorio->qtdepedidospordatavenda($dados));
$Grid->setCabecalho(array('Quantidade','Data Venda'));
$Grid->show();

include '../../componente/rodape.php';
?>
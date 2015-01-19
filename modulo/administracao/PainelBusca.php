<?php
include_once '..'.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'/bootstrap.php';
include_once 'config.php';

include '..'.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'componente/topo.php';
include '..'.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'componente/menuprincipal.php';

include '..'.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'modulo/administracao/ModuloAdministracao.php';


include_once "forms/BuscarPainelBusca.php";

$ped_codigo = $_POST['ped_codigo'];

$tbPedido = new \system\model\TbPedido();

$gridPedido = new \system\core\Grid();

$gridPedido->colunaoculta = 1;
$gridPedido->id = null;

$gridPedido->setDados($tbPedido->getListarPedido($ped_codigo))
           ->setCabecalho(array('Numero','Cliente','Usuario','Data','Valor Total','Status','Unidade Venda'))
           ->show();

$gridListaItens = new \system\core\Grid();

$tbListaPedido = new \system\model\TbItemPedido();

$gridListaItens->colunaoculta = 1;

$gridListaItens->setCabecalho(array('Descricao','Valor Uni','Quantidade','Valor Total'))
                ->setDados($tbListaPedido->getListarItensPedido($ped_codigo))
                ->show();


include '../../componente/rodape.php';
?>
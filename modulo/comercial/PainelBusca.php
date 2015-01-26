<?php
include_once '..'.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'/bootstrap.php';
include_once 'config.php';

include '..'.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'componente/topo.php';
include '..'.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'componente/menuprincipal.php';

include '..'.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'modulo/comercial/ModuloVendas.php';


$formController = new \system\core\FormController();
$formController->setForm()->getForm();


if(($_SESSION['ped_codigo']) or ($_POST['ped_codigo']) or ($_GET['start'])){

    $ped_codigo = ($_POST['ped_codigo'] == '') ? $_SESSION['ped_codigo'] : $_POST['ped_codigo'];

include_once "forms/BuscarPainelBusca.php";

    unset($_SESSION['ped_codigo']);

$tbPedido = new \system\model\TbPedido();

$Number = new \system\core\NumberFormat();

$gridPedido = new \system\core\Grid();

$gridPedido->colunaoculta = 1;
$gridPedido->id = null;

$gridPedido->setDados($tbPedido->getListarPedido($ped_codigo))
           ->setCabecalho(array('Numero','Cliente','Usuario','Data','Valor Total','Status','Unidade Venda'))
           ->addFunctionColumn(function ($var) use ($Number){
                return 'R$ '.$Number->numberClient($var);},5)
           ->show();

$gridListaItens = new \system\core\Grid();

$tbListaPedido = new \system\model\TbItemPedido();

$gridListaItens->colunaoculta = 1;

$gridListaItens->setCabecalho(array('Descricao','Valor Uni','Quantidade','Valor Total'))
                ->setDados($tbListaPedido->getListarItensPedido($ped_codigo))
                ->addFunctionColumn(function ($var) use ($Number){
                    return 'R$ '.$Number->numberClient($var);},2)
                ->addFunctionColumn(function($var) use ($Number){
                    return 'R$ '.$Number->numberClient($var);},4)
                ->show();
}


include '../../componente/rodape.php';
?>
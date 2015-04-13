<?php
include_once '..'.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'/bootstrap.php';
include_once 'config.php';

include '..'.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'componente/topo.php';
include '..'.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'componente/menuprincipal.php';

include '..'.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'modulo/comercial/ModuloVendas.php';

/* echo '<pre>';
 print_r($_SESSION);
echo '</pre>'; */

#Classe que fica responsavel por mostrar mensagens de erros
$erros = new \system\core\Error();
$erros->showErrors();
$erros->showMessages();


if((isset($_SESSION['ped_codigo']))  or (!isset($_SESSION['action']))){

    $ped_codigo = ($_POST['ped_codigo'] == '') ? $_SESSION['ped_codigo'] : $_POST['ped_codigo'];

//include_once "forms/BuscarPainelBusca.php";

    unset($_SESSION['ped_codigo']);

$tbPedido = new \system\model\TbPedido();

$Number = new \system\core\NumberFormat();

$gridPedido = new \system\core\Grid();

$gridPedido->colunaoculta = 1;
$gridPedido->id = null;

$gridPedido->setDados($tbPedido->listarPedidoBusca($ped_codigo))
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

#Dinamicamente carrega o formulario
$formController = new \system\core\FormController();
$formController->setForm()->getForm();


/* echo '<pre>';
 print_r($_SESSION);
echo '</pre>'; */

include '../../componente/rodape.php';
?>
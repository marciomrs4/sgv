<?php
include_once '..'.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'/bootstrap.php';
include_once 'config.php';

include '..'.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'componente/topo.php';
include '..'.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'componente/menuprincipal.php';

include '..'.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'modulo/administracao/ModuloAdministracao.php';

//Inclusao do formulario de busca de pedidos
include_once "forms/BuscarPainelBusca.php";

$Pedidos = new \system\model\TbPedido();
$Number = new \system\core\NumberFormat();
?>

<div class="panel panel-info">
    <div class="panel-heading">
        <h3 class="panel-title">Lista de Pedidos</h3>
    </div>
    <div class="panel-body">

<?php foreach($Pedidos->getListarPedido($_POST) as $Pedido):?>

        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Pedido: <?php echo($Pedido['ped_numero'] . ' - '); ?>
                Valor Total: <?php echo('R$ '.$Number->numberClient($Pedido['ped_valor_total']) . ' - '); ?>
                Cliente: <?php echo($Pedido['ped_cliente'] . ' - '); ?>
                Unidade: <?php echo($Pedido['uve_codigo']); ?>
                </h3>
            </div>
            <div class="panel-body">

                <?php

                $Grid = new \system\core\Grid();

                $ItemPedido = new \system\model\TbItemPedido();
                $Grid->setDados($ItemPedido->getItensPedido($Pedido['ped_codigo']));
                $Grid->setCabecalho(array('Produto','Valor Unitario','Quantidade','Valor Total'));
                $Grid->id = null;
                $Grid->show();
                ?>

            </div>
        </div>

<?php endforeach; ?>

    </div>
</div>

<?php
include '../../componente/rodape.php';
?>
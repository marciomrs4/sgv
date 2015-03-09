<?php
require_once '../../../bootstrap.php';

    $stp_codigo = filter_var($_POST['stp_codigo'],FILTER_SANITIZE_STRING);

    $Pedidos = new \system\model\TbPedido();

    foreach($Pedidos->listPedidoPainel($stp_codigo) as $Pedido):

?>
<div class="painel panel-primary">
        <div class="panel-heading">
            <div class="panel-title">
<!--INicio botao -->
            <div class="btn-group">
                <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    Alterar para <span class="caret"></span>
                </button>

    <ul class="dropdown-menu" role="menu">

        <?php
        $StatusPedido = new \system\model\TbStatusPedido();
        foreach($StatusPedido->listAllAssoc() as $Status):
            ?>

            <li><a href="#">
                    <button class="btn btn-default btn-xs ok" value="<?php echo($Pedido['0']); ?>">
                        <span class="glyphicon glyphicon-ok"></span>
                        <?php echo($Status['stp_descricao']); ?>
                    </button>
                    <input type="hidden" value="<?php echo($Status['stp_codigo']); ?>">
                </a>

            </li>
        <?php endforeach; ?>
    </ul>
</div>
<!--fim do botao -->


<a class="btn btn-primary" data-toggle="collapse" href="#<?php echo($Pedido['0']); ?>" aria-expanded="false" aria-controls="collapseExample">
    <?php echo('Pedido: '.$Pedido['1'].' Cliente: '.$Pedido['2'].' Data: '.$Pedido['3']); ?>
</a>

</div>
</div>

<div class="panel-body">

<div class="collapse" id="<?php echo($Pedido['0']); ?>">
    <div class="panel panel-default">
        <div class="panel-heading">Itens do pedido</div>
        <div class="panel-body">
        <?php

        $Grid = new \system\core\Grid();

        $ItemPedido = new \system\model\TbItemPedido();
        $Grid->setDados($ItemPedido->getItensPedido($Pedido['0']));
        $Grid->setCabecalho(array('Produto','Valor Unitario','Quantidade','Valor Total'));

        $Grid->show();
        ?>
            </div>
        </div>

    </div>
</div>

</div>
</div>

<?php endforeach; ?>
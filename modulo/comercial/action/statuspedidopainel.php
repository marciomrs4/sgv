<?php
require_once '../../../bootstrap.php';

    $stp_codigo = filter_var($_POST['stp_codigo'],FILTER_SANITIZE_STRING);

    $Pedidos = new \system\model\TbPedido();

    foreach($Pedidos->listPedidoPainel($stp_codigo) as $Pedido):



?>
                <div class="panel panel-default" id="headingOne">

                        <!--INicio botao -->
                        <div class="btn-group">
                            <button type="button" class="btn btn-primary">
                                Alterar para
                            </button>
                            <button type="button" class="btn btn-primary dropdown-toggle"
                                    data-toggle="dropdown">
                                <span class="caret"></span> <span class="sr-only">Toggle
									Dropdown</span>
                            </button>

                            <ul class="dropdown-menu" role="menu">

                            <?php
                            $StatusPedido = new \system\model\TbStatusPedido();
                            foreach($StatusPedido->listAllAssoc() as $Status):
                            ?>

                                <li><a href="#">
                                        <button class="ok" value="<?php echo($Pedido['0']); ?>">
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


                    <a data-toggle="collapse" data-parent="#accordion" href="#<?php echo($Pedido['0']); ?>" aria-expanded="false" aria-controls="collapseOne">
                        <?php echo('Pedido: '.$Pedido['0'].' Cliente: '.$Pedido['1'].' Data: '.$Pedido['2']); ?>
                    </a>

            <div id="<?php echo($Pedido['0']); ?>" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                <div class="well">
                    Itens do pedido
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
<?php endforeach; ?>



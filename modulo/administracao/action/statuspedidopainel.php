<?php
require_once '../../../bootstrap.php';

/*if($_POST['stp_codigo'] == 2) {
    echo rand(20,30),'Montando 2';
}else{
    echo rand(1, 10),'Solicitado 1';

}*/

$stp_codigo = filter_var($_POST['stp_codigo'],FILTER_SANITIZE_STRING);

$Pedidos = new \system\model\TbPedido();


$Grid = new \system\core\Grid();

$Grid->setDados($Pedidos->listPedidoPainel($stp_codigo, $_SESSION['uve_codigo']));
$Grid->setCabecalho(array('Pedido','Cliente','Data'));

$Grid->colunaoculta = 1;


$Grid->show();

?>
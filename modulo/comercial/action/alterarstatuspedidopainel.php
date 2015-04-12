<?php
require_once '../../../bootstrap.php';

    $stp_codigo = filter_var($_POST['stp_codigo'],FILTER_SANITIZE_STRING);

    $ped_codigo = filter_var($_POST['ped_codigo'],FILTER_SANITIZE_STRING);

    $dados = array();
    $dados['stp_codigo'] = $stp_codigo;
    $dados['ped_codigo'] = $ped_codigo;

try {

    $tbPedido = new \system\model\TbPedido();
    $tbPedido->updaStatus($dados);

    $Pedido = $tbPedido->getNumberPedido($ped_codigo);

    $tbStatus = new \system\model\TbStatusPedido();

    echo 'Pedido: ', $Pedido['ped_numero'],'<br /> Alterado para status: ',$tbStatus->getForm($stp_codigo)['stp_descricao'];

}catch(\PDOException $e){
    echo $e->getMessage();
}

?>
<?php
require_once '../../../bootstrap.php';

$tbProduto = new \system\model\TbProduto();


try{


	$pro_codigo = filter_var($_POST['pro_codigo'],FILTER_SANITIZE_NUMBER_INT);

	$valor = $tbProduto->getPriceProduct($pro_codigo);

echo \system\core\NumberFormat::builder()->numberClient($valor);

}catch(Exception $e){
	echo $e->getMessage();
}
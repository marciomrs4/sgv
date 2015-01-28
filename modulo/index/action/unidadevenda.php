<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 27/01/15
 * Time: 21:53
 */

require_once '../../../bootstrap.php';

$UnidadeVenda = new \system\app\ValidadeUnidadeVenda();

try{



    $UnidadeVenda->setpost($_POST)
                 ->setUnidadeVenda();

}catch (\Exception $e){
    throw new \Exception($e->getMessage(), $e->getCode());

    header('location: /sgv/modulo/index/unidadevenda.php');
}
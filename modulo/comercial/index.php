<?php
include_once '../../bootstrap.php';
include_once 'config.php';

include '../../componente/topo.php';
include '../../componente/menuprincipal.php';


include '../../modulo/comercial/ModuloVendas.php';

use system\core\FormController;

$ValidateUnidadeVenda = new \system\app\ValidadeUnidadeVenda();
$ValidateUnidadeVenda->validateUnidadeVenda();

$controler = new FormController();


 echo '<pre>';
print_r($_SESSION);
echo '</pre>';

$controler->setForm()
          ->getForm();




include '../../componente/rodape.php';
?>
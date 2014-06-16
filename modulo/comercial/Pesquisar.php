<?php

include_once '../../bootstrap.php';
include_once 'config.php';

include '../../componente/topo.php';
include '../../componente/menuprincipal.php';


include '../../modulo/comercial/ModuloComercial.php';

print_r($_SESSION);

use system\core\FormController;
$controler = new FormController($_SESSION);

$controler->setForm()->getForm();


include '../../componente/rodape.php';
?>
<?php
include_once '../../bootstrap.php';
include_once 'config.php';

include '../../componente/topo.php';
include '../../componente/menuprincipal.php';


include '../../modulo/comercial/ModuloVendas.php';

use system\core\FormController;


$controler = new FormController();

$controler->setForm()
          ->getForm();

include '../../componente/rodape.php';
?>
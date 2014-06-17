<?php
include_once '../../bootstrap.php';
include_once 'config.php';

include '../../componente/topo.php';
include '../../componente/menuprincipal.php';


include '../../modulo/comercial/ModuloVendas.php';

#Adciona um formulario dinamicamente em caso de ações.
use system\core\FormController;
$form = new FormController();
$form->setForm()->getForm();




include '../../componente/rodape.php';
?>
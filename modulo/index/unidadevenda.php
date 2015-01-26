<?php
include_once '../../bootstrap.php';
include_once 'config.php';

include '../../componente/topo.php';
include '../../componente/menuprincipal.php';



use system\core\FormController as Form;

$FormController = new Form();
$FormController->setForm('forms/unidadevenda')->getForm();
//$Controller->setForm()->getForm();

include '../../componente/rodape.php';



?>
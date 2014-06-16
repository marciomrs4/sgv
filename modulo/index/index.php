<?php
include_once '../../bootstrap.php';


use system\core\FormController as Form;

$Controller = new Form();
$Controller->setForm('../../forms/login')->getForm();
//$Controller->setForm()->getForm();

?>
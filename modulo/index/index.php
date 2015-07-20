<?php
//include_once '../../bootstrap.php';

include_once '../../vendor/autoload.php';


use system\core\FormController as Form;

$Controller = new Form();
$Controller->setForm('../../forms/login')->getForm();
//$Controller->setForm()->getForm();

//session_destroy();

?>
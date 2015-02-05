<?php
include_once '..'.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'/bootstrap.php';
include_once 'config.php';

#Valida se existe uma unidade selecionada
$ValidateUnidadeVenda = new \system\app\ValidadeUnidadeVenda();
$ValidateUnidadeVenda->validateUnidadeVenda();


include '..'.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'componente/topo.php';
include '..'.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'componente/menuprincipal.php';

include '..'.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'modulo/administracao/ModuloAdministracao.php';

use system\core\FormController;

#mostra padra os erros
$Erros = new \system\core\Error();
$Erros->showErrors();
$Erros->showMessages();


$formControler = new FormController();
$formControler->setForm()->getForm();





include '../../componente/rodape.php';
?>
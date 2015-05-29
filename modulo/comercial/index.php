<?php
include_once '../../bootstrap.php';
include_once 'config.php';

#Valida se existe uma unidade selecionada
$ValidateUnidadeVenda = new \system\app\ValidadeUnidadeVenda();
$ValidateUnidadeVenda->validateUnidadeVenda();

include '../../componente/topo.php';
include '../../componente/menuprincipal.php';


include '../../modulo/comercial/ModuloVendas.php';

use system\core\FormController;


#Classe que fica responsavel por mostrar mensagens de erros
$erros = new \system\core\Error();
$erros->showErrors();
$erros->showMessages();

$controler = new FormController();

$controler->setForm()
          ->getForm();


include '../../componente/rodape.php';
?>
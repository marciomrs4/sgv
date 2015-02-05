<?php
use system\model\TbRelatorio;
use system\core\Grid;
use system\core\FormController;
use system\core\NumberFormat;
require_once '../../bootstrap.php';
include_once 'config.php';
include '../../componente/topo.php';
include '../../componente/menuprincipal.php';


include '../../modulo/administracao/ModuloAdministracao.php';

#Classe que fica responsavel por mostrar mensagens de erros
$erros = new \system\core\Error();
$erros->showErrors();
$erros->showMessages();

#Instancia do repositorio que armazena unidade de venda
$tbUnidadeVenda = new \system\model\TbUnidadeVenda();

#Classe que monta o grid
$Grid = new Grid();

$Grid->setDados($tbUnidadeVenda->listUnidadeVenda());
$Grid->setCabecalho(array('','Unidade','Logradouro'));

$Grid->colunaoculta = 1;

#Classe que criar a url da acao do botao


#Classe que cria o botao e recebe o $action


#Classe grid que recebe o $option, onde se nao houve uma acao lista os dados
$Grid->addOption(\system\core\GridOption::newOption('')->setIco('edit')
                                            ->setName('Editar')
                                            ->setUrl(\system\core\ActionController::actionUrl()
                                                                                    ->setProjecName($configGlobal['projectName'])
                                                                                    ->setUrlModulo('administracao')
                                                                                    ->setUrlAction('alterar/unidadevenda')
                                                                                    ->setValue()
                                                                                    ->getUrl()))
     ->show(!isset($_SESSION['action']));

#Form controle onde carrega dinamicamente os forms
$FormController = new FormController();
$FormController->setForm()->getForm();

/*
var_dump($_SESSION);*/

include '../../componente/rodape.php';
?>
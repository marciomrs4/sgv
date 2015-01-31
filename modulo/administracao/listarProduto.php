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

#Instancia do repositorio que armazena de produto
$tbProduto = new \system\model\TbProduto();

#Classe que monta o grid
$Grid = new Grid();
try {
    $Grid->setDados($tbProduto->listAll());
}catch (Exception $e){
    echo $e->getMessage();
}
$Grid->setCabecalho(array('','Titulo','Valor','Descricao','Tipo de Produto'));

$Grid->colunaoculta = 1;

$Number = new NumberFormat();

$Grid->addFunctionColumn(function($var) use ($Number){return('R$ '.$Number->numberClient($var));},2);

#Classe grid que recebe o $option, onde se nao houve uma acao lista os dados
$Grid->addOption(\system\core\GridOption::newOption('')->setIco('edit')
                                            ->setName('Editar')
                                            ->setUrl(\system\core\ActionController::actionUrl()
                                                                                    ->setProjecName($_SESSION['projeto'])
                                                                                    ->setUrlModulo('administracao')
                                                                                    ->setUrlAction('alterar/produto')
                                                                                    ->setValue()
                                                                                    ->getUrl()))
     ->show(!isset($_SESSION['action']));

#Form controle onde carrega dinamicamente os forms
$FormController = new FormController();
$FormController->setForm()->getForm();

/*var_dump($_SESSION);*/

include '../../componente/rodape.php';
?>
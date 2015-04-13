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

#Instancia do repositorio que armazena de Status Pedido
$tbStatusPedido = new \system\model\TbStatusPedido();

#Classe que monta o grid
$Grid = new Grid();
try {
    $Grid->setDados($tbStatusPedido->listAll());
}catch (Exception $e){
    echo $e->getMessage();
}
$Grid->setCabecalho(array('','Descricao'));

$Grid->colunaoculta = 1;



#Classe grid que recebe o $option, onde se nao houve uma acao lista os dados
$Grid->addOption(\system\core\GridOption::newOption('')->setIco('edit')
                                            ->setName('Editar')
                                            ->setUrl(\system\core\ActionController::actionUrl()
                                                                                    ->setProjecName($configGlobal['projectName'])
                                                                                    ->setUrlModulo('administracao')
                                                                                    ->setUrlAction('alterar/statuspedido')
                                                                                    ->setValue()
                                                                                    ->getUrl()));


$Grid->addOption(\system\core\GridOption::newOption()->setIco('remove-circle')
                                                        ->setName('Deletar')
                                                        ->setUrl("action/statuspedido.php?stp_codigo"));


$Painel = new \system\core\Painel();
$Painel->addGrid($Grid)
    ->setPainelTitle('Lista de Status de Pedido')
    ->setPainelColor('primary')
    ->show(!isset($_SESSION['action']));

#Form controle onde carrega dinamicamente os forms
$FormController = new FormController();
$FormController->setForm()->getForm();

/*var_dump($_SESSION);*/

include '../../componente/rodape.php';
?>
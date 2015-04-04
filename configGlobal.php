<?php
session_start();

date_default_timezone_set('America/Sao_Paulo');

error_reporting(~E_ALL);

$configGlobal = array();

$configGlobal['projectName'] = 'SGV';
$configGlobal['systemName'] = '..:: SGV -  Sistema de Gest&atilde;o de Vendas::..';
$configGlobal['comercial'] = 'Vendas';
$configGlobal['administracao'] = 'Administra&ccedil;&atilde;o';

$configGlobal['tituloRodape'] = '..:: SGV -  Sistema de Gest&atilde;o de Vendas ::..';

?>
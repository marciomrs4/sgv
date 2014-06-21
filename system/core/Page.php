<?php
namespace system\core;

class Page
{
	public $configGlobal = array();
	
	public function __construct()
	{
		$this->configGlobal['projectName'] = 'SGV';
		$this->configGlobal['systemName'] = '..:: SGV -  Sistema de Gestão de Vendas::..';
		$this->configGlobal['comercial'] = 'Vendas';
		$this->configGlobal['administracao'] = 'Administração';
		
		$this->configGlobal['tituloRodape'] = '..:: SGV -  Sistema de Gestão de Vendas ::..';
		
	}
		
	public function getMenuPrincipal()
	{
		include_once '../../componente/menuprincipal.php';
	}
	
	public function getTopoPrincipal()
	{
		include_once '../../componente/topo.php';
	}
		
	public function getFooter()
	{
		include '../../componente/rodape.php';
	}
	
}
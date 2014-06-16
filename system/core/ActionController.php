<?php
namespace system\core;

class ActionController
{
	protected $projectName;
	protected $urlModulo;
	protected $urlAction;
	protected $urlValue;
	
	
	protected $controler = 'FrontControler.php';
	
	private $url;
	
	public static function actionUrl()
	{
		$action = new ActionController();
		return $action;
	}
	
	public function setProjecName($projectName)
	{
		$this->projectName = strtolower($projectName);
		return $this;
	}

	public function setUrlModulo($urlModulo)
	{
		$this->urlModulo = strtolower($urlModulo);
		return $this;
	}
	
	public function setUrlAction($urlAction)
	{
		$this->urlAction = strtolower($urlAction);
		return $this;
	}
	
	public function setValue($urlValue)
	{
		settype($urlValue, 'int');
		$this->urlValue = $urlValue;
		return $this;
	}
	
	public function getUrl()
	{
		echo '/',$this->projectName,'/',
				 $this->controler,'?
				 urlModulo=',$this->urlModulo,
			   '&urlAction=',$this->urlAction,'
				&urlValue=',$this->urlValue;
	}
	
}
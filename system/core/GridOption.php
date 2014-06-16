<?php
namespace system\core;

class GridOption implements Option
{
	protected $action = array();
	
	public function addAction(ActionController $action)
	{
		
		$this->action = $action;
		
	}

	public function setValueAction($value)
	{
		$this->action->setValue($value);
	}
}
<?php
namespace system\core;

class FormController
{
	
	protected $form;
	
	public $dirForm = 'forms';
	
	static $directory_separator = DIRECTORY_SEPARATOR;
	
	protected $session;
	
	public $modulo;
	public $action;
	public $value;
	
	
	public function __construct()
	{	
		$this->setModulo()
			 ->setAction();
	}
	
	public function setModulo($modulo=null)
	{
		$form_modulo = null;
		extract($_SESSION,EXTR_PREFIX_ALL,'form');
		$this->modulo = ($modulo != null) ? $modulo : $form_modulo;
		$_SESSION['modulo'] = $this->modulo;
		return $this;
	}
	
	public function setAction($action=null)
	{
		$form_action = null;
		extract($_SESSION,EXTR_PREFIX_ALL,'form');
		$this->action = ($action != null) ? $action : $form_action;
		$_SESSION['action'] = $this->action;
		return $this;
	}
	
	public function setValue($value=null)
	{
		$form_value = null;
		extract($_SESSION,EXTR_PREFIX_ALL,'form');
		$this->value = ($value != null) ? $value : $form_value;
		$_SESSION['value'] = $this->value;
		return $this;
	}
	
	public function getForm()
	{
		if(file_exists($this->form)){
			include_once $this->form;			
		}elseif($_SESSION['action']) {
			echo 'Arquivo nao encontrado';
		}

		unset($_SESSION['action'], $_SESSION['modulo'],
			  $_SESSION['value'],$_SESSION['erro'],
			  $_SESSION['erros']);
	}

	
	public function setForm($form = null)
	{
		if($form == null){
			 	$this->form = strtolower($this->dirForm.self::$directory_separator.$this->action.'.php');
			 	
			 	$this->form = str_replace('\\',DIRECTORY_SEPARATOR, $this->form);
			 	
		}else{
			$this->form = $form.'.php';
			$this->form = str_replace('\\',DIRECTORY_SEPARATOR, $this->form);
		}
		
		return $this;
		
	}
	
	
	
	private function satinizePath($path)
	{
		filter_var($path,FILTER_SANITIZE_URL);
	}
}
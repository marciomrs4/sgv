<?php

namespace system\core;

class FormController
{
	
	protected $form;
	public $dirForm = 'forms/';
	
	protected $session;
	
	public $modulo;
	public $action;
	public $value;
	
	
	public function __construct()
	{	
		$this->setModulo()->setAction();
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
			echo 'Arquivo não encontrado';
		}

		unset($_SESSION['action'], $_SESSION['modulo'],
			  $_SESSION['value'],$_SESSION['erro'],
			  $_SESSION['erros']);
	}

	
	public function setForm($form = null)
	{
		if($form == null){
			 	$this->form = strtolower($this->dirForm.$this->action.'.php');
		}else{
			$this->form = strtolower($form.'.php');
		}
		
		return $this;
		
	}
	
	public function validadeForm($formName)
	{
		if(!isset($_SESSION[$formName])){
			//$_SESSION[$formName] == null;
		}
		return $this;	
	}
	
	public function showErros()
	{
		if(isset($_SESSION['erro']) or isset($_SESSION['erros'])){
		echo '<div class="alert alert-danger">';
			echo $_SESSION['erro'],'<br />';
			foreach ($_SESSION['erros'] as $erro){
				if($erro){
					echo $erro,'<br />';
				}
			}
		echo '</div>';
		}
	}

	public function showMessages()
	{
		
		if(isset($_SESSION['message'])){
			echo '<div class="alert alert-success">',
				$_SESSION['message'],
			'</div>';
		
		}

		unset($_SESSION['message']);
	}
	
	private function validateSet($var)
	{
		if(isset($var)){
			return $var;
		}else{
			return null;
		}
	}
	
	private function satinizePath($path)
	{
		filter_var($path,FILTER_SANITIZE_URL);
	}
}
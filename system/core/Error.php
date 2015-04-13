<?php

namespace system\core;

class Error
{
		
	public function showErrors()
	{
		$erros = array();
		
		if(isset($_SESSION['erro']) or isset($_SESSION['erros'])){
		echo '<div class="alert alert-danger">';
			echo $_SESSION['erro'],'<br />';
			$erros = isset($_SESSION['erros']) ? $_SESSION['erros'] : $erros;
			foreach ( $erros as $erro){
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
	
	public function validadeForm($formName)
	{
	    if(!isset($_SESSION[$formName])){
	        //$_SESSION[$formName] == null;
	    }
	    return $this;
	}
	
}
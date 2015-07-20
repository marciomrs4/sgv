<?php

namespace system\core;

class SessionController
{
	protected $session;
	
	public function setSession($session)
	{
		$this->session = $session;
	}
	
	public function getSession($sessionValue)
	{
		return $this->session[$sessionValue];
	}

	public function createSession($dados)
	{
		
	}
	
}
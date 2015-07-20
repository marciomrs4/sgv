<?php

namespace system\core;

abstract class PostController extends DataBase
{
		
	protected $post;

	public function validarPost($post)
	{ 
		if($post)
		{
			$this->setpost($post);
			$_SESSION['post'] = $post;

		}elseif($_SESSION['post'])
		{
			$this->setpost($_SESSION['post']);
		}
		
	}
	
	public function setpost($post)
	{
		$this->post = $post;
		return $this;
	}
	
	public function getpost($post)
	{
		return($this->post[$post]);
	}

	public function setValueGet($get,$getname)
	{
		foreach ($get as $chaves => $valor){break 1;}
		
		$this->post[$getname] = $valor;
		
		return $this;
	}
	
	public function getValueGet($getname)
	{
		return(base64_decode($this->post[$getname]));
	}

	public function listarpost()
	{
		$post = '';
		foreach ($this->post as $campo => $valor)
		{
			$post .= ("
					[ Campo:<font color='blue'> ( {$campo} )</font>  ] 
							- 
				  	[ Valor:<font color='red'> ( {$valor} )</font>  ]
				  <br />
				");
		}

		return $post;
	}

	#Metodo para facilitar obter os nomes dos campos
	public function criarCampos()
	{
		$post = '';

		foreach ($this->post as $campo => $valor)
		{
			$post .= ('$this->post[\''.$campo.'\']<br />');
		}

		return $post;
	}

	public function criarArray($post)
	{
		$Array = explode(',', $post);
		
		return($Array);
	}

	/**
	 * @param string $message
	 * @param null $rota
     */
	public function clearPost($message = 'Cadastrado com sucesso !', $rota = null)
	{
		$_SESSION['message'] = $message;

		$rota = ($rota == null) ? $_SERVER['HTTP_REFERER'] : $rota;

		header("location: $rota");
	}
	
	
}
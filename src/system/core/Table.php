<?php
namespace system\core;

interface Table extends DataBase
{
	
	public function save($dados);
	
	public function update($dados);
	
	public function delete($dados);
	
	public function listar($dados = null);
	
}
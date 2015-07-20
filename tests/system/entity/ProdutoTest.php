<?php

namespace system\entity;

class ProdutoTest extends \PHPUnit_Framework_TestCase
{
	protected $name;
		
	public function testsetName($name='marcio')
	{
		if(is_array($name)){
			$this->name = array_values($name);
		}else{
		
			$this->name = $name;
		}
		
		return $this;

        $this->assertEquals($name,'marcio');
	}
	
	public function testgetName()
	{
        $grid = new \system\core\Grid();

        $this->assertInstanceOf('\system\core\Grid',$grid);
	}
}

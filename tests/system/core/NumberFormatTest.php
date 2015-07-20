<?php
namespace system\core;

class NumberFormatTest extends \PHPUnit_Framework_TestCase
{

	public function testMustBeInstanceOfThisbuilder()
	{
        $obj = new NumberFormat();
        $this->assertInstanceOf('system\core\NumberFormat',$obj);
	}
	
	public function testMustBeNumberFormatednumberClient($number)
	{
        $number = '12.00';
		$numero = number_format($number,2,',','.');

        $this->assertEquals('12,00',$numero);
	}

	public function testMustBeNumberFormatednumberDataBase($number)
	{
        $number = '12,00';
		$numero = str_replace(
				                array('.',','),
				                array('','.'),
				                $number);

        $this->assertEquals('12.00',$numero);
	}


}
<?php

namespace system\core;

class NumberFormat
{

	public static function builder()
	{
		return new NumberFormat();
	}
	
	public function numberClient($number)
	{
		return(number_format($number,2,',','.'));
	}

	public function numberDataBase($number)
	{
		return
		(str_replace(
				array('.',','),
				array('','.'),
				$number
					)
		);
	}


}
<?php

class Field
{
	public $size = 9;

//	Содержит массив массивов ячеек вида [['coordinat' => '0:0', 'state' => 1], ['coordinat' => '0:0', 'state' => 2]]
//	где state 1 - пустое место, state 2 - корабль
	public $field = [];

	/**
	 * Происходит создание пустого поля
	 */
	public function __construct()
	{
		$x = 0; $y = 0;

		while(true)
		{
			$coordinat = $x . ':' . $y;
			$this->field[$coordinat] = 1;
			if($x === $this->size) { $x = 0; $y++; }
			if($y === $this->size) break;
			$x++;
		}
	}
}
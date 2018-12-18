<?php

/**
 * Пока не важно как сюда сеттятся данные
 */
class Player
{	
	public $id;
	public $name;
        
        public function __construct($id, $name)
        {
            $this->id = $id;
            $this->name = $name;
        }
}